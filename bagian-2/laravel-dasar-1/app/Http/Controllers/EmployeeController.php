<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Company;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEmployee;
use App\Imports\EmployeeImport;
use Maatwebsite\Excel\Facades\Excel;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $employee = Employee::orderBy('id', 'DESC')->with(['company'])->paginate(5);

        return view('employee.index',compact('employee'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $company = Company::get();

        return view('employee.create',compact('company'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployee $request)
    {
        //
		Employee::create([
			'name' => $request->name,
			'company_id' => $request->company,
			'email' => $request->email
		]);  
        
		return redirect('employee')->with('status', 'Employee created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $employee = Employee::where('id',$id)->get();
        
        return view('employee.show',compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $employee = Employee::where('id',$id)->get();
        $company = Company::get();
        
        return view('employee.edit',compact('employee','company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(StoreEmployee $request, $id)
    {
        //
        $employee = Employee::where('id',$id)->first();

        $employee->update([
			'name' => $request->name,
			'company_id' => $request->company,
			'email' => $request->email
		]);  
        
		return redirect('employee')->with('status', 'Employee updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $employee = Employee::findOrFail($id);
        $employee->delete();
        
        return redirect('employee')->with('status', 'Employee deleted!');
    }

    //import excel
    public function import(Request $request)
    {
		$this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);

		$file = $request->file('file');
        // dd($file);
		
		$nama_file = rand().$file->getClientOriginalName();
        $dest = 'storage/app/company/excel/';
 
		$file->move($dest,$nama_file);
 
		Excel::import(new EmployeeImport, public_path($dest.$nama_file));
        
        return redirect('employee')->with('status', 'Employee imported!');
    }
}
