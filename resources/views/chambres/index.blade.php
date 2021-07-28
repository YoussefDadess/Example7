@extends('layouts.app2')
@section('content')

<br><br><br>

    @if(auth()->user()->role=="Admin")

    <div align="center">
    <a class="btn btn-primary btn-sm rounded-0" href="{{route('chambres.create') }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add"><i class="fa fa-table"></i></a>
    </div>
    @endif
<br>

@if($message=Session::get('success'))
    <div class="alert alert-info">
        <p>{{ $message }}</p>
    </div>
@endif

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                
                        <table class="table table-bordered" >
                            <thead class="table-gray" style="background-color:silver;">
                                <tr>
                                    <th>#</th>
                                    <th>Hotel name</th>
                                    <th>Room type</th>
                                    <th>Floor</th>
                                    <th>Price</th>
                                    <th>Residential area</th>
                                    <th>Equipments</th>
                                    <th>Status</th>
                                    @if(auth()->user()->role=="Admin")

                                    <th>Actions</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($chambres as $chambre)
                                    <tr>
                                @if(auth()->user()->email == $chambre->hotel->user->email)
                                        <td>{{++$i}}</td>
                                        <td>{{$chambre->hotel->nom}}</td>
                                        <td>{{$chambre->typechambre->titre}}</td>
                                        <td>{{$chambre->etage}}</td>
                                        <td>{{$chambre->prix}} {{$chambre->devise}}</td>
                                        <td>{{$chambre->zone_residentielle}}</td>
                                        <td>{{$chambre->equipement}}</td>
                                        <td>{{$chambre->etat}}</td>
                                        @if(auth()->user()->role=="Admin")

                                        <td>
                                            <form action="{{route('chambres.destroy',$chambre->id)}}" method="POST">
                                            <!-- <a class="btn btn-primary"   href="{{route('chambres.show',$chambre->id) }}">Show</a> -->
                                            <a class="btn btn-success btn-sm rounded-0"   href="{{route('chambres.edit',$chambre->id) }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                                                    @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm rounded-0" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>   
                                        @endif
                                    @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
            </div>
        </div>
    </div>
</div>
<br><br>
@endsection

@section('scripts')

<script src="{{asset('assets2/libs/datatables/media/js/jquery.dataTables.min.js')}}"></script>

  <script>
  $(document).ready(function(){
        $('.table').DataTable();
  });
  </script>
@endsection
@section('head1')

<link href="{{asset('assets2/libs/datatables/media/css/jquery.dataTables.min.css') }}" rel="stylesheet">
@endsection