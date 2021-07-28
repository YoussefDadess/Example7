@extends('layouts.app2')

@section('content')
<br>
<br>
<br>
<br>
    <div style="font-family:Comic Sans MS; ">
    <h2 style="font-size:20px; text-align: center; font-weight:900; color:DarkSlateGrey;">RESERVATIONS</h2>

    <link href="{{asset('assets2/libs/datatables/media/css/jquery.dataTables.min.css') }}" rel="stylesheet">

    @if(auth()->user()->role=="Client")  
    <div align="center">
    <a class="btn btn-primary btn-sm rounded-0" href="{{route('rdvs.create') }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add"><i class="fa fa-table"></i></a>
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
                
                        <table class="table table-bordered">
                            <thead class="table-gray" style="background-color:silver;">
                                <tr>
                                    <th>#</th>
                                    <th>Client name</th>
                                    <th>Hotel name</th>
                                    <th>Check In</th>
                                    <th>Check out</th>
                                    <th>Adults</th>
                                    <th>Childen</th>
                                    <th>Room type</th>
                                    <th>Rooms</th>
                                    @if(auth()->user()->role=="Client")
                                    <th>Actions</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($rdvs as $rdv)
                                    <tr>
                                    @if(auth()->user()->email == $rdv->user->email)
                                        <td>{{++$i}}</td>
                                        <td>{{$rdv->client->nom}} {{$rdv->client->prenom}}</td>
                                        <td>{{$rdv->hotel->nom}}</td>
                                        <td>{{$rdv->start}}</td>
                                        <td>{{$rdv->end}}</td>
                                        <td>{{$rdv->adultes}}</td> 
                                        <td>{{$rdv->enfants}}</td> 
                                        <td>{{$rdv->chambre->typechambre->titre}}</td>
                                        <td>{{$rdv->capacite}}</td> 
                                        @if(auth()->user()->role=="Client")
                                        <td>
                                            <form action="{{route('rdvs.destroy',$rdv->id)}}" method="POST">
                                               <!-- <a class="btn btn-primary"   href="{{route('rdvs.show',$rdv->id) }}">Show</a> -->
                                              
                                               <a class="btn btn-success btn-sm rounded-0"   href="{{route('rdvs.edit',$rdv->id) }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                                                    @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm rounded-0" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="fa fa-trash"></i></button>
                                                @endif
                                            </form>
                                        </td>  
                                        @endif 
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
            </div>
        </div>
    </div>
</div>
<br>
<br>

@endsection

@section('scripts')

<script src="{{asset('assets2/libs/datatables/media/js/jquery.dataTables.min.js')}}"></script>

  <script>
  $(document).ready(function(){
        $('.table').DataTable();
  });
  </script>
  @endsection