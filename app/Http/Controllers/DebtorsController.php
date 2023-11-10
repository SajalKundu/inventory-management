<?php

namespace App\Http\Controllers;

use App\Models\Debtors;
use Illuminate\Http\Request;

class DebtorsController extends Controller
{
    public function index()
    {
        $results = Debtors::all();
        return view('admin.debtors.index', compact('results'));
        //function_body
    }

    public function Add()
    {
        return view('admin.debtors.add');
        //function_body
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required',
            'company'     =>'required',
            'amount'      =>'required',
            'phone'       =>'nullable',
            'email'       =>'nullable',
            'address'     =>'required',
            'file'        =>'nullable|mimes:pdf,doc,docx,xls,xlsx,jpg,jpeg,png,svg,zib,rar,zip',
            'deal_date'   =>'required',
           'recovery_date'=>'required',
        ]);

        $path = 'assets/debtors/';



        if($request->hasFile('file')){
            $file = $request->file('file');
            $fileName = time().'_'.$file->getClientOriginalName();
            $file->move($path, $fileName);
        }else{
            $fileName = null;
        }


        $result          = new Debtors();
        $result->name    = $request->name;
        $result->company = $request->company;
        $result->amount  = $request->amount;
        $result->phone   = $request->phone;
        $result->mobile   = $request->mobile;
        $result->email   = $request->email;
        $result->address = $request->address;
        $result->path    = $path;
        $result->file    = $fileName;
        $result->deal_date   = $request->deal_date;
        $result->recovery_date= $request->recovery_date;
        $result->save();
        if($result){
            return redirect()->route('debtors.index')->with('msg', 'Debtors created successfully.');
        }else{
            return redirect()->route('debtors.index')->with('msg', 'Debtors created unsuccessfully.');
        }
    }

    public function show($id)
    {
        $result = Debtors::find($id);
        return view('admin.debtors.show', compact('result'));
        //function_body
    }

    public function edit($id)
    {
        $result = Debtors::find($id);
        return view('admin.debtors.edit', compact('result'));
        //function_body
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'        => 'required',
            'company'     =>'required',
            'amount'      =>'required',
            'phone'       =>'nullable',
            'email'       =>'nullable',
            'address'     =>'required',
            'details'     =>'nullable',
            'file'        =>'nullable|mimes:pdf,doc,docx,xls,xlsx,jpg,jpeg,png,svg,zib,rar,zip',
            'deal_date'   =>'required',
            'recovery_date'=>'required',
        ]);

        $path = 'assets/creditors/';

        $result = Debtors::findOrFail($id);

        if($request->hasFile('file')){
            $file = $request->file('file');
            $fileName = time().'_'.$file->getClientOriginalName();
            $file->move($path, $fileName);

            if($result->file != null){
                if(file_exists($path.$result->file)){
                    unlink($path.$result->file);
                }
            }

            $result->file    = $fileName;

        }elseif($request->del_file == 1){
            if($result->file != null){
                if(file_exists($path.$result->file)){
                    unlink($path.$result->file);
                }
            }

            $result->file      = null;
        }else{
            $result->file      = $result->file;
        }

        $due_amount = $result->amount - $request->recovery_amount;

        $result->name    = $request->name;
        $result->company = $request->company;
        $result->amount  = $due_amount;
        $result->recovery_amount  = $request->recovery_amount;
        $result->phone   = $request->phone;
        $result->mobile   = $request->mobile;
        $result->email   = $request->email;
        $result->address = $request->address;
        $result->details = $request->details;
        $result->path    = $path;
        $result->deal_date   = $request->deal_date;
        $result->recovery_date= $request->recovery_date;
        $result->save();
        if($result){
            return redirect()->route('debtors.index')->with('msg', 'Debtor updated successfully.');
        }else{
            return redirect()->route('debtors.index')->with('msg', 'Debtor updated unsuccessfully.');
        }
        //function_body

    }

    public function destroy($id)
    {
        $result = Debtors::findOrFail($id);
        if($result->file != null){
            if(file_exists($result->path.$result->file)){
                unlink($result->path.$result->file);
            }
        }
        $result->delete();
        if($result){
            return redirect()->route('debtors.index')->with('msg', 'Debtor deleted successfully.');
        }else{
            return redirect()->route('debtors.index')->with('msg', 'Debtor deleted unsuccessfully.');
        }
        //function_body
    }
}
