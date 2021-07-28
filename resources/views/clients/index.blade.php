@extends('layouts.app2')

@section('content')
    <br>    <br>
    <br>

    <div style="font-family:Comic Sans MS; ">
    <h2 style="font-size:20px; text-align: center; font-weight:900; color:DarkSlateGrey;">COSTUMERS</h2>
    </div>
    <link href="{{asset('assets2/libs/datatables/media/css/jquery.dataTables.min.css') }}" rel="stylesheet">

    @if(auth()->user()->role=="Client")
    <div align="center">
    <a class="btn btn-primary btn-sm rounded-0" href="{{route('clients.create') }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add"><i class="fa fa-table"></i></a>
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
                                    <th>Last name</th>
                                    <th>First name</th>
                                    <th>Address</th>
                                    <th>Email</th>
                                    <th>Mobile No</th>
                                    <th>Age</th>
                                    <th>Gender</th>
                                    <th>City</th>
                                    @if(auth()->user()->role=="Client")
                                    <th>Actions</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($clients as $client)
                                @if(auth()->user()->email == $client->email)
                                    <tr>
                                        <td>{{++$i}}</td>
                                        <td>{{$client->nom}}</td>
                                        <td>{{$client->prenom}}</td>
                                        <td>{{$client->adresse}}</td> 
                                        <td>{{$client->email}}</td> 
                                        <td>{{$client->tel}}</td> 
                                        <td>{{$client->age}}</td>
                                        <td>{{$client->sexe}}</td>
                                        <td>{{$client->ville}}</td> 
                                        @if(auth()->user()->role=="Client")
                                        <td>
                                            <form action="{{route('clients.destroy',$client->id)}}" method="POST">
                                         
                                            <!-- <a class="btn btn-primary"   href="{{route('clients.show',$client->id) }}">Show</a> -->
                                            <a class="btn btn-success btn-sm rounded-0"   href="{{route('clients.edit',$client->id) }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                                                    @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm rounded-0" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="fa fa-trash"></i></button>
                                                @endif
                                            </form>
                                        </td>   
                                    </tr>
                                @endif
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