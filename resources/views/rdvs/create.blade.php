@extends('layouts.app2')

@section('content')
<br><br><br><br>

	<div id="booking" class="section">
		<div class="section-center">
			<div class="container">
				<div class="row">
					<div class="col-md-7 col-md-push-5">
						<div class="booking-cta">
							<h1>Make your reservation</h1>
						</br><p>" Chilling out on the bed in your hotel room watching television, while wearing your own pajamas, is sometimes the best part of a vacation. "</br></br><span style="font-weight:900; color:darkred;">- Laura Marano</span></p>
						</div>
					</div>
					<div class="col-md-5 col-md-pull-8">
						<div class="booking-form">
							<form action="{{route('rdvs.store')}}" method="POST">
							@csrf
							
							<!-- <div class="form-group">
									<span class="form-label">Client name </span>
                                    <select class="form-control" name="client_id" >
										@foreach($clients as $client)
										@if(auth()->user()->email == $client->email)
										<option value="{{ $client->id }}">{{ $client->nom }} {{ $client->prenom }} </option>
                           			 @endif
											
										@endforeach
                                    </select>
							</div> -->


                            <div class="form-group">
									<span class="form-label">Your Destination</span>
                                    <select class="form-control" name="hotel_id" id="list">
										@foreach($hotels as $hotel)
											<option value="{{ $hotel->ville }}">{{ $hotel->ville }}</option>
										@endforeach
                                    </select>
							</div>


								<!-- <script>
									function getselectValue(){
										var selectedvalue = document.getElementById("list").value;
										console.log(selectedvalue);
									}
									getselectValue();
								</script> -->
                                
							

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
											<input class="form-control" type="datetime-local" name="start" required>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<span class="form-label">Check out</span>
											<input class="form-control" type="datetime-local" name="end" required>
										</div>
									</div>

								</div>

								<div class="row">
									<div class="col-sm-4">
										<div class="form-group">
											<span class="form-label">Rooms</span>
											<select class="form-control" name="capacite">
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
											<select class="form-control" name="adultes">
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
											<select class="form-control" name="enfants">
												<option value="0">0</option>
												<option value="1">1</option>
												<option value="2">2</option>
											</select>
											<span class="select-arrow"></span>
										</div>
									</div>
								</div>
								<div class="form-btn">
								<button type="submit" class="btn btn-primary">Check availability</button>
                                <a class="btn btn-danger" href="/">Cancel</a>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</br></br>
@endsection
@section('scripts')
<script>
	$(document).ready(function(){
		 $("#list").on("change", function(){
			 let city_id = $(this).val();
			 $.ajax({
				 url: "{{url('/gethotels')}}/"+city_id,
				 type: "get",
				 success: function(data){
					$("#listhotels").empty();
					data.forEach(hotel => {
						let option = ' <option value="'+hotel.id+'">'+hotel.nom+'</option>'
						$("#listhotels").append(option)
					});
				 },
				 error: function(error){
					 console.log(error);
				 }
			 })
		 })
	})
</script>
@endsection

@section('head1')
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">

<!-- Bootstrap -->
<link type="text/css" rel="stylesheet" href="Booking/css/bootstrap.min.css" />

<!-- Custom stlylesheet -->
<link type="text/css" rel="stylesheet" href="Booking/css/style.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@endsection