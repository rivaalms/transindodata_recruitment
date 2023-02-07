@extends('layouts.main')
@section('container')
<div class="container mt-5">
   <h1>My Tickets</h1>
   <div class="row">
      @foreach($tickets as $t)
      <div class="col-12 col-md-6">
         <div class="card">
            <div class="card-body">
               <div class="d-flex justify-content-between mb-3">
                  <p class="fw-bold fs-4">{{ $t->ticket_name->name }}</p>
                  <div class="text-muted text-end">
                     {{-- <p class="m-0">Booking ID</p> --}}
                     <p>{{ $t->booking_id }}</p>
                  </div>
               </div>
               <div class="d-flex justify-content-between">
                  <div class="flex-grow-1">
                     <p class="fw-bold m-0">Ticket Holder</p>
                     <p>{{ $t->user->name }}</p>
                  </div>
                  <div class="">
                     <p class="fw-bold m-0">Check In Status</p>
                     <p>{{ $t->checkin->name }}</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
      @endforeach
   </div>
</div>
@endsection