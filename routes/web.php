<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FullCalenderController;
use App\Models\Hotel;
use App\Models\Rdv;
use App\Models\Chambre;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Facades\DB;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $hotels = Hotel::all();
    return view('welcome',compact('hotels'));
});

Route::get('/index', function () {
    $stat1 = [];
    $stat2 = [];
    $stat3 = [];

    $stat1 []= Hotel::All()->count();
    $stat2[]= Chambre::All()->count();
    $stat3 []= Rdv::All()->count();
   
    $chart = (new LarapexChart)->setType('heatmap')
        ->setTitle('Total ')
        ->setSubtitle('Hotels,Chambres,Réservations')
        ->setXAxis([''])
        ->setDataset([
                    [
                        'name' => 'Hotels',
                        'data' => $stat1
                    ],
                    [
                        'name' => 'Chambres',
                        'data' => $stat2
                    ],
                    [
                        'name' => 'Réservations',
                        'data' => $stat3
                    ]
                    ])
                    // ->setColors(['#ff6384','#ff6384'])
                          ->setHeight(250)
                          ->setGrid(false);
                          
                        //   $stat1 = Chambre::select('etat',DB::raw('count(id) as nbr'))->groupby('etat')->get()->pluck('nbr');

                        //   $chart1 = (new LarapexChart)->setTitle('Rooms reservation')
                        //   ->setXAxis(['Reserved Rooms','Unreserved Rooms'])
                        //   ->setDataset($stat1)
                        //   ->setLabels(['Reserved Rooms','Unreserved Rooms']);

                        //   $stat1 = Chambre::select('etat',DB::raw('count(id) as nbr'))->groupby('etat')->get()->pluck('nbr');

                        //           $chart2 = (new LarapexChart)->setTitle('Rooms reservation')
                        //           ->setXAxis(['Reserved Rooms','Unreserved Rooms'])
                        //           ->setDataset($stat1)
                        //           ->setLabels(['Reserved Rooms','Unreserved Rooms']);

                        //           $stat1 = Chambre::select('etat',DB::raw('count(id) as nbr'))->groupby('etat')->get()->pluck('nbr');

                        //           $chart3 = (new LarapexChart)->setTitle('Rooms reservation')
                        //           ->setXAxis(['Reserved Rooms','Unreserved Rooms'])
                        //           ->setDataset($stat1)
                        //           ->setLabels(['Reserved Rooms','Unreserved Rooms']);

                                  $stat1 = Chambre::select('etat',DB::raw('count(id) as nbr'))->groupby('etat')->get()->pluck('nbr');

                                  $chart4 = (new LarapexChart)->setTitle('Rooms reservation')
                                  ->setXAxis(['Reserved Rooms','Unreserved Rooms'])
                                  ->setDataset($stat1)
                                  ->setLabels(['Reserved Rooms','Unreserved Rooms']);

                        $stat3 = [];
                        $stat4 = [];
                        $stat5 = [];
                        $stat6 = [];
                        $stat7 = [];

                
                        $stat3 []= Chambre::where('typechambre_id','1')->count();
                        $stat4[]= Chambre::where('typechambre_id','2')->count();
                        $stat5 []= Chambre::where('typechambre_id','3')->count();
                        $stat6 []= Chambre::where('typechambre_id','4')->count();
                        $stat7 []= Chambre::where('typechambre_id','5')->count();


                
                    $chart5 = (new LarapexChart)->setTitle('ROOMS  :')
                        ->setSubtitle('Number')
                        ->setType('bar')
                        ->setXAxis([''])
                        // ->setHorizontal(true)
                        ->setGrid(true)
                        ->setDataset([
                            [
                                'name' => 'Single Room',
                                'data' => $stat3
                            ],
                            [
                                'name' => 'Double',
                                'data' => $stat4
                            ],
                            [
                                'name' => 'Tripple',
                                'data' => $stat5
                            ],
                            [
                                'name' => 'Twin',
                                'data' => $stat6
                            ],[
                                'name' => 'Quadruple',
                                'data' => $stat7
                            ],
                        ])
                        ->setStroke(1);


                        

                    return view('index',compact('chart','chart4','chart5'));
                });

                // Route::get('/cal', function () {
                //     return view('calendar');
                // });

                // Route::get('/res', function () {
                //     $hotels = Hotel::all();
                //     $chambres= Chambre::all();
                //     $rdvs = Rdv::all();
                //     return view('reservation',compact('chambres','rdvs','hotels'));
                // });



                // Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




                //resource
                // Route::resource('clients', 'App\Http\Controllers\ClientController');
                // Route::resource('produits', 'App\Http\Controllers\ProduitController');
                Route::resource('rdvs', 'App\Http\Controllers\RdvController');
                Route::get('/full-calender', [App\Http\Controllers\CalendrierController::class, 'index']);
                Route::get('/full-calender/{id}', [App\Http\Controllers\CalendrierController::class, 'get_rdvs']);
                Route::post('full-calender/action', [App\Http\Controllers\CalendrierController::class, 'action']);
                Route::resource('events', 'App\Http\Controllers\FullCalenderController');
                Route::resource('typechambres','App\Http\Controllers\TypechambreController');
                Route::resource('admins','App\Http\Controllers\AdminController');


                Route::get('/gethotels/{ville}',[App\Http\Controllers\HotelController::class, 'gethotels' ]);
                Route::resource('clients','App\Http\Controllers\ClientController');

                Route::group(["middleware"=>["auth","admin"]],function(){
                
                   

                // Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->middleware(['auth']);
                
                });
                Route::group(["middleware"=>["auth","client"]],function(){
                    Route::resource('hotels','App\Http\Controllers\HotelController');
                    Route::resource('chambres','App\Http\Controllers\ChambreController');
                


                    Route::get('/image-upload', [App\Http\Controllers\FileUpload::class, 'createForm']);
                    Route::post('/image-upload', [App\Http\Controllers\FileUpload::class, 'fileUpload'])->name('imageUpload');
                    Route::get('/imageindex', [App\Http\Controllers\FileUpload::class, 'index']);
                    
                });

                Auth::routes();

