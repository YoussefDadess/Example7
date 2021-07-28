<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Hotel;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    public function index()
    {
        $produits = Produit::all();

        return view('produits.index',compact('produits'))->with('i', (request()->input('page', 1) -1) *5);
    }

    
    public function create()
    {
        $hotels = Hotel::all();
        return view('produits.create',compact('hotels'));
    }

    
    public function store(Request $request)
    {
         $request->validate([
            'nomP'=>'required',
            'quantite'=>'required',
            'mesure'=>'required',
            'etat'=>'required',
        ]);
    
        Produit::create($request->all());
     
        return redirect()->route('produits.index')
                        ->with('success','Produit created successfully.');
    }

   
    public function show(Produit $produit)
    {
        return view('produits.show',compact('produit'));
    }

   
    public function edit(Produit $produit)
    {
        $hotels = Hotel::all();
        return view('produits.edit',compact('produit','hotels'));
    }

   
    public function update(Request $request, Produit $produit)
    {
        
        $request->validate([

            ]);

        $produit->update($request->all());
    
        return redirect()->route('produits.index')
                        ->with('success','Produit updated successfully');
    }

    
    public function destroy(Produit $produit)
    {
        $produit->delete();
    
        return redirect()->route('produits.index')
                        ->with('success','Produit deleted successfully');
    }
}
