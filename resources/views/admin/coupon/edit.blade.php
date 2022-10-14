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
                <div class="card-body pt-5">
                    <form id="form_{{$coupondata->id}}" action="{{route('coupons.update',$coupondata)}}" method="POST">
                        @csrf
                        @method('put')
                        <input type="hidden" name="id" id="id" value="{{$coupondata->id}}" />
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-bold fs-6 mb-2">Coupon Code</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                             <input type="text" name="code" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Coupon Code" required value="{{$coupondata->code}}" />
                             <!--end::Input-->
                             @error('code')
                             <span class="invalid-feedback d-flex" role="alert">
                                 <strong>{{ $message }}</strong>
                             </span>
                             @enderror
                            
                            <!--end::Input-->
                        </div>

                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-bold fs-6 mb-2">Pricing and Time</label>
                            <!--end::Label-->
                            <input type="text" name="value" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Coupon Price" required value="{{$coupondata->value}}" />
                            <!--end::Input-->
                             @error('value')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{  $message}}</strong>
                                    </span>
                             @enderror
                        </div>

                         <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Maximum Coupon</label>
                                <input type="number" name="toal_count" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Coupon Count" required value="{{$coupondata->toal_count}}"/>
                                <!--end::Input-->
                                @error('toal_count')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{  $message }}</strong>
                                        </span>
                                 @enderror
                            </div>

                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Expiry Date</label>
                                <input type="date" name="expired_at" class="form-control form-control-solid mb-3 mb-lg-0" required value="{{$coupondata->expired_at}}"/>
                                <!--end::Input-->
                                 @error('expired_at')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{  $message }}</strong>
                                        </span>
                                 @enderror
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

@endsection