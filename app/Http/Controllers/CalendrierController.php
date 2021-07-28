<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;
use App\Models\Hotel;
use App\Models\Typechambre;
use App\Models\Chambre;
use App\Models\Rdv;


class CalendrierController extends Controller
{
	
    public function index(Request $request)
    {
		$hotels= Hotel::all();
		$typechambres= Typechambre::all();
		$chambres= Chambre::all();
		$rdvs= Rdv::all();
		
	return view('full-calender',compact('hotels','typechambres', 'chambres','rdvs'));
	
	}

	function get_rdvs($id,Request $request){
		
		if($id==0){
			$data = Rdv::whereDate('start', '>=', $request->start)
						 ->whereDate('end',   '<=', $request->end)
						 ->get();
		  }
		  else
			   {   $data = Rdv::whereDate('start', '>=', $request->start)
							  ->whereDate('end',   '<=', $request->end)
							//   whereHas('hotel',function($q) use($id){
							// 								  $q->where('chambre_id', $id);
							// 								})->get();
							->where('hotel_id',$id)->get();
				} 
				return response()->json($data);
			}
}


