<?php

namespace App\Http\Controllers;

use App\Models\siswa;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswas = siswa::all('id', 'name');
        return view('admin.master-project.masterproject', compact('siswas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    public function add($id)
    {
        $siswa = siswa::find($id);
        return view('admin.master-project.tambahproject', compact('siswa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'project_name' => 'required|min:5', 
            'project_date' => 'required',
            'photo' => 'required|image',
        ]);

        $image = $request->file('photo')->store('photo', 'public');
        $siswaid = $request->input('siswa_id');

        Project::create([
            'siswa_id' => $siswaid,
            'project_name' => $request->project_name,
            'project_date' => $request->project_date,
            'photo' => $image,
        ]);

        return redirect()->route('project.index')->with('message', 'project berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $siswas = siswa::find($id)->project()->get();
        return view('admin.master-project.showproject', compact('siswas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::find($id);
        return view('admin.master-project.editproject', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $project = Project::find($id);
        $request -> validate([
            'project_name' => 'required|min:5', 
            'project_date' => 'required',
            'photo' => 'nullable|image',
        ]);

        if($request->hasFile('photo')){
            if($project->photo) {
                Storage::disk('public')->delete($project->photo);
            }

            $file = $request->file('photo');
            $fileName = $request->nama . '.' . $file->getClientOriginalName();

            $image = $file->storeAs('photo', $fileName, 'public');

            $project->update([
                'siswa_id' => $request->siswa_id,
                'project_name' => $request->project_name,
                'project_date' => $request->project_date,
                'photo' => $image,
            ]);
        }else{
            $project->update([
                'siswa_id' => $request->siswa_id,
                'project_name' => $request->project_name,
                'project_date' => $request->project_date,
            ]);
        }

        return redirect()->route('project.index')->with('message', 'project berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $project = Project::find($id);
        // $project->delete();
        // return redirect()->route('project.index')->with('message', 'berhasil menghapus project');
    }
    public function delete($id)
    {
        Project::destroy($id);
        return redirect()->route('project.index')->with('message', 'berhasil menghapus project');
    }
}
