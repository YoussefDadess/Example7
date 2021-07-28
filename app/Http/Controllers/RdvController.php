<?php

namespace App\Http\Controllers;


use App\Models\Rdv;
use App\Models\Client;
use App\Models\Hotel;
use App\Models\Typechambre;
use App\Models\Chambre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Carbon\Carbon as time;

use App\Http\Requests\StoreRdvRequest;

use Carbon\Carbon;

class RdvController extends Controller
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
        $typechambres=Typechambre::all();

        return view('rdvs.create',compact('hotels','typechambres','chambres','clients',));
    }

    
    public function store(StoreRdvRequest $request)
    {

            $data = $request->all();
            $data['start']= $data['start'];
            $start = Carbon::parse($data['start']);
            $data['end']= $data['end'];
            $start = Carbon::parse($data['end']);

            $data['user_id'] = Auth::id();

            // dd($data);
            // dd($start);
            Rdv::create($data);
    
            return redirect()->route('rdvs.index')
                ->with('success','Booking created Successfuly');
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
        $typechambres=Typechambre::all();
        return view('rdvs.edit',compact('rdv','hotels','typechambres', 'chambres','clients'));
    }

   
    public function update(StoreRdvRequest  $request, Rdv $rdv)
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
    public function get_res_per_date(Request $request){
        $rdvs = Rdv::where('start',$request->date)->where('chambre_id',$request->chambre_id)->get()->pluck('heure');
        return response()->json($rdvs,200);
    }

    public function get_despo(Request $request){
        $start_date = $request->start;
        $end_date   = $request->end;

    }

    public function gethotels($ville){

        //  $req = " SELECT DISTINCT ville FROM hotels ";
           
            $hotels = Hotel::where('ville', $ville)->get();
            //return $hotels;
            return response()->json($hotels,200);
           
        }
}
