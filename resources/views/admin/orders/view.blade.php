@extends('layouts.Backend.master')
@section('title')
Orders Detail
@endsection
@section('css')
<!-- bootstrap 5 CDN -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<!-- font awesome 5 CDN -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.1/css/all.min.css">

<!-- Link Swiper's CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />

<style type="text/css">
    th{
        width:10%;
    }
    tr:hover{
        background-color: white!important;
    }
    .image{
        width: 20%;
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
                    
                        <table class="table table-hover table-responsive">
                            <thead>
                                <tr>
                                    <th>#NO</th>
                                    <th >Start Date</th>
                                    <th >End Date</th>
                                    <th >Status</th>
                                    <th class="image">Image</th>
                                </tr>
                            </thead>
                            <tbody>
                               @php $images=json_decode($orderImages->images);@endphp
                               {{-- {{dd($images)}}
                               @foreach($images as $img) --}}
                               <tr>
                                   <td>{{1}}</td>
                                   <td>{{$orderImages->order->start_date ?? '-'}}</td>
                                   <td>{{$orderImages->order->end_date ?? '-'}}</td>
                                   <td>{{$orderImages->order->status ?? '-'}}</td>
                                   <td>
                                        @if(sizeof($images) > 0)
                                            <button type="button" class="table-img-btn" data-toggle="modal" id="modal-img-btn" data-target="#imageModal" style="border:none!important; background: white;">
                                                <img src="{{asset($images[0])}}" class="img img-thumnail w-50">
                                            </button>
                                            <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <h5 class="modal-title" id="exampleModalLabel">Trailer Images</h5>
                                                      <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close" style="border:none!important">
                                                        <span aria-hidden="true">&times;</span>
                                                      </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                                            <div class="carousel-inner">
                                                              @foreach($images as $img)
                                                              <div class="carousel-item @if($loop->iteration == 1) active  @endif">
                                                                <img class="d-block w-100" src="{{asset($img)}}" alt="First slide">
                                                              </div>
                                                              @endforeach
                                                            </div>
                                                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                              <span class="sr-only">Previous</span>
                                                            </a>
                                                            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                              <span class="sr-only">Next</span>
                                                            </a>
                                                          </div>



                                                    </div>
                                                    <div class="modal-footer">
                                                      <button type="button" class="btn btn-secondary close-modal" data-dismiss="modal">Close</button>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>

                                          
                                        @else
                                            "--"
                                        @endif
                                   </td>
                               </tr>
                               {{-- @endforeach --}}
                             
                            </tbody>
                        </table>
                    
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

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
        $("#modal-img-btn").on("click" , function(e){
            $('#imageModal').modal("show");
        })
        $(".close-modal").on("click" , function(e){
            $("#imageModal").modal("hide");
        })
        $('.carousel').carousel()
    })
</script>
@endsection