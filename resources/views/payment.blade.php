@extends('layouts.main')
@section('container')
<div class="container mt-5">
   <div class="container-fluid d-flex justify-content-center">
      <div class="col-6">
         <div class="card">
            <div class="card-body">
               <div class="row">
                  @foreach($ticket_name as $t)
                  <div class="col-12 col-md-6">
                     <p class="fw-bold fs-5">{{ $t->name }}</p>
                     <dl class="row">
                        <dt class="col-sm-6 fw-bold text-muted">Ticket count</dt>
                        <dd class="col-sm-6 text-end">{{ ($t->id == 1) ? $payment->regular_count : $payment->vip_count }}</dd>
                        <dt class="col-sm-6 fw-bold text-muted">Price per ticket</dt>
                        <dd class="col-sm-6 text-end">Rp {{ number_format($t->price) }}</dd>
                        <dt class="col-sm-6 fw-bold text-muted">Total price</dt>
                        <dd class="col-sm-6 text-end">Rp {{ ($t->id == 1) ? number_format($payment->regular_count*$t->price) : number_format($payment->vip_count*$t->price) }}</dd>
                     </dl>
                  </div>
                  @endforeach
               </div>
               <div class="d-flex justify-content-between">
                  <p class="fw-bold fs-5">Grand total</p>
                  <p class="text-warning fs-4 fw-bold">Rp {{ number_format($payment->total_price) }}</p>
               </div>
               <div class="d-flex">
                  <form action="/payment" method="post" class="d-flex flex-grow-1">
                     @csrf
                     <input type="hidden" value="{{ $payment->id }}" name="payment_id">
                     <input type="hidden" value="{{ $payment->regular_count }}" name="regular_count">
                     <input type="hidden" value="{{ $payment->vip_count }}" name="vip_count">
                     <button type="submit" class="btn btn-primary flex-grow-1" onclick="return confirm('Confirm purchase?')">Purchase</button>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection