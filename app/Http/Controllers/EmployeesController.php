<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{

    public function index(){
        return view('employees', ['employees' => \App\Models\Employee::all()]);
    }


    public function show($id){
        return view('employee', ['employee' => \App\Models\Employee::find($id)]);
    }
    

    public function store(Request $request){
    
        $this->validate($request, [
               'firstname' => 'required',
               'project_id' => 'required',
           ]);
    
        $em = new \App\Models\Employee();
        $em->firstname = $request['firstname'];
        $em->project_id = $request['project_id'];
    
        return ($em->save() == 1) ?  
        redirect('/employees')->with('status_success', 'Employee added successfuly!') : 
        redirect('/employees')->with('status_error', 'Employee was not added!');
    }

    public function destroy($id){
        \App\Models\Employee::destroy($id);
        return redirect('/employees')->with('status_success', 'Employee deleted!');
    }

    public function update($id, Request $request){
        $this->validate($request, [
            'firstname' => 'required|unique:employees,firstname,'.$id.',id',
            'project_id' => 'required',
            ]);
        $em = \App\Models\Employee::find($id);
        $em->firstname = $request['firstname'];
        $em->project_id = $request['project_id'];
        return ($em->save() !== 1) ? 
            redirect('/employees/'.$id)->with('status_success', 'Employee updated!') : 
            redirect('/employees/'.$id)->with('status_error', 'Employee was not updated!');
    }
        
}
