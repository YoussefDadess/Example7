@extends('layouts.app2')

@section('content')
    
        <br> <br> <br>
        <div style="padding-left:35%; color:#e0e0eb; font-family:Helvetica;">
        <h2>EDIT RESERVATION</h2>
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
                    <form action="{{ route('rdvs.update',$rdv->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <form class="form-horizontal">
                        <div class="card-body">

                        <div class="form-group">
									<span class="form-label">Client name </span>
                                    <select class="form-control" name="client_id" id="list">
										@foreach($clients as $client)
											<option value="{{ $client->id }}">{{ $client->nom }} {{ $client->prenom }} </option>
										@endforeach
                                    </select>
						</div>

                        <div class="form-group">
									<span class="form-label">Your Destination</span>
                                    <select class="form-control" name="hotel_id" id="list">
										@foreach($hotels as $hotel)
											<option value="{{ $hotel->ville }}">{{ $hotel->ville }}</option>
										@endforeach
                                    </select>
						</div>

                        <div class="form-group">
                                <span class="form-label">Hotel</span>
                                <select class="form-control" name="hotel_id" id="listhotels">
                                @foreach($hotels as $hotel)
								
                                <option value="{{ $hotel->id }}">{{ $hotel->nom }}</option>
                                @endforeach
                                </select>
                                </div>

                        <div class="form-group">
									<span class="form-label">Room Type</span>
                                    <select class="form-control" name="chambre_id" >
								   @foreach($chambres as $chambre)
                                   @if($chambre->etat == "Unreserved")
                                  <option value="{{ $chambre->id }}">{{ $chambre->typechambre->titre }}</option>
                               	   @endif
                           	       @endforeach
                                    </select>
						</div>

                        <div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<span class="form-label">Check In</span>
											<input class="form-control" type="datetime-local" name="start"  value="{{$rdv->start}}" required>
										</div>
						</div>

						<div class="col-sm-6">
										<div class="form-group">
											<span class="form-label">Check out</span>
											<input class="form-control" type="datetime-local" name="end" value="{{$rdv->end}}" required>
										</div>
									</div>
						</div>
                            
                        <div class="row">
									<div class="col-sm-4">
										<div class="form-group">
											<span class="form-label">Rooms</span>
											<select class="form-control" name="capacite" value="{{$rdv->capacite}}">
												<option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option>
											</select>
											<span class="select-arrow"></span>
										</div>
						</div>

                        <div class="col-sm-4">
										<div class="form-group">
											<span class="form-label">Adults</span>
											<select class="form-control" name="adultes" value="{{$rdv->adultes}}">
												<option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option>
											</select>
											<span class="select-arrow"></span>
										</div>
						</div>

                        <div class="col-sm-4">
										<div class="form-group">
											<span class="form-label">Children</span>
											<select class="form-control" name="enfants" value="{{$rdv->enfants}}">
												<option value="0">0</option>
												<option value="1">1</option>
												<option value="2">2</option>
											</select>
											<span class="select-arrow"></span>
										</div>
									</div>
						</div>
                            <div class="form-group row">
                                <div class="col-sm-9">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <a class="btn btn-primary" href="{{route('rdvs.index')}}">Back</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </form>
            </div>
        </div>
    </div>
</div>
<br> <br>
    @endsection