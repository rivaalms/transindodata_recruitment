@extends('layouts.main')
@section('container')
   <main class="form-signin mt-5 w-50 m-auto text-center">
      <form method="post" action="/register">
         @csrf
         <h1 class="h3 mb-3 fw-normal">Register</h1>

         <div class="form-floating mb-3">
            <input type="text" class="form-control" id="name" name="name" placeholder="Your full name">
            <label for="name">Full Name</label>
         </div>
         <div class="form-floating mb-3">
            <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
            <label for="email">Email address</label>
         </div>
         <div class="form-floating mb-3">
            <input type="text" class="form-control" id="phone" name="phone" placeholder="Your phone number">
            <label for="phone">Phone number</label>
         </div>
         <div class="form-floating mb-3">
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            <label for="password">Password</label>
         </div>

         <button class="w-100 btn btn-lg btn-primary mb-3" type="submit">Register</button>
         <p class="text-muted">Alerady have account? <a href="/login">Login</a></p>
      </form>
   </main>
@endsection
