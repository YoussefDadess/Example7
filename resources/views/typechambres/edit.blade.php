@extends('layouts.app2')

@section('content')
        <br>        <br>
        <br>

        <div style="padding-left:35%; color:#e0e0eb; font-family:Helvetica;">
        <h2>Edit Room-type</h2>
        </div>
        <br>

    @if($errors->any())
        <div class="alert alert-danger">
            <strong>Whooops!!</strong>There Were Some Problems With Your Input.<br><br>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container-fluid" style="padding-left:20%;">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <form action="{{ route('typechambres.update',$typechambre->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <form class="form-horizontal">
                        <div class="card-body">
                            
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label"><strong>Title :</strong></label>
                                <div class="col-sm-9">
                                <input type="text" name="titre" value="{{$typechambre->titre}}" class="form-control" >
                                </div>
                            </div>
 
                            <!-- <div class="form-group row">
                                        <strong class="col-sm-3 text-right control-label col-form-label">Adult capacity :</strong>
                                        <div class="col-sm-9">
                                        <select class="form-control" name="capacite_adultes" aria-invalid="false" value="{{$typechambre->capacite_adultes}}">
                                        <option value="">--Select--</option>
                                        <option value="1">Only one adult</option>
                                        <option value="2">Two adults</option>
                                        <option value="3">Three adults</option>
                                        <option value="4">four adults</option>
                                        </select>   
                                    </div> 
                                    </div> 

                                    <div class="form-group row">
                                        <strong class="col-sm-3 text-right control-label col-form-label">Kids capacity :</strong>
                                        <div class="col-sm-9">
                                        <select class="form-control" name="capacite_enfants" aria-invalid="false" value="{{$typechambre->capacite_enfants}}">
                                        <option value="">--Select--</option>
                                        <option value="0">No kids</option>
                                        <option value="1">Only one kid</option>
                                        <option value="2">Two kids</option>
                                        <option value="3">Three kids</option>
                                        <option value="4">four kids</option>
                                        </select>  
                                        </div> 
                                        </div>    

                            <div class="form-group row">
                                    <label class="col-sm-3 text-right control-label col-form-label" for="fname"><strong>Base Price : </strong></label> 
                                            <div class="form-group row">
                                            <input class="input-group-text" name="prix" type="number" value="{{$typechambre->prix}}">
                                            <select class="form-select" name="devise" value="{{$typechambre->devise}}">
                                            <option value="Dollar">Dollar</option>
                                            <option value="Euro">Euro</option>
                                            <option value="Dirham">Dirham</option>
                                            <option value="Dinar">Dinar</option>
                                            </select>    
                                            </div>
                                            </div>

                            
                                            <div class="form-group row">
                                        <strong class="col-sm-3 text-right control-label col-form-label">Beds :</strong>
                                        <div class="col-sm-9">
                                        <select class="form-control" name="nbrLits" aria-invalid="false" value="{{$typechambre->nbrLits}}">
                                        <option value="">--Select--</option>
                                        <option value="1-(Large)">Only one bed(Large)</option>
                                        <option value="1-(Small)">Only one bed(Small)</option>
                                        <option value="2-(Large)">Two beds (Large)</option>
                                        <option value="2-(Small)">Two beds (Small)</option>
                                        <option value="3">Three beds </option>
                                        <option value="4">Four beds </option>
                                        </select>  
                                        </div> 
                                        </div>



                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label"><strong>Residential area :</strong></label>
                                <div class="col-sm-9">
                                <input type="number" name="zone_residentielle" value="{{$typechambre->zone_residentielle}}" class="form-control">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label"><strong>Amenities :</strong></label>
                                    <div class="col-sm-9">
                                    <select name="equipement[]" class="mul-select" multiple="true">
                                            <option value="Tea/Coffee Maker" id="Tea/Coffee Maker">	Tea/Coffee Maker</option>
                                            <option value="Mini Bar" id="Mini Bar">	Mini Bar </option>
                                            <option value="Alarm clock" id="Alarm clock">Alarm clock</option>
                                            <option value="Free WiFi" id="Free WiFi"> Free WiFi</option>
                                            <option value="Fitness center" id="Fitness center"> fitness center</option>
                                    </select>
                                    </div>
                                    </div> -->

                            <div class="form-group row">
                                <div class="col-sm-9">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <a class="btn btn-primary" href="{{route('typechambres.index')}}">Back</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </form>
            </div>
        </div>
    </div>
</div>
<br>
<br>

@endsection

@section('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        $('select').selectpicker();
    });
</script>

@endsection
        