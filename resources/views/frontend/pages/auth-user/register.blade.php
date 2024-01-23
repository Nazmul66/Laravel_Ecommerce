@extends('frontend.layout.template')

@section('title')
   <title>Register Page</title>
@endsection

@section('body-content')

    <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>create account</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('homepage') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">create account</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->


    <!--section start-->
    <section class="register-page section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3>create account</h3>
                    <div class="theme-card">

                        <form class="theme-form" action="{{ route('register') }}"  method="POST">
                            @csrf
                            <!-- Full Name -->
                            <div class="form-row row">
                                <div class="col-md-6">
                                    <label for="name">Full Name</label>
                                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" class="form-control" placeholder="Full Name">
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>

                                <!-- Email Address -->
                                <div class="col-md-6">
                                    <label for="email">email</label>
                                    <input class="form-control" id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" placeholder="Email" >
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>
                            </div>

                            
                            <div class="form-row row">
                                <!-- Password -->
                                <div class="col-md-6">
                                    <label for="review">Password</label>
                                    <input class="form-control" id="password"  type="password" name="password" required autocomplete="new-password" placeholder="Enter your password" >
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>

                                <!-- Confirm Password -->
                                <div class="col-md-6">
                                    <label for="review">retype-Password</label>
                                    <input class="form-control" id="password"  type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Enter your retype password" >
                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                </div>

                                <button type="submit" class="btn btn-solid w-auto">create Account</button>
                            </div>

                            <p class="mt-3">Already have an account? <a href="{{ route('user-login') }}">Click here</a></p>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Section ends-->

@endsection
   