@extends('frontend.layout.template')


@section('title')
   <title>Ecommerce | Forget Password Page</title>
@endsection

@section('css')
    <style>
        .theme-card{
        padding: 30px;
        border: none;
        background-color: #f8f8f8;
        -webkit-box-shadow: 0 0 2px 2px #f1f1f1;
        box-shadow: 0 0 2px 2px #f1f1f1;
        line-height: 1;
    }
    </style>
@endsection


@section('body-content')

<div class="container mt-3 mb-3">
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            <div class="theme-card">
                 <h2 class="text-center mb-3">Reset Password</h2>
                <form method="POST" action="{{ route('password.store') }}">
                    @csrf
            
                    <!-- Password Reset Token -->
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">
            
                    <!-- Email Address -->
                    <div>
                        <x-input-label for="email" class="form-label" :value="__('Email')" />
                        <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
            
                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" class="form-label" :value="__('Password')" />
                        <x-text-input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
            
                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <x-input-label for="password_confirmation" class="form-label" :value="__('Confirm Password')" />
            
                        <x-text-input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>
            
                    <div class="flex items-center justify-end mt-4">
                       <button type="submit" class="btn btn-solid">
                              {{ __('Reset Password') }}
                       </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
  </div>
</div>


@endsection
