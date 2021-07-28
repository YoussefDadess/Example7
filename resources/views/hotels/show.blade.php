@extends('layouts.app2')

@section('content')
<br><br><br>

    <div class="row">
        <div class="col-lg-12 margin-tb">
        @if(auth()->user()->role=="Admin")
            <div style="padding-left:92%;">
            <a class="btn btn-secondary"  role="button" href="{{ route('chambres.create')}}">+</a>
            </div>
        @endif

        </div>
    </div>

        
    <div class="row" >
  <div class="col-md-4" >
      <div id="carouselExampleIndicators" data-ride="carousel" class="carousel slide" >
        <?php   $i=1  ; ?>    
                             @foreach($images as $image)
                             @if($hotel->id==$image->hotel_id)
                             <?php $im[$i]=$image->image; ?> 
                             <!-- <img  src="{{Storage::url($image->image)}}" height="70" width="100" alt="" /> -->
                             <?php   $i++; ?>
                          @endif
                             @endforeach

            <ol class="carousel-indicators">
              <li  data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></li>
              <li  data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" ></li>
              <li  data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" ></li>
              <li  data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" ></li>
              <li  data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" ></li>
              <li  data-bs-target="#carouselExampleIndicators" data-bs-slide-to="5" ></li>
              <li  data-bs-target="#carouselExampleIndicators" data-bs-slide-to="6" ></li>
              <li  data-bs-target="#carouselExampleIndicators" data-bs-slide-to="7" ></li>
              <li  data-bs-target="#carouselExampleIndicators" data-bs-slide-to="8" ></li>
              <li  data-bs-target="#carouselExampleIndicators" data-bs-slide-to="9" ></li>
            </ol>
        <div class="carousel-inner">
              @if(isset($im[1]))
                <div class="carousel-item active">
                  <img src="{{Storage::url($im[1])}}" class="d-block w-100" alt="...">
                </div>
                @endif
                @if(isset($im[2]))
                <div class="carousel-item">
                  <img  src="{{Storage::url($im[2])}}" class="d-block w-100" alt="...">
                </div>
                @endif
                @if(isset($im[3]))
                <div class="carousel-item">
                  <img   src="{{Storage::url($im[3])}}" class="d-block w-100" alt="...">
                </div>
                @endif
                @if(isset($im[4]))
                <div class="carousel-item">
                  <img   src="{{Storage::url($im[4])}}" class="d-block w-100" alt="...">
                </div>
                @endif
                @if(isset($im[5]))
                <div class="carousel-item">
                  <img   src="{{Storage::url($im[5])}}" class="d-block w-100" alt="...">
                </div>
                @endif
                @if(isset($im[6]))
                <div class="carousel-item">
                  <img   src="{{Storage::url($im[6])}}" class="d-block w-100" alt="...">
                </div>
                @endif
                @if(isset($im[7]))
                <div class="carousel-item">
                  <img   src="{{Storage::url($im[7])}}" class="d-block w-100" alt="...">
                </div>
                @endif
                @if(isset($im[8]))
                <div class="carousel-item">
                  <img   src="{{Storage::url($im[8])}}" class="d-block w-100" alt="...">
                </div>
                @endif
                @if(isset($im[9]))
                <div class="carousel-item">
                  <img   src="{{Storage::url($im[9])}}" class="d-block w-100" alt="...">
                </div>
                @endif
                @if(isset($im[10]))
                <div class="carousel-item">
                  <img   src="{{Storage::url($im[10])}}" class="d-block w-100" alt="...">
                </div>
                @endif
</div>              
</div></div>



<div class="col-md-8" >
<h2 style="color:#05465c; background-image:linear-gradient(to right, LightGray,white); font-family:cursive;"><i class="fa fa-hotel" style="font-size:48px;color:Slateblue;"></i><span style="font-weight:bold; color:darkred;"> {{ $hotel->nom }}</span> - {{$hotel->ville }} 
             <span style="font-size:15px;" > 
                @if($hotel -> categorie == "1*")
                <i class="fa fa-star"></i>
                @elseif($hotel -> categorie == "2*")
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                @elseif($hotel -> categorie == "3*")
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                @elseif($hotel -> categorie == "4*")
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                @elseif($hotel -> categorie == "5*")
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                @endif
               </span>
               </h2>

               <div class="card-header d-flex p-0">
              <h3 class="card-title p-3"><span style="font-weight:bold; font-family:cursive;">Details</span></h3>
                <ul class="nav nav-pills ml-auto p-2">
                  <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Overview</a></li>
                  <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">About</a></li>
                  @if(auth()->user()->role =="Client")
                   <li class="nav-item"><a style="color:CadetBlue; font-weight:bold;" class="nav-link" href="{{route('rdvs.create') }}" >Je reserve</a></li> 
                @endif
                </ul>
              </div><!-- /.card-header -->









<div class="tab-content">

    <div class="tab-pane active" id="tab_1">
                  <p> </br> {{$hotel->description}}</p>
    </div>
                  <!-- /.tab-pane -->
      <div class="tab-pane" id="tab_2">

        <div class="col-xs-12 col-sm-12 col-md-12">
               <label for="fname" class="col-sm-3 text-right control-label col-form-label"><strong>Ville :</strong></label> <span style="color:darkred; font-weight:bold;"> {{ $hotel->ville }} </span>
        </div>

          <div class="col-xs-12 col-sm-12 col-md-12">
            <label for="fname" class="col-sm-3 text-right control-label col-form-label"><strong>Address :</strong></label> <span style="color:darkred; font-weight:bold;"> {{ $hotel->adresse }} </span>
          </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
              <label for="fname" class="col-sm-3 text-right control-label col-form-label"><strong>Phone :</strong></label> <span style="color:darkred; font-weight:bold;"> {{ $hotel->tel }} </span>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
            <label for="fname" class="col-sm-3 text-right control-label col-form-label"><strong>Zip Code :</strong></label> <span style="color:darkred; font-weight:bold;">  {{ $hotel->code_postale }} </span>
            </div>

       
              <div class="col-xs-12 col-sm-12 col-md-12">
              <label for="fname" class="col-sm-3 text-right control-label col-form-label"><strong>Categorie :</strong></label> <span style="color:darkred; font-weight:bold;"> {{ $hotel->categorie }} </span>
              </div>

       
                      <div class="col-xs-12 col-sm-12 col-md-12">
                      <label for="fname" class="col-sm-3 text-right control-label col-form-label"><strong>Rooms number :</strong></label>
                              <?php $j=0 ?>
                              @foreach($chambres as $chambre)
                      @if($chambre->hotel_id == $hotel->id && $chambre->hotel->nom == $hotel->nom)
                      <?php $j+=$chambre->capacite; ?>   
                      @endif
                      @endforeach
                      <span style="color:darkred; font-weight:bold;"> {{$j}} Rooms </span>
                      </div>
        
                        <div class="col-xs-12 col-sm-12 col-md-12">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label"><strong>Single Rooms :</strong></label>
                            <?php $j=0 ?>
                            @foreach($chambres as $chambre)
                    @if($chambre->hotel_id == $hotel->id && $chambre->hotel->nom == $hotel->nom && $chambre->typechambre->titre == "Single")
                    <?php $j+=$chambre->capacite; ?>   
                    @endif
                    @endforeach
                    <span style="color:darkred; font-weight:bold;">  {{$j}} Rooms </span>
                    </div>

      
                <div class="col-xs-12 col-sm-12 col-md-12">
                <label for="fname" class="col-sm-3 text-right control-label col-form-label"><strong>Double Rooms :</strong></label>
                        <?php $j=0 ?>
                        @foreach($chambres as $chambre)
                @if($chambre->hotel_id == $hotel->id && $chambre->hotel->nom == $hotel->nom && $chambre->typechambre->titre == "Double")
                <?php $j+=$chambre->capacite; ?> 
                @endif
                @endforeach
                <span style="color:darkred; font-weight:bold;">  {{$j}} Rooms </span>
                </div>
        
                          <div class="col-xs-12 col-sm-12 col-md-12">
                          <label for="fname" class="col-sm-3 text-right control-label col-form-label"><strong>Twin Rooms :</strong></label>
                                  <?php $j=0 ?>
                                  @foreach($chambres as $chambre)
                          @if($chambre->hotel_id == $hotel->id && $chambre->hotel->nom == $hotel->nom && $chambre->typechambre->titre == "Twin")
                          <?php $j+=$chambre->capacite; ?>  
                          @endif
                          @endforeach
                          <span style="color:darkred; font-weight:bold;">  {{$j}} Rooms </span>
                          </div>
        

                              <div class="col-xs-12 col-sm-12 col-md-12">
                              <label for="fname" class="col-sm-3 text-right control-label col-form-label"><strong>Tripple Rooms :</strong></label>
                                      <?php $j=0 ?>
                                      @foreach($chambres as $chambre)
                              @if($chambre->hotel_id == $hotel->id && $chambre->hotel->nom == $hotel->nom && $chambre->typechambre->titre == "Tripple")
                              <?php $j+=$chambre->capacite; ?>  
                              @endif
                              @endforeach
                              <span style="color:darkred; font-weight:bold;">  {{$j}} Rooms </span>
                              </div>
        
                          <div class="col-xs-12 col-sm-12 col-md-12">
                          <label for="fname" class="col-sm-3 text-right control-label col-form-label"><strong>Quadr Rooms :</strong></label>
                                  <?php $j=0 ?>
                                  @foreach($chambres as $chambre)
                          @if($chambre->hotel_id == $hotel->id && $chambre->hotel->nom == $hotel->nom && $chambre->typechambre->titre == "Quadruple")
                          <?php $j+=$chambre->capacite; ?>   
                          @endif
                          @endforeach
                          <span style="color:darkred; font-weight:bold;">  {{$j}} Rooms </span>
                          </div>

        
        <div class="col-xs-12 col-sm-12 col-md-12">
        <label for="fname" class="col-sm-3 text-right control-label col-form-label"><strong>Status :</strong></label> <span style="color:darkred; font-weight:bold;"> {{ $hotel->etat }}
        </span>
        </div>
</div>

</div>





</div></div>



<br><br>
@endsection
@section('head1')
<style>
   .fa-star{
   color:Gold;
    }
</style>

@endsection


