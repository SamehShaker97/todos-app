@extends('layouts.app')
@section('title' , 'Register')
@section('content')
<div class="form-register">
  <h1>Register Account Form</h1>
  <form method="POST" action="{{ route('auth.registers.store') }}">
    @csrf
    <label for="name">Full Name</label>
    <div class="icon">
      <input type="text" id="name" name="name" placeholder="Your Name" class="@error('name') is-invalid @enderror" value="{{ old('name') }}">
      <i class="bi bi-person-vcard-fill"></i>
    </div>
    @error('name')
    <div class="error">{{ $message }}</div>
    @enderror
    <label for="username">User Name</label>
    <div class="icon">
      <input type="text" id="username" name="username" placeholder="Your Username" class="@error('username') is-invalid @enderror" value="{{old('username')}}">
      <i class="bi bi-person-fill"></i>
    </div>
    @error('username')
    <div class="error">{{ $message }}</div>
    @enderror
    <label for="email">Your Email</label>
    <div class="icon">
      <input type="email" id="email" name="email" placeholder="Your Email" class="@error('email') is-invalid @enderror" value="{{old('email')}}">
      <i class="bi bi-envelope-fill"></i>
    </div>
    @error('email')
    <div class="error">{{ $message }}</div>
    @enderror
    <label for="password">Password</label>
    <div class="icon">
      <input type="password" id="password" name="password" placeholder="Your Password" class="@error('password') is-invalid @enderror">
      <i class="bi bi-lock-fill"></i>
    </div>
    @error('password')
    <div class="error">{{ $message }}</div>
    @enderror
    <label for="password-confirm">Confirm Password</label>
    <div class="icon">
      <input type="password" id="password-confirm" name="password_confirmation" placeholder="Confirm Password" class="@error('password_confirmation') is-invalid @enderror">
      <i class="bi bi-lock-fill"></i>
    </div>
    @error('password_confirmation')
    <div class="error">{{ $message }}</div>
    @enderror
    <input type="submit" class="btn" value="Register">
  </form>
</div>
@endsection