@extends('layouts.app')
@section('title' , 'Login')
@section('content')
<div class="form-login">
  <h1>Sign In </h1>
  <form method="post" action="{{route('auth.login')}}">
    @csrf
    <label for="email">E-mail</label>
    <div class="icon">
      <input type="email" id="email" name="email" placeholder="Your email" class="@error('email') is-invalid @enderror">
      <i class="bi bi-person-fill"></i>
    </div>
    @error('email')
      <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
    @enderror

    <label for="password">Password</label>
    <div class="icon">
      <input type="password" id="password" name="password" placeholder="Your Password" class="@error('password') is-invalid @enderror">
      <i class="bi bi-lock-fill"></i>
    </div>
    @error('password')
      <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
    @enderror
    <button type="submit" class="btn">
        {{ __('Login') }}
    </button>
    
    <div class="link">
        <ul>
            <li>Don't have an account? <a href="{{ route('auth.register') }}">Register</a></li>
        </ul>
    </div>
    
</form>
</div>
@endsection