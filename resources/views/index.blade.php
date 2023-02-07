@extends('layouts.main')
@section('container')
<link rel="stylesheet" href="/css/landing.css">
<div class="container-fluid background-img mt-5">
   <div class="container mb-5 text-center">
      <p class="mb-0">Agent X Presents</p>
      <h1 class="display-1">Live Music Concert</h1>
      <p class="h3 mb-0">Let the beat flows into your heart!</p>
   </div>
   <div class="container mb-5">
      <div class="row">
         <div class="col-12 col-md-6">
            <div class="card">
               <div class="card-body text-center">
                  <p class="fw-bold mb-0">March 30th, 2023</p>
                  <p class="text-muted mb-0">16.00 - End</p>

               </div>
            </div>
         </div>
         <div class="col-12 col-md-6">
            <div class="card">
               <div class="card-body text-center">
                  <p class="fw-bold mb-0">Mahkota Hotel</p>
                  <p class="text-muted mb-0">Jl Sidas, Pontianak</p>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="container mb-5">
      <div class="text-center py-3">
         <h2>Lineups</h2>
      </div>
      <div class="row">
         <div class="col-12 col-md-4 text-center">
            <p>Padi</p>
            <p>Sheila On 7</p>
            <p>Sal Priadi</p>
         </div>
         <div class="col-12 col-md-4 text-center">
            <p>The Changcuters</p>
            <p>Ari Lasso</p>
            <p>Jason Ranti</p>
         </div>
         <div class="col-12 col-md-4 text-center">
            <p>Sidepony</p>
            <p>Juicy Juicy</p>
            <p>Hindia</p>
         </div>
      </div>
   </div>
   <div class="container">
      <div class="text-center py-3">
         <h2>Tickets</h2>
      </div>
      <div class="text-center">
         <a href="/tickets" class="btn btn-lg btn-primary">Click here to purchase ticket</a>
      </div>
   </div>
</div>
@endsection
