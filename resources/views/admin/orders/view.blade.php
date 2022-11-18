@extends('layouts.Backend.master')
@section('title')
Orders Detail
@endsection
@section('css')
<style type="text/css">
    th{
        width:10%;
    }
</style>
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
                    <div class="">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#NO</th>
                                    <th scope="col">Start Date</th>
                                    <th scope="col">End Date</th>
                                    <th scope="col">Status</th>
                                    <th>Image</th>
                                </tr>
                            </thead>
                            <tbody>
                               @php $images=json_decode($orderImages->images);@endphp
                               @foreach($images as $img)
                               <tr>
                                   <td>{{$loop->index+1}}</td>
                                   <td>{{$orderImages->order->start_date ?? '-'}}</td>
                                   <td>{{$orderImages->order->end_date ?? '-'}}</td>
                                   <td>{{$orderImages->order->status ?? '-'}}</td>
                                   <td><img src="{{asset($img)}}" class="img img-thumnail w-25" ></td>
                               </tr>
                               @endforeach
                             
                            </tbody>
                        </table>
                    </div>
                   
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
<script>
    
</script>
@endsection