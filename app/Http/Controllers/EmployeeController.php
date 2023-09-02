<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Division;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function create(){
        $divisions = Division::all();
        return view('employee.create', compact('divisions'));
    }
    public function store(Request $req){
        $obj = new Employee();
        $obj->name = $req->emp_name;
        $obj->division_id = $req->emp_division;
        $obj->district_id = $req->emp_district;
        if($obj->save()){
            return response()->json([
                'employee' => $obj
            ]);
        }
        
        
    }
}
