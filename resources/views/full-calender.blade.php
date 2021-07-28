@extends('layouts.app2')

@section('content')
<br><br><br>

 <div class="col-sm-4">
          <!--  <div class="form-group row">
                <label for="fname" class="col-sm-3 text-right control-label col-form-label"><font color="blue"><strong>hotel:</strong></font></label>
                <div class="col-sm-9">
                    <select class="form-control" id="hotel_id"  name="hotel_id">
                        <option value="0">All</option>

                        @foreach($hotels as $hotel)
                            <option value="{{ $hotel->id }}">{{ $hotel->nom}}</option>
                        @endforeach
                    </select>
                </div>
            </div>-->
  

  <div class="form-group row">
        <label for="fname" class="col-sm-3 text-right control-label col-form-label"><strong>Hotel :</strong></label>
        <div class="col-sm-9">
            <select class="form-control" id="hotel_id"  name="hotel_id">
                <option value="0">All</option>
                @foreach($hotels as $hotel)
                    <option value="{{ $hotel->id }}">{{ $hotel->nom }}</option>
                @endforeach
            </select>
        </div>
    </div> 
    </div> 
    
    

   
  <font color="DarkBlue">
<div class="container">
    <br />
    <h1 class="text-center text-primary"><u>  <font color="black" style="font-family:fantasy;">CALENDAR</font></u></h1>
    <br />
    {{-- @foreach($rdvs as $rdv)
    {{ $rdv }}
    @endforeach
    <br><br><br><br> --}}
    {{-- @foreach($events as $event)
    {{ $event }}
    @endforeach --}}
    <div id="calendar"></div>

</div>
   
<br><br>
@endsection

@section('scripts')
<script>

    $(document).ready(function () {
    
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        init_calendar(0);

        // $('#hotel_id').on('change',function(){
        //     let id1 = $(this).val();
        //     $('#calendar').fullCalendar('destroy');
        //     init_calendar(id1);
        // })

        // $('#typechambre_id').on('change',function(){
        //     let id = $(this).val();
        //     $('#calendar').fullCalendar('destroy');
        //     init_calendar(id);
        // })

        // $('#chambre_id').on('change',function(){
        //     let id = $(this).val();
        //     $('#calendar').fullCalendar('destroy');
        //     // prompt(id)
        //     init_calendar(id);
        // })
        $('#hotel_id').on('change',function(){
            let id = $(this).val();
            $('#calendar').fullCalendar('destroy');
            init_calendar(id);
        })


        
    
    });

   function init_calendar(id){
    var calendar = $('#calendar').fullCalendar({
            editable:true,
            header:{
                left:'prev,next today',
                center:'title',
                right:'month,agendaWeek,agendaDay'
            },
            events:'/full-calender/'+id,
            selectable:true,
            selectHelper: true,
            select:function(start, end, allDay)
            {
                // var title = prompt('Event Title:');
    
                // if(title)
                // {
                    var start = $.fullCalendar.formatDate(start, 'Y-MM-DD HH:mm:ss');
    
                    var end = $.fullCalendar.formatDate(end, 'Y-MM-DD HH:mm:ss');
                    
                    // $.ajax({
                    //     url:"/full-calender/action",
                    //     type:"POST",
                    //     data:{
                    //         title: title,
                    //         start: start,
                    //         end: end,
                    //         type: 'add'
                    //     },
                    //     success:function(data)
                    //     {
                    //         calendar.fullCalendar('refetchEvents');
                    //         alert("Event Created Successfully");
                    //     }
                    // })
                // }
            
            },
        });
        return calendar;
   }
      
</script>
      
@endsection                         
                
@section('scripts1')
<script src="{{asset('assets2/libs/popper.js/dist/umd/popper.min.js')}}"></script>
<script src="{{asset('assets2/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
<script src="{{asset('dist/js/app-style-switcher.js')}}"></script>
<script src="{{asset('dist/js/feather.min.js')}}"></script>
<script src="{{asset('dist/js/sidebarmenu.js')}}"></script>
<script src="{{asset('dist/js/custom.min.js')}}"></script>  
@endsection
@section('head1')
<meta name="csrf-token" content="{{ csrf_token() }}"/>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
@endsection