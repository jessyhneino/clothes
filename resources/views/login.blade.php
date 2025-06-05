@extends('layouts.master')

@section('title')
login
@endsection

@section('content') 

<!-- ***********************log in*************** -->

<!-- <div class="login">
    <div class="details-login">
        <h2>Welcome Back</h2>
        <form action="" method="post">
                <div class="input-group">
                    <i class="fas fa-message">         
                    </i>
                    <input type="email" placeholder="Email" name="email" id="email" required >
                </div>
                <div class="input-group">
                    <i class="fas fa-lock">        
                    </i>
                    <input type="password" placeholder="Password" name="password" id="password" required >
                </div>
                <button class="btn-login" type="submit">Login</button>
                <div class="signup-text">
                   Do not have an account?
                   <a href="#">Sign Up</a>
                </div>
        </form>
    </div>
</div> -->
<div class="login">
    <div class="details-login">
        <h2>Welcome Back</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="input-group">
                <i class="fas fa-message"></i>
                <input type="email" placeholder="Email" name="email" id="email" value="{{ old('email') }}" required autofocus autocomplete="username">
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Password" name="password" id="password" required autocomplete="current-password">
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ms-2 text-sm text-gray-600">Remember me</span>
                </label>
            </div>

            <!-- Login Button -->
            <button class="btn-login" type="submit">Login</button>

            <!-- Forgot Password & Sign Up -->
            <div class="signup-text">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="underline text-sm text-gray-600 hover:text-gray-900">Forgot your password?</a>
                @endif
                <br>
                Do not have an account? <a href="#">Sign Up</a>
            </div>
        </form>
    </div>
</div>

<!-- *********************END**log in*************** -->

@endsection