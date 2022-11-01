<!-- login/register model -->
    <!-- Modal -->
    <div class="modal fade auth_model" id="ragisterModel" tabindex="-1" aria-labelledby="ragisterModelLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header pb-0 border-0">
                <h5 class="modal-title invisible">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">
                    <div class="text text-center">
                        <h3>Create an account</h3>
                        <p>Connect with us today!</p>
                    </div>
                    <form class="model_form" method="POST" action="{{ route('register') }}">
                        @csrf
                    <div class="input_group d-flex flex-column">
                            <label for="email">Full Name</label>
                            <input type="text" name="name" id="name" placeholder="Enter your fullname">
                            <span class="text-danger name_valid">{{$errors->first('name')}}</span>
                        </div>
                        <div class="input_group d-flex flex-column">
                            <label for="email">Email​ Address</label>
                            <input type="email" name="email" id="email"  placeholder="Enter your email">
                            <span class="text-danger name_valid">{{$errors->first('email')}}</span>
                        </div>
                        <div class="input_group d-flex flex-column">
                            <label for="email">Phone Number</label>
                            <input type="number" name="phone" id="phone" placeholder="Enter your phone number">
                            <span class="text-danger name_valid">{{$errors->first('phone')}}</span>
                        </div>
                        <div class="input_group  d-flex flex-column">
                            <label for="email">Password</label>
                            <div class="input position-relative">
                                <input type="password" id="togglePassInput" class="w-100" class="" name="password" id="password" placeholder="Please Enter Your Password">
                                <a href="#" class="eye" id="togglePass">
                                    <!-- img -->
                                    <img src="{{asset('assets/img/EyeFill.png') }}" alt="eye">
                                </a>
                                <span class="text-danger name_valid">{{$errors->first('password')}}</span>
                            </div>
                        </div>
                        <button type="submit" class="btn btn_blue mt-4">Sign Up</button>
                        <!-- img -->
                        <div class="img">
                            <img src="{{asset('assets/img/with.png') }}" class="my-4" alt="img">
                            <div class="social_btn d-flex justify-content-between">
                                <a href="{{ url('auth/google') }}">
                                    <img src="{{asset('assets/img/google.png') }}" alt="img">
                                </a>
                                <a href="{{ url('auth/facebook') }}">
                                    <img src="{{asset('assets/img/facebook.png') }}" alt="img">
                                </a>
                            </div>
                            <div class="mt-5 text-center">
                                <!-- <p class="mb-0 dontaccount">Continue as a  <a href="#" class="signlink">Guest</a></p> -->
                            </div>
                    </form>
                </div>
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div> -->
            </div>
        </div>
    </div>
</div>


    <!-- login -->
    <div class="modal fade auth_model" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header pb-0 border-0">
                        <h5 class="modal-title invisible">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                        <div class="modal-body">
                        <div class="text text-center">
                                <h3>Hi, Welcome Back! </h3>
                                <p>Hello again, you’ve been missed!</p>
                            </div>
                            <form class="model_form" id="model_login" method="POST" action="{{ route('login') }}">
                            @csrf
                                <div class="input_group d-flex flex-column">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" placeholder="Please Enter Your Email">
                                    <span class="text-danger name_valid">{{$errors->first('email')}}</span>
                                </div>
                                <div class="input_group  d-flex flex-column">
                                    <label for="email">Password</label>
                                    <div class="input position-relative">
                                        <input type="password" id="togglePassInput" class="w-100" class="" name="password" id="password" placeholder="Please Enter Your Password">
                                        <a href="#" class="eye" id="togglePass">
                                            <!-- img -->
                                            <img src="{{asset('assets/img/EyeFill.png') }}" alt="eye">
                                        </a>
                                        <span class="text-danger name_valid">{{$errors->first('password')}}</span>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Remember me
                                        </label>
                                    </div>
                                    <a href="#" class="forgot_password" data-bs-toggle="modal" onclick="forgotPass()" >Forgot Password?</a>
                                </div>
                                <button type="submit" class="btn btn_blue mt-4">Login</button>
                                <!-- img -->
                                <div class="img">
                                    <img src="{{asset('assets/img/with.png') }}" class="my-4" alt="img">
                                    <div class="social_btn d-flex justify-content-between">
                                        <a href="{{ url('auth/google') }}">
                                            <img src="{{asset('assets/img/google.png') }}" alt="img">
                                        </a>
                                        <a href="{{ url('auth/facebook') }}">
                                            <img src="{{asset('assets/img/facebook.png') }}" alt="img">
                                        </a>
                                    </div>
                                    <div class="mt-5 text-center">
                                        <p class="mb-0 dontaccount">Don’t have an account? <a href="#" onclick="toggleModel()" class="signlink">Sign Up</a></p>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    <!-- forgot password -->
    <div class="modal fade auth_model" id="ForgotPassword" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header pb-0 border-0">
                <h5 class="modal-title invisible">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">
                <div class="text text-center">
                        <h3>Reset Password </h3>
                        <p class="mb-4">Code will be send into your email</p>
                    </div>
                    <form class="model_form" method="POST" action="{{ route('login') }}">
                    @csrf
                        <div class="input_group d-flex flex-column">
                            <label for="email">Enter Your Email</label>
                            <input type="email" name="email" id="email"
                                placeholder="Please Enter Your Email">
                        </div>
                        <div class="d-flex align-items-center justify-content-end">
                            <button type="submit" class="btn mt-4 btn-secondary" onclick="forgotPass()">Cancel</button>
                            <button type="submit" class="btn mt-4 btn-primary ms-2">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>