@extends('layouts.Backend.master')
@section('title')
Edit Trailer
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
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <form id="form_{{$trailer->id}}" action="{{route('trailers.update',$trailer)}}" method="POST">
                        @csrf
                        @method('put')
                        <input type="hidden" name="trailer_id" id="trailer_id" value="{{$trailer->id}}" />
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-bold fs-6 mb-2">Trailer Name</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" name="trailer_name" id="trailer_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Trailer Name" value="{{$trailer->trailer_name}}" />
                            <!--end::Input-->
                        </div>

                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-bold fs-6 mb-2">Pricing and Time</label>
                            <!--end::Label-->
                            
                            <table class="table table-bordered" id="dynamic_field">  
                                @if(count($trailer->trailer_timming) > 0)
                                @php $a = 0; @endphp
                                @foreach($trailer->trailer_timming as $address)
                                @php $a++; @endphp
                                @if($loop->last)
                                <input type="hidden" name="key" id="key" value="{{$a}}" />
                                @endif
                                <tr>  
                                    <td>
                                        <input type="number" name="addmore[{{$a}}][price]" placeholder="Enter Price" class="form-control price_list" value="{{$address->price ?? ''}}" />
                                        <select name="addmore[{{$a}}][time]" class="form-control time_list" >
                                            <option value="">Select Time</option>
                                            <option value="3 - 6 hrs" {{ $address->time == '3 - 6 hrs' ? 'selected' : '' }}>3 - 6 hrs</option>
                                            <option value="6 - 12 hrs" {{ $address->time == '6 - 12 hrs' ? 'selected' : '' }}>6 - 12 hrs</option>
                                            <option value="24 hrs (1 Day)" {{ $address->time == '24 hrs (1 Day)' ? 'selected' : '' }}>24 hrs (1 Day)</option>
                                            <option value="24 - 48 hrs (2 Days)" {{ $address->time == '24 - 48 hrs (2 Days)' ? 'selected' : '' }}>24 - 48 hrs (2 Days)</option>
                                            <option value="48 - 72 hrs (3 Days)" {{ $address->time == '48 - 72 hrs (3 Days)' ? 'selected' : '' }}>48 - 72 hrs (3 Days)</option>
                                            <option value="72 - 96 hrs (4 Days) " {{ $address->time == '72 - 96 hrs (4 Days)' ? 'selected' : '' }}>72 - 96 hrs (4 Days) </option>
                                            <option value="96 - 120 hrs (5 Days)" {{ $address->time == '96 - 120 hrs (5 Days)' ? 'selected' : '' }}>96 - 120 hrs (5 Days)</option>
                                        </select>
                                    </td>
                                    @if(($loop->first))  
                                    <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>  
                                    @else
                                    <td>
                                        <button type="button" class="btn btn-danger btn_remove">x</button>
                                    </td>
                                    @endif
                                </tr> 
                                @endforeach
                                @endif 
                            </table> 
                        </div>
                         <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-bold fs-6 mb-2">Per Hour Price</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" name="per_hour_price" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Enter Per Hour Price"  required value="{{$trailer->per_hour_price}}" />
                            <!--end::Input-->
                        </div>

                        <div class="text-center pt-15">
                            <button type="submit" class="btn btn-success" data-kt-users-modal-action="submit">
                                <span class="indicator-label">Update</span>
                                <span class="indicator-progress">Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2">
                                    </span>
                                </span>
                            </button>
                        </div>
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
@include('layouts.sweetalert.sweetalert_js')
<script>
    var i=$('#key').val();  

    $('#add').click(function(){  
        i++;  
        $('#dynamic_field').append('<tr class="dynamic-added"><td><input type="number" name="addmore['+i+'][price]" placeholder="Enter Price" class="form-control price_list" /><select name="addmore['+i+'][time]" class="form-control time_list" ><option value="">Select Time</option><option value="3 - 6 hrs">3 - 6 hrs</option><option value="6 - 12 hrs">6 - 12 hrs</option><option value="24 hrs (1 Day)">24 hrs (1 Day)</option><option value="24 - 48 hrs (2 Days)">24 - 48 hrs (2 Days)</option><option value="48 - 72 hrs (3 Days)">48 - 72 hrs (3 Days)</option><option value="72 - 96 hrs (4 Days) ">72 - 96 hrs (4 Days) </option><option value="96 - 120 hrs (5 Days)">96 - 120 hrs (5 Days)</option></select></td><td><button type="button" name="remove" class="btn btn-danger btn_remove">X</button></td></tr>');  
    });  

    $(document).on('click', '.btn_remove', function(){  
        // var button_id = $(this).attr("id");   
        // $('#row'+button_id+'').remove();  
        $(this).parents('tr').remove();
    });
</script>
@endsection