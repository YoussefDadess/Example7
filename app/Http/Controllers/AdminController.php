<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $admins = Admin::all();

        return view('admins.index',compact('admins'))->with('i', (request()->input('page', 1) -1) *5);
    }

    
    public function create()
    {
        return view('admins.create');
    }

    
    public function store(Request $request)
    {
         $request->validate([
            'nom'=>'required',
            'prenom'=>'required',
            'adresse'=>'required',
            'tel'=>'required',
            'age'=>'required',
            'sexe'=>'required',
            'ville' => 'required',
        ]);
    
        Admin::create($request->all());
     
        return redirect()->route('admins.index')
                        ->with('success','Admin created successfully.');
    }

   
    public function show(Admin $admin)
    {
        return view('admins.show',compact('admin'));
    }

   
    public function edit(Admin $admin)
    {
        return view('admins.edit',compact('admin'));
    }

   
    public function update(Request $request, Admin $admin)
    {
        
        $request->validate([

            ]);

        $admin->update($request->all());
    
        return redirect()->route('admins.index')
                        ->with('success','Admin updated successfully');
    }

    
    public function destroy(Admin $admin)
    {
        $admin->delete();
    
        return redirect()->route('admins.index')
                        ->with('success','Admin deleted successfully');
    }
}
