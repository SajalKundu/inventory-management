<?php

namespace App\Http\Controllers;

use App\Models\Creditors;
use Illuminate\Http\Request;

class CreditorsController extends Controller
{
    public function index()
    {
        $results = Creditors::all();
        return view('admin.creditors.index', compact('results'));
        //function_body
    }

    public function Add()
    {
        return view('admin.creditors.add');
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
            // 'address'     =>'required',
            'file'        =>'nullable|mimes:pdf,doc,docx,xls,xlsx,jpg,jpeg,png,svg,zib,rar,zip',
            'deal_date'   =>'required',
            'payment_date'=>'nullable',
        ]);

        $path = 'assets/creditors/';



        if($request->hasFile('file')){
            $file = $request->file('file');
            $fileName = time().'_'.$file->getClientOriginalName();
            $file->move($path, $fileName);
        }else{
            $fileName = null;
        }


        $result          = new Creditors();
        $result->name    = $request->name;
        $result->company = $request->company;
        $result->amount  = $request->amount;
        $result->phone   = $request->phone;
        $result->mobile   = $request->mobile;
        $result->email   = $request->email;
        // $result->address = $request->address;
        $result->path    = $path;
        $result->file    = $fileName;
        $result->deal_date   = $request->deal_date;
        $result->payment_date= $request->payment_date;
        $result->save();
        if($result){
            return redirect()->route('creditors.index')->with('msg', 'Creditors created successfully.');
        }else{
            return redirect()->route('creditors.index')->with('msg', 'Creditors created successfully.');
        }
    }

    public function show($id)
    {
        $result = Creditors::find($id);
        return view('admin.creditors.show', compact('result'));
        //function_body
    }

    public function edit($id)
    {
        $result = Creditors::find($id);
        return view('admin.creditors.edit', compact('result'));
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
            // 'address'     =>'required',
            'details'     =>'nullable',
            'file'        =>'nullable|mimes:pdf,doc,docx,xls,xlsx,jpg,jpeg,png,svg,zib,rar,zip',
            'deal_date'   =>'required',
            'payment_date'=>'nullable',
        ]);

        $path = 'assets/creditors/';

        $result = Creditors::findOrFail($id);

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
        $result->phone   = $request->phone;
        $result->mobile   = $request->mobile;
        $result->email   = $request->email;
        // $result->address = $request->address;
        $result->details = $request->details;
        $result->path    = $path;
        $result->deal_date   = $request->deal_date;
        $result->payment_date= $request->payment_date;
        $result->save();
        if($result){
            return redirect()->route('creditors.index')->with('msg', 'Creditors updated successfully.');
        }else{
            return redirect()->route('creditors.index')->with('msg', 'Creditors updated unsuccessfully.');
        }
        //function_body

    }

    public function destroy($id)
    {
        $result = Creditors::findOrFail($id);
        if($result->file != null){
            if(file_exists($result->path.$result->file)){
                unlink($result->path.$result->file);
            }
        }
        $result->delete();
        if($result){
            return redirect()->route('creditors.index')->with('msg', 'Creditors deleted successfully.');
        }else{
            return redirect()->route('creditors.index')->with('msg', 'Creditors deleted unsuccessfully.');
        }
        //function_body
    }

}
