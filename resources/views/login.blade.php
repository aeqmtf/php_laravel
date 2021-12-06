@extends('layouts.login')
@section('title', 'Signin')
@section('content')
<main class="form-signin">
  <form method="post" action="{{ route('login.post') }}">
    @csrf
    <img class="mb-4" src="{{ asset('assets/brand/bootstrap-logo.svg') }}" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

    <div class="form-floating">
      <input type="email" class="form-control @error('email') is-invalid @enderror"
      name="email" id="floatingInput" placeholder="name@example.com"
      value="{{ old('email') }}"
      >
      <label for="floatingInput">Email address</label>
      @error('email')
      <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>
    <div class="form-floating">
      <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
      @error('password')
      <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="true" name="remember"> Remember me
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
  </form>
</main>
@stop