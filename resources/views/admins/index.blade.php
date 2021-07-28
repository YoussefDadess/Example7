@extends('layouts.app2')

@section('content')
    <br>    <br>
    <br>

    <div style="font-family:Comic Sans MS; ">
    <h2 style="font-size:20px; text-align: center; font-weight:900; color:DarkSlateGrey;">ADMINISTRATOS</h2>
    </div>
    <link href="{{asset('assets2/libs/datatables/media/css/jquery.dataTables.min.css') }}" rel="stylesheet">

    
    <div align="center">
    <a class="btn btn-primary btn-sm rounded-0" href="{{route('admins.create')}}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add"><i class="fa fa-table"></i></a>
    </div>
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
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($admins as $admin)
                                @if(auth()->user()->email == $admin->email)
                                    <tr>
                                        <td>{{++$i}}</td>
                                        <td>{{$admin->nom}}</td>
                                        <td>{{$admin->prenom}}</td>
                                        <td>{{$admin->adresse}}</td> 
                                        <td>{{$admin->email}}</td> 
                                        <td>{{$admin->tel}}</td> 
                                        <td>{{$admin->age}}</td>
                                        <td>{{$admin->sexe}}</td>
                                        <td>{{$admin->ville}}</td> 
                                        
                                        <td>
                                            <form action="{{route('admins.destroy',$admin->id)}}" method="POST">
                                            <!-- <a class="btn btn-primary"   href="{{route('admins.show',$admin->id) }}">Show</a> -->
                                            <a class="btn btn-success btn-sm rounded-0"   href="{{route('admins.edit',$admin->id) }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                                                    @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm rounded-0" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="fa fa-trash"></i></button>
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