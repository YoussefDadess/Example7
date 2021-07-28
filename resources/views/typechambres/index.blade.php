@extends('layouts.app2')

@section('content')

    <br>    <br>
    <br>

    <div style="font-family:Comic Sans MS; ">
    <h2 style="font-size:20px; text-align: center; font-weight:900; color:DarkSlateGrey;">ALL ROOM TYPES</h2>
    </div>

    <link href="{{asset('assets2/libs/datatables/media/css/jquery.dataTables.min.css') }}" rel="stylesheet">



    <div align="center">
        <a class="btn btn-primary btn-sm rounded-0" href="{{route('typechambres.create')}}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add"><i class="fa fa-table"></i></a>
        </div>
        <br>


@if($message=Session::get('success'))
    <div class="alert alert-info">
        <p>{{ $message }}</p>
    </div>
@endif

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

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    
                            <table class="table table-bordered">
                                <thead class="table-gray" style="background-color:silver;">
                                    <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($typechambres as $typechambre)
                                    <tr>
                                        <td>{{++$i}}</td>
                                        <td>{{$typechambre->titre}}</td>
                                        <td>
                                            <form action="{{route('typechambres.destroy',$typechambre->id)}}" method="POST">
                                            <a class="btn btn-success btn-sm rounded-0"   href="{{route('typechambres.edit',$typechambre->id) }}"  data-placement="top" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                                                    @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm rounded-0" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>   
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
            </div>
        </div>
    </div>
</div>


<!-- Create Modal -->
{{-- <div class="modal fade" id="addroomtype" tabindex="-1" aria-labelledby="addroomtypeLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="font-family:cursive; color:DarkGoldenRod;">ADD ROOM TYPE : </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
       </div>

      <div class="modal-body">
      <form action="{{route('typechambres.store')}}" method="POST">
                    @csrf
                        <form class="form-horizontal">


                            <div class="card-body">

                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label"><strong>Title :</strong></label>
                                        <div class="col-sm-9">
                                        <input type="text" name="titre" class="form-control">
                                        </div>
                                        </div>

                            </div>

                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>

                                    
                                    </form>
                                    </form>
                                    </div>

      

    </div>
  </div>
</div> --}}
<br>
<br>

<!-- End create modal ----->


@endsection


