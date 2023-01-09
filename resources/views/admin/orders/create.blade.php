@extends('layouts.Backend.master')
@section('title')
Admin Orders
@endsection
@section('css')
@include('layouts.sweetalert.sweetalert_css')
@endsection
@section('content')
<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container">
            <!--begin::Card-->
            <div class="card">
                <div class="card-body pt-0">
                    <form class="header_form mt-5" id="trailor_book" method="GET" action="{{ route('admin.order-trailer') }}">
                        <div class="input mb-5 position-relative">
                            <select name="trailer_id" id="trailer_id" class="form-control w-100" required>
                                <option value="">Type of trailer</option>
                                @if(count($trailers) > 0)
                                @foreach($trailers as $trailer)
                                <option value="{{$trailer->id}}">{{$trailer->trailer_name}}</option>
                                @endforeach
                                @endif
                            </select>
                            <span class="text-danger name_valid">{{$errors->first('trailer_id')}}</span>
                        </div>
                        <!-- Atif old work uncommented====================== -->
                         <div class="input mb-5 position-relative">
                            <input type="text" name="date" class="d-block form-control w-100" id="datePut" placeholder="Hire Period" required>
                           
                            <span class="text-danger name_valid">{{$errors->first('date')}}</span>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <label class="label text-white " >Pickup Date: <span class="picktimelabel"></span></label>
                                <div class="input mb-5 position-relative">
                                    <input type="text" name="start_time" class="d-block timepicker form-control w-100 time " id="disableTimeRangesExample" placeholder="Pickup time" required disabled>
                                   
                                    <span class="text-danger name_valid">{{$errors->first('start_time')}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                  <label class="label text-white " >Dropoff Date: <span class="droptimelabel"></span></label>
                                <div class="input mb-5 position-relative">
                                    <input type="text" name="end_time" class="d-block timepicker form-control w-100 time" id="droptimeInput" placeholder="Dropoff time" required>
                                   
                                    <span class="text-danger name_valid">{{$errors->first('end_time')}}</span>
                                </div>
                            </div>
                        </div>
                        @guest
                        <a href="#" class="me-3 btn btn_yellow" data-bs-toggle="modal" data-bs-target="#loginModal">Search</a>
                        @else
                        <!-- style="opacity: 0.6;cursor: not-allowed;" -->
                        <button type="submit"  class="me-3 btn btn_yellow" >Search</button>
                        @endguest
                    </form>
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>
<!--end::Content-->
@endsection
@section('script')
<script type="text/javascript">
        const timeDisabled = (time) => {
        const stringTime = time.map(String)
        $('#disableTimeRangesExample').timepicker({ 'step': 60, 'disableTimeRanges': [
                [stringTime[0], stringTime[1]],
                [stringTime[2], stringTime[3]],
                [stringTime[4], stringTime[5]],
                [stringTime[6], stringTime[7]],
                [stringTime[8], stringTime[9]],
                [stringTime[10], stringTime[11]],
           ] });
        }


        const dropTimeDisabled = (time) => {
            const stringTime = time.map(String)
            // console.log(stringTime);
            if (stringTime[0] == 'null') {
                console.log("if");
                $('#droptimeInput').timepicker({
                     'step': 60,
                    'disableTimeRanges': [
                        ["12:00am", stringTime[1]],
                        [stringTime[2], '11:31pm' ],
                    ]
                });
            } else {
                console.log(stringTime[0])
                console.log(stringTime[1])
                  $('#droptimeInput').timepicker({
                     'step': 60,
                    'disableTimeRanges': [
                        [stringTime[0], stringTime[1]],
                    ]
                });
            }
            // $('#search').css({
            //     'opacity': '1',
            //     'cursor': 'default'
            // });
        }
    // const dropTimeDisabled = (time) => {
    //     const stringTime = time.map(String)
    //     if(stringTime[0] != 'null')
    //     {
    //         $('#droptimeInput').timepicker({ 'disableTimeRanges': [
    //                 //    ['1am', '2am'],
                    
    //                 [stringTime[0], '11:30pm'],
    //                 ['12am', stringTime[1]],
    //         ] });
    //     }
    //     else
    //     {
    //         $('#droptimeInput').timepicker({ 'disableTimeRanges': [
    //                 //    ['1am', '2am'],
                    
    //                 // [stringTime[0], '11:30pm'],
    //                 ['12am', stringTime[1]],
    //         ] });
    //     }
    //     $('#search').css({'opacity':'1', 'cursor':'default'});
    // }


    
    $('.applyBtn').click(function () {
        var c_date;
        setTimeout(() => {
            c_date = $('#datePut').val();
            start_end_date=c_date.split('-');
            trailer_id = $('#trailer_id').val();
            if(trailer_id == '')
            {
                toastr.error("Kindly Select Trailer First"); 
                $('#disableTimeRangesExample').attr('disabled', 'disabled');
            }
            else{
                $('#disableTimeRangesExample').removeAttr('disabled', 'disabled');
                $.ajax({
                type: "POST",
                url: "{{ route('check-date') }}",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {
                    'c_date':c_date,
                    'trailer_id':trailer_id,
                } ,
                datatype: "json",
                success: function (data) {
                    if(data.success == true){
                        if(data.fulldaycheck=="full")
                        {
                           toastr.error(data.message); 
                        }
                        else{
                            toastr.success(data.message);
                        }
                        
                        timeDisabled([...data.data]);
                        $(".picktimelabel").html($.datepicker.formatDate('DD d MM', new Date(start_end_date[0])));
                        $(".droptimelabel").html($.datepicker.formatDate('DD d MM', new Date(start_end_date[1])));
                        $("input[name='start_time']").removeAttr('disabled');
                    } else {
                        toastr.error(data.message);
                        $("input[name='start_time']").attr('disabled','disabled');
                    }
                    
                    
                },
                error: function (data) {
                    console.log('Error:', data.responseJSON);
                    
                    
                }
            });
            }
        }, 100);
    });


    $('#disableTimeRangesExample').change(function () {
        var c_date= $('#datePut').val();
        var pick_time=$('#disableTimeRangesExample').val();
        let checkam_pm=pick_time.includes("pm") ? 'pm':'am';
        pick_time=pick_time.replace(checkam_pm,"");
        pick_time=pick_time.split(':');
        var date=c_date.split('-');
        console.log(date[0].trim());
        if(date[0].trim() == date[1].trim())
        {
                setTimeout(() => {
                c_date = $('#datePut').val();
                pick_time = $('#disableTimeRangesExample').val();
                trailer_id = $('#trailer_id').val();
                $.ajax({
                    type: "POST",
                    url: "{{ route('check-drop-time') }}",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: {
                        'c_date':c_date,
                        'pick_time':pick_time,
                        'trailer_id':trailer_id,
                    } ,
                    datatype: "json",
                    success: function (data) {
                        $("input[name='end_time']").removeAttr('disabled');
                        if(data.success == true){
                            dropTimeDisabled([...data.data])
                        } else {
                            dropTimeDisabled([...data.data])
                        }
                        
                        
                    },
                    error: function (data) {
                        $("input[name='end_time']").attr('disabled','disabled');
                        console.log('Error:', data.responseJSON);
                    }
                });
            }, 100);
        }
        
    });

    </script>

@endsection