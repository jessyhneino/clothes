@extends('layouts.master')

@section('title')
register
@endsection

@section('content') 

<!-- ***********************REGISTER*************** -->

<!-- <div class="login">
    <div class="details-login">
        <h2>Welcome Back</h2>
        <form action="" method="post">
            <div class="input-group">
                <i class="fas fa-person">        
                </i>
                <input type="text" placeholder="Name" name="name" id="name" required >
            </div>
            <div class="input-group">
                <i class="fas fa-message">       
                </i>
                <input type="email" placeholder="Email" name="email" id="email" required >
            </div>
            <div class="input-group">
                <i class="fas fa-unlock">        
                </i>
                <input type="password" placeholder="Password" name="password" id="password" required >
            </div>
            <div class="input-group">
                <i class="fas fa-lock">        
                </i>
                <input type="password" placeholder="Confirm Password" name="password" id="password" required >
            </div>
            <div class="signup-text">
                <a href="#">Already registered?</a>
            </div> 
            <button class="btn-login" type="submit">Register</button>
        </form>
    </div>
</div> -->

<div class="login">
    <div class="details-login">
        <h2>Welcome Back</h2>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="input-group">
                <i class="fas fa-person"></i>
                <input type="text" placeholder="Name" name="name" id="name" value="{{ old('name') }}" required autofocus autocomplete="name">
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email -->
            <div class="input-group">
                <i class="fas fa-message"></i>
                <input type="email" placeholder="Email" name="email" id="email" value="{{ old('email') }}" required autocomplete="username">
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="input-group">
                <i class="fas fa-unlock"></i>
                <input type="password" placeholder="Password" name="password" id="password" required autocomplete="new-password">
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Confirm Password" name="password_confirmation" id="password_confirmation" required autocomplete="new-password">
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="signup-text">
                <a href="{{ route('login') }}">Already registered?</a>
            </div>

            <button class="btn-login" type="submit" onclick="window.location.href='{{ route('cards') }}'">Register</button>
        </form>
    </div>
</div>

<!-- *********************END**REGISTER*************** -->

@endsection