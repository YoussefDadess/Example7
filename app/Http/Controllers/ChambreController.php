<?php

namespace App\Http\Controllers;

use App\Models\Chambre;
use App\Models\Typechambre;
use App\Models\Hotel;

use Illuminate\Http\Request;

class ChambreController extends Controller
{
    public function index()
    {
        $chambres = Chambre::all();

        return view('chambres.index',compact('chambres'))->with('i', (request()->input('page', 1) -1) *5);
    }

    
    public function create()
    {
        $hotels=Hotel::all();
        $typechambres= Typechambre::all();
        return view('chambres.create', compact('hotels','typechambres'));
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'hotel_id' => 'required',
            'typechambre_id' => 'required',
            'etage' => 'required',
            'prix' => 'required',
            'devise' => 'required',
            'zone_residentielle' => 'required',
            'equipement' => 'required',
            'etat' => 'required',
        ]);

        $path = $request->file('image')->store('public/images');
        $chambre = new Chambre;
        $chambre->hotel_id = $request->hotel_id;
        $chambre->typechambre_id = $request->typechambre_id;
        $chambre->etage = $request->etage;
        $chambre->prix = $request->prix;
        $chambre->devise = $request->devise;
        $chambre->zone_residentielle = $request->zone_residentielle;
        $chambre->equipement =implode(',', $request->equipement);
        $chambre->etat = $request->etat;
        $chambre->image = $path;
        $chambre->save();
            // 'equipement' => implode(',', $request->equipement),
        return redirect()->route('chambres.index')
                        ->with('success','Room created successfully.');
    }

   
    public function show(Chambre $chambre)
    {
        return view('chambres.show',compact('chambre'));
    }

   
    public function edit(Chambre $chambre)
    {
        $hotels=Hotel::all();
        $typechambres=Typechambre::all();
        return view('chambres.edit',compact('chambre','hotels','typechambres'));
    }

   
    public function update(Request $request, $id)
    {
        
        $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'hotel_id' => 'required',
            'typechambre_id' => 'required',
            'etage' => 'required',
            'prix' => 'required',
            'devise' => 'required',
            'zone_residentielle' => 'required',
            'equipement' => 'required',
            'etat' => 'required',
        ]);

        $chambre = Chambre::find($id);
        if($request->hasFile('image')){
            $request->validate([
              'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
            $path = $request->file('image')->store('public/images');
            $chambre->image = $path;
        }
        $chambre->hotel_id = $request->hotel_id;
        $chambre->typechambre_id = $request->typechambre_id;
        $chambre->etage = $request->etage;
        $chambre->prix = $request->prix;
        $chambre->devise = $request->devise;
        $chambre->zone_residentielle = $request->zone_residentielle;
        $chambre->equipement =implode(',', $request->equipement);
        $chambre->etat = $request->etat;
        $chambre->save();
    
    
        return redirect()->route('chambres.index')
                        ->with('success','Room updated successfully');
    }

    
    public function destroy(Chambre $chambre)
    {
        $chambre->delete();
    
        return redirect()->route('chambres.index')
                        ->with('success','Room deleted successfully');
    }
}
