@extends('frontend.layout.template')


@section('title')
   <title>Ecommerce | Forget Password Page</title>
@endsection


@section('body-content')

    <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>forget password</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item"><a href="login.html">login</a></li>
                            <li class="breadcrumb-item active" aria-current="page">forget password</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->


    {{-- <!--section start-->
    <section class="pwd-page section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 m-auto">
                    <h2>Forget Your Password</h2>
                    <form class="theme-form">
                        <div class="form-row row">
                            <div class="col-md-12">
                                <input type="text" class="form-control" id="email" placeholder="Enter Your Email"
                                    required="">
                            </div><a href="#" class="btn btn-solid w-auto">Submit</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--Section ends--> --}}

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="mb-4 text-sm text-gray-600">
                    {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                </div>
            
                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />
            
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
            
                    <!-- Email Address -->
                    <div>
                        <x-input-label for="email" class="form-label text-center d-block" :value="__('Forget Your Password')" />
                        <div class="col-lg-6 offset-lg-3">
                            <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus />
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
            
                    <div class="text-center mt-3 mb-3">
                        <button type="submit" class="btn btn-solid ">
                            {{ __('Submit') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection