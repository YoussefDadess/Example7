@extends('layouts.app2')

@section('content')
    <br>    <br>
    <br>

    <div style="padding-left:35%; color:#e0e0eb; font-family:Helvetica;">
    <h2>ADD NEW RESERVATION</h2>
    <br>

    @if($errors->any())
    <div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
    @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
    </ul>
    </div>
    @endif                                 

    <div class="container-fluid" >
        <div class="row">
            <div class="col-md-8">
                <div class="card">
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
    </div>
    </div>
    <br>
    <br>

@endsection

@section('scripts')
<script>                          
    $(document).ready(function(){
        $('#date_rdv').datepicker({
            
            beforeShowDay: $.datepicker.noWeekends,
            minDate: 'today',
            dateFormat: 'dd/mm/yy',
            
        });
        });
    
</script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    
@endsection
@section('head1')
    <link rel="stylesheet" href="https://ajax.aspnetcdn.com/ajax/jquery.ui/1.10.4/themes/pepper-grinder/jquery-ui.css">


@endsection

        
