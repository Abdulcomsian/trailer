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
                <form>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Name</label>
                            <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                        </div>
                        <div class="col-lg-6">
                        <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Enter Current Password</label>
                        <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                        </div>
                        <div class="col-lg-6">
                                
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Enter New Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1">
                                    <div id="emailHelp" class="form-text"> Password must a least 6 character long! </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Your Bio</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
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