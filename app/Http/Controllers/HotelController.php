<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Admin;
use App\Models\Image;
use App\Models\Chambre;
use Illuminate\Http\Request;
use App\DataTables\HotelDataTable;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;

class HotelController extends Controller
{   
    
    public function index()
    {
        if(Auth::user()->role == 'Admin')
        $hotels = Hotel::where('user_id', Auth::id())->orderBy('id', 'desc')->paginate(9);
        else $hotels = Hotel::orderBy('id', 'desc')->paginate(9);
        $count=Hotel::count();
        $chambres = Chambre::all();
        $admins = Admin::all();

        return view('hotels.index',compact('hotels','chambres','count','admins'))->with('i', (request()->input('page', 1) -1) *5);
    }

    public function gethotels($ville){

    //  $req = " SELECT DISTINCT ville FROM hotels ";
       
        $hotels = Hotel::where('ville', $ville)->get();
        //return $hotels;
        return response()->json($hotels,200);
       
    }

    
    public function create()
    {
        $admins = Admin::all();
        return view('hotels.create',compact('admins'));
    }

    
    public function store(Request $request)
    {
         $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'nom'=>'required',
            'ville'=>'required',
            'adresse'=>'required',
            'tel'=>'required',
            'code_postale'=>'required',
            'categorie' => 'required',
            'etat' => 'required',
            'description' => 'required',
        ]);
        $hotel= new Hotel; 
        $hotel->admin_id = Auth::id();
        $hotel->nom = $request->nom;
        $hotel->ville = $request->ville;
        $hotel->adresse = $request->adresse;
        $hotel->tel = $request->tel;
        $hotel->code_postale = $request->code_postale;
        $hotel->categorie = $request->categorie;
        $hotel->etat = $request->etat;
        $hotel->description = $request->description;

        $path = $request->file('image')->store('public/images');
        $hotel->image = $path;
        $hotel->save();

        if($request->hasfile('filename'))
        {
        
            foreach($request->file('filename') as $file)
            {
           
        
                $image = new Image();
               
                
                $image->image = $file->store('public/images');
                $image->hotel_id = $hotel->id;
                
                $image->save();

            }
        }
    
        
     
        return redirect()->route('hotels.index')
                        ->with('success','Hotel created successfully.');
    }

   
    public function show(Hotel $hotel)
    {
        $admins = Admin::all();
        $images=Image::all();
        $chambres = Chambre::all();
    
        return view('hotels.show',compact('hotel','chambres','images','admins'));
    }

   
    public function edit(Hotel $hotel)
    {
        $admins = Admin::all();
        return view('hotels.edit',compact('hotel','admins'));
    }

   
    public function update(Request $request, $id) 
    {
        
        $request->validate([
            'admin_id'=>'required',
            'nom'=>'required',
            'ville'=>'required',
            'adresse'=>'required',
            'tel'=>'required',
            'code_postale'=>'required',
            'categorie' => 'required',
            'etat' => 'required',
            'description' => 'required',
            ]);

            $hotel = Hotel::find($id);
            if($request->hasFile('image')){
                $request->validate([
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                ]);
                $path = $request->file('image')->store('public/images');
                $hotel->image = $path;
                }
                $hotel->admin_id = $request->admin_id;
                $hotel->nom = $request->nom;
                $hotel->ville = $request->ville;
                $hotel->adresse = $request->adresse;
                $hotel->tel = $request->tel;
                $hotel->code_postale = $request->code_postale;
                $hotel->categorie = $request->categorie;
                $hotel->etat = $request->etat;
                $hotel->description = $request->description;
                if($request->hasfile('filename'))
                {
                
                    foreach($request->file('filename') as $file)
                    {
                   
                
                        $image = new Image();
                       
                        
                        $image->image = $file->store('public/images');
                        $image->hotel_id = $hotel->id;
                        
                        $image->save();
        
                    }
                }
                $hotel->save();

    
        return redirect()->route('hotels.index')
                        ->with('success','Hotel updated successfully');
    }

    
    public function destroy(Hotel $hotel)
    {
        $hotel->delete();
    
        return redirect()->route('hotels.index')
                        ->with('success','Hotel deleted successfully');
    }

    public function getHotelById($id){
        $hotels= Hotel::find($id);  

        return response()-> json($hotels);
    }
}
