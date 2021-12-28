<?php

namespace App\Http\Controllers;

use File;
use App\Company;
use App\Employee;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCompany;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $company = Company::orderBy('id', 'DESC')->paginate(5);

        return view('company.index',compact('company'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCompany $request)
    {
        //
        $file = $request->file('logo');
        // dd($file);
 
		$name = time()."_".$file->getClientOriginalName();
		$dest = 'storage/app/company';
		$file->move($dest,$name);
 
	    Company::create([
			'logo' => $name,
			'name' => $request->name,
			'email' => $request->email,
			'website' => $request->website
		]);  

		return redirect('company')->with('status', 'Company created!');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $company = Company::where('id',$id)->get();
        
        return view('company.edit',compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCompany $request,$id)
    {
        //
        $company = Company::where('id', $id)->first();
        $cekLogo = $request->file('logo');
        
        if(empty($cekLogo)) {
            $name = $company->logo;
        } else {
            //hapus gambar lama
            File::delete('storage/app/company/'.$company->logo);
            
            // menyimpan data file yang diupload ke variabel $file
            $file = $request->file('logo');
    
            $name = time()."_".$file->getClientOriginalName();
    
            $dest = 'storage/app/company';
            $file->move($dest,$name);
        }

        $company->update([
			'logo' => $name,
			'name' => $request->name,
			'email' => $request->email,
			'website' => $request->website
		]);  

        return redirect('company')->with('status', 'Company updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $employee = Employee::where('company_id',$id)->first();

        if(empty($employee))
        {
            $company = Company::findOrFail($id);
            File::delete('storage/app/company/'.$company->logo);
            $company->delete();

            return back()->with('status', 'Company deleted!');
        } else {
            return back()->with('fail', 'Company is used by employee!');
        }
    }
}
