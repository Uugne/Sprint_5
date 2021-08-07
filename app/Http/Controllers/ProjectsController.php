<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{

    public function index(){
        return view('projects', ['projects' => \App\Models\Project::all()]);
    }


    public function show($id){
        return view('project', ['project' => \App\Models\Project::find($id)]);
    }
    

    public function store(Request $request){
    
        $this->validate($request, [
               'name' => 'required|unique:projects,name',
           ]);
    
        $pr = new \App\Models\Project();
        $pr->name = $request['name'];
    
        return ($pr->save() == 1) ?  
        redirect('/projects')->with('status_success', 'Project added successfuly!') : 
        redirect('/projects')->with('status_error', 'Project was not added!');
    }

    public function destroy($id){
        \App\Models\Project::destroy($id);
        return redirect('/projects')->with('status_success', 'Project deleted!');
    }

    public function update($id, Request $request){
        $this->validate($request, [
            'name' => 'required|unique:projects,name,'.$id.',id',
            ]);
        $pr = \App\Models\Project::find($id);
        $pr->name = $request['name'];
        return ($pr->save() !== 1) ? 
        redirect('/projects')->with('status_success', 'Project updated!') : 
        redirect('/projects')->with('status_error', 'Project was not updated!');
            
    }
        
}