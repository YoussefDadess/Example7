<?php

namespace App\Http\Controllers;

use App\Models\Typechambre;
use Illuminate\Http\Request;

class TypechambreController extends Controller
{
    public function index()
    {
        $typechambres = Typechambre::all();

        return view('typechambres.index',compact('typechambres'))->with('i', (request()->input('page', 1) -1) *5);
    }

    
    public function create()
    {        

        return view('typechambres.create');
    }

    
    public function store(Request $request)
    {
         $request->validate([
            'titre'=>'required',
        ]);
        
        Typechambre::create([
            'titre' => $request->titre,
            ]);

        
        return redirect()->route('typechambres.index')
                        ->with('success','Typechambre created successfully.');
    }

   
    public function show(Typechambre $typechambre)
    {
        return view('typechambres.show',compact('typechambre'));
    }

   
    public function edit(Typechambre $typechambre)
    {
        return view('typechambres.edit',compact('typechambre'));
    }

   
    public function update(Request $request, Typechambre $typechambre)
    {
        
        $request->validate([
            'titre'=>'required',
            ]);

        $typechambre->update($request->all());
    
        return redirect()->route('typechambres.index')
                        ->with('success','Typechambre updated successfully');
    }

    
    public function destroy(Typechambre $typechambre)
    {
        $typechambre->delete();
    
        return redirect()->route('typechambres.index')
                        ->with('success','Typechambre deleted successfully');
    }
}
