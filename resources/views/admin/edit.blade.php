@extends('admin.layouts.main')
@section('container')
   <div class="container mt-5">
      <h1>Edit Ticket</h1>
      <form action="/admin/ticket/{{ $ticket->id }}/edit" method="post">
         @csrf
         {{-- <input type="hidden" name="id" value="{{ $ticket->id }}"> --}}
         <div class="row">
            <div class="mb-3 col-12 col-md-6">
               <label for="booking_id" class="form-label">Booking ID</label>
               <input type="text" class="form-control" name="booking_id"
                  value="{{ old('booking_id', $ticket->booking_id) }}">
            </div>
            <div class="mb-3 col-12 col-md-6">
               <label for="name" class="form-label">Name</label>
               <input class="form-control" list="users" name="name" id="name" value="{{ old('name', $ticket->user->name) }}">
               <datalist id="users">
                  @foreach($users as $u)
                  <option value="{{ $u->name }}">
                  @endforeach
               </datalist>
            </div>
            <div class="mb-3 col-12 col-md-6">
               <label for="ticket_name_id" class="form-label">Ticket Type</label>
               <select class="form-select" name="ticket_name_id">
                  @foreach($ticket_name as $t)
                  <option value="{{ $t->id }}"  @if($t->id == $ticket->ticket_name->id) selected @endif>{{ $t->name }}</option>
                  @endforeach
               </select>
            </div>
            <div class="mb-3 col-12 col-md-6">
               <label for="checkin_id" class="form-label">Check In Status</label>
               <select class="form-select" name="checkin_id">
                  @foreach($checkin as $t)
                  <option value="{{ $t->id }}" @if($t->id == $ticket->checkin_id) selected @endif>{{ $t->name }}</option>
                  @endforeach
               </select>
            </div>
         </div>
         <div class="mb-3">
            <button type="submit" class="btn btn-primary">Save Changes</button>
            <a href="/admin/dashboard" class="btn btn-outline-secondary">Cancel</a>
         </div>
      </form>
   </div>
@endsection
