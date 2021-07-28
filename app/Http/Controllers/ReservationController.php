<?php

namespace App\Http\Controllers;

use App\Models\Rdv;
use App\Models\Client;
use App\Models\Hotel;
use App\Models\Chambre;
use Illuminate\Http\Request;


class ReservationController extends Controller
{   
    
    public function index()
    {
        $rdvs = Rdv::all();

        return view('rdvs.index',compact('rdvs'))->with('i', (request()->input('page', 1) -1) *5);
    }

    
    public function create()
    {
        $clients = Client::all();
        $hotels = Hotel::all();
        $chambres = Chambre::all();
        return view('rdvs.create',compact('hotels','chambres','clients'));
    }

    
    public function store(Request $request)
    {
         $request->validate([
            'start'=>'required',
            'end'=>'required',
            'reservation_status'=>'required',
            'payement_status'=>'required',

        ]);
    
        Rdv::create($request->all());
     
        return redirect()->route('rdvs.index')
                        ->with('success','Booking created successfully.');
    }

   
    public function show(Rdv $rdv)
    {
        return view('rdvs.show',compact('rdv'));
    }

   
    public function edit(Rdv $rdv)
    {
        $clients = Client::all();
        $hotels = Hotel::all();
        $chambres = Chambre::all();
        return view('rdvs.edit',compact('rdv','hotels','chambres','clients'));
    }

   
    public function update(Request $request, Rdv $rdv)
    {
        
        $request->validate([

            ]);

        $rdv->update($request->all());
    
        return redirect()->route('rdvs.index')
                        ->with('success','Booking updated successfully');
    }

    
    public function destroy(Rdv $rdv)
    {
        $rdv->delete();
    
        return redirect()->route('rdvs.index')
                        ->with('success','Booking deleted successfully');
    }
}
