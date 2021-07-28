@extends('layouts.app2')

@section('content')

<br><br><br>
@if($message=Session::get('success'))
    <div class="alert alert-info">
        <p>{{ $message }}</p>
    </div>
@endif
    <br>
    <div style="font-family:Comic Sans MS; ">
    </div>
    @if(auth()->user()->role=="Admin")
    <div align="center">
        <a class="btn btn-primary btn-sm rounded-0" href="{{route('hotels.create') }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add"><i class="fa fa-table"></i></a>
        </div>
        @endif
<br>

<div class="row row-cols-1 row-cols-md-3 g-4">
@foreach($hotels as $hotel)
@if(auth()->user()->id == $hotel->user->id || auth()->user()->role=="Client")
<div class="col">
<div class="card" >
<img src="{{ Storage::url($hotel->image) }}" height="250" width="150" class="card-img-top" alt="..."> 
<div class="card-body">
<h5 class="card-title">{{$hotel->nom}} - {{$hotel->categorie}} </h5>
<p class="card-text">{{$hotel->ville}} - Morocco.</p>
<form action="{{route('hotels.destroy',$hotel->id)}}" method="POST">
<a href="{{route('hotels.show',$hotel->id) }}" class="btn btn-primary">View More</a>
@if(auth()->user()->role=="Admin")

<a class="btn btn-success btn-sm rounded-0"   href="{{route('hotels.edit',$hotel->id) }}" data-placement="top" data-original-title="Edit"><i class="fa fa-edit"></i></a>
@csrf
@method('DELETE')
<button type="submit" class="btn btn-danger btn-sm rounded-0" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="fa fa-trash"></i></button>
@endif

</form>
</div>
</div>
</div>
@endif

@endforeach

</div>



<style>
img {
  opacity: 0.9;
  box-shadow: 8px 8px 2px grey;
  border-radius: 8px;
  
}
img:hover {
  opacity: 1.0;
}
</style>

<div class="col-md-12" >
{{$hotels->links()}}
</div>
</div> 

 
</div> 
<br><br>
@endsection




@section('head1')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

@endsection

