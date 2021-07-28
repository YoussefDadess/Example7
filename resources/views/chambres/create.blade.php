@extends('layouts.app2')
@section('content')

<br><br><br><br>



    
    <div style="padding-left:35%; color:#e0e0eb; font-family:Helvetica;">
    <h2>ADD NEW ROOM</h2>
    </div>

    @if($errors->any())
    <div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
    @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
    </ul>
    </div>
    @endif                                 

    <div class="container-fluid" style="padding-left:20%;">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <form action="{{route('chambres.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <form class="form-horizontal">
                            <div class="card-body">


                            <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label"><strong>Room Image :</strong></label>
                            <div class="col-sm-9">
                              <input type="file" name="image" class="form-control">
                             @error('image')
                      <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                         </div>
                        </div>

                    <div class="form-group row">
                    <label for="fname" class="col-sm-3 text-right control-label col-form-label"><strong>Hotel name :</strong></label>
                    <div class="col-sm-9">
                        <select class="form-control" name="hotel_id">
                            @foreach($hotels as $hotel)
                            @if(auth()->user()->id == $hotel->user->id)
                                <option value="{{ $hotel->id }}">{{ $hotel->nom }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                </div>

                            <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label"><strong>Room type :</strong></label>
                                        <div class="col-sm-9">
                                        <select  name="typechambre_id" class="form-control">
                                        @foreach($typechambres as $typechambre)
                                <option value="{{ $typechambre->id }}">{{ $typechambre->titre }}</option>
                            @endforeach
                        </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <strong class="col-sm-3 text-right control-label col-form-label">Floor :</strong>
                                        <div class="col-sm-9">
                                        <select class="form-control" name="etage" aria-invalid="false">
                                        <option value="">--Select--</option>
                                        <option value="First floor">First floor</option>
                                        <option value="Second floor">Second floor</option>
                                        <option value="Third floor">Third floor</option>
                                        <option value="Fourth floor">Fourth floor</option
                                        ><option value="Fifth floor">Fifth floor</option>
                                        </select>                             
                             </div>
                                 </div>


                                    <div class="form-group row">
                                    <label class="col-sm-3 text-right control-label col-form-label" for="fname"><strong>Base Price : </strong></label> 
                                            <div class="col-sm-9" >
                                            <div class="input-group mb-3">
                                            <input class="input-group-text" name="prix" type="number">
                                            <select class="input-group-text" name="devise">
                                            <option value="Dollar">Dollar</option>
                                            <option value="Euro">Euro</option>
                                            <option value="Dirham">Dirham</option>
                                            <option value="Dinar">Dinar</option>
                                            </select>    
                                            </div>
                                            </div>
                                            </div>  
                                    
                                            <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label"><strong>Residential area :</strong></label>
                                        <div class="col-sm-9">
                                        <input type="number" name="zone_residentielle" class="form-control" >
                                        </div>
                                    </div>

                                    <style>
                                        .mul-select {
                                            width:100%;
                                        }
                                    </style>

                                    <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label"><strong>Amenities :</strong></label>
                                    <div class="col-sm-9">
                                    <select name="equipement[]" class="mul-select" multiple="true">
                                    <option value="Paid parking" id="Paid parking">Paid parking</option>
                                            <option value="Mini Bar" id="Mini Bar">Mini Bar </option>
                                            <option value="Cable Television" id="Cable Television">Cable Television</option>
                                            <option value="Free WiFi" id="Free WiFi">Free WiFi</option>
                                            <option value="Free Local Calls" id="Free Local Calls">Free Local Calls</option>
                                            <option value="Anti-vapor mirrors" id="Anti-vapor mirrors">Anti-vapor mirrors</option>
                                            <option value="Telephone" id="Telephone">Telephone</option>
                                            <option value="Wake-up calls" id="Wake-up calls">Wake-up calls</option>
                                            <option value="Coach parking" id="Coach parking">Coach parking</option>
                                            <option value="Electronic key card" id="Electronic key card">Electronic key card</option>
                                            <option value="Bath or shower" id="Bath or shower">Bath or shower</option>
                                            <option value="Balcony/patio" id="Balcony/patio">Balcony/patio</option>
                                            <option value="Room Service" id="Room Service">Room Service</option>
                                            <option value="Interactive TV" id="Interactive TV">Interactive TV</option>
                                            <option value="City View" id="City View">City View</option>
                                            <option value="CD player" id="CD player">CD player</option>
                                            <option value="Microwave" id="Microwave">Microwave</option>
                                            <option value="Air-conditioning" id="Air-conditioning">Air-conditioning</option>
                                            <option value="Bottled water" id="Bottled water">Bottled water</option>
                                            <option value="High-Definition Television" id="High-Definition Television">High-Definition Television</option>
                                            <option value="Canal View" id="Canal View">Canal View</option>
                                    </select>
                                    </div>
                                    </div>
                                    

                                 <div class="form-group row">
                                        <strong class="col-sm-3 text-right control-label col-form-label">Status :</strong>
                                        <div class="col-sm-9">
                                        <select class="form-control" name="etat" aria-invalid="false">
                                        <option value="">--Select--</option>
                                        <option value="Reserved">Reserved</option>
                                        <option value="Unreserved">Unreserved</option>
                                        </select>                             
                             </div>
                                 </div>

                                    <div class="form-group row">
                                        <div class="col-sm-9">
                                            <button type="submit" class="btn btn-primary">Save</button>
                                            <a class="btn btn-primary" href="{{route('chambres.index')}}">Back</a>
                                        </div>
                                    </div>
                            </div>
                        </form>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <br><br>

@endsection

@section('head1')
    <link href="{{asset('assets2/libs/datatables/media/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css">

@endsection
@section('scripts')

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
<script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.css')}}"></script>
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}"></script>
    <script src="{{asset('assets2/libs/datatables/media/js/jquery.dataTables.min.js')}}"></script>

    <script>
        $(document).ready(function(){
              $('.table').DataTable();
        });
        </script>
<script>
  $(document).ready(function(){
    $(".mul-select").select2({
      placeholder: "Select Equipments",
      tags: true ,
    });
  })
</script>

@endsection

@section('head1')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
@endsection
