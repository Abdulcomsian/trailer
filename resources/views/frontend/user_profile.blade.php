@extends('layouts.UserBackend.master')
@section('title')
Trailer | Home
@endsection
@section('content')
<main class="dashboad_main">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                {{-- sidebar --}}
                @include('layouts.UserBackend.side-bar')
                
            </div>
            <div class="col-lg-9 mb-5">
                <div class="text mb-4">
                    <h3>Personal Details</h2>
                </div>
                <form action="{{ route('update.profile') }}" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ $user->id }}" />
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Name</label>
                            <input type="name" class="form-control" id="name" name="name" value="{{$user->name}}">
                            <span class="text-danger name_valid">{{$errors->first('name')}}</span>
                        </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$user->email}}">
                                <span class="text-danger name_valid">{{$errors->first('email')}}</span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Enter New Password</label>
                                <input type="password" name="password" class="form-control" id="password" aria-describedby="emailHelp" value="">
                                <span class="text-danger name_valid">{{$errors->first('password')}}</span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Enter New Password</label>
                                <input type="password" name="password" class="form-control" id="password" aria-describedby="emailHelp" value="">
                                <span class="text-danger name_valid">{{$errors->first('password')}}</span>
                            </div>
                        </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Phone Number</label>
                                    <input type="number" class="form-control" id="phone" name="phone" value="{{$user->phone ?? ''}}">
                                    <span class="text-danger name_valid">{{$errors->first('phone')}}</span>
                                    </div>
                                </div>

                    </div>
                    <div class="d-flex justify-content-end mt-4">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="submit" class="btn btn-secondary ms-2">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
@section('script')
<script>
    
</script>
@endsection