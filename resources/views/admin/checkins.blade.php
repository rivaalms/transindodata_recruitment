@extends('admin.layouts.main')
@section('container')
   <div class="container mt-5">
      <div class="mb-5">
         <h1>Check In</h1>
      </div>
      <div class="row mb-5">
         <form action="/admin/checkins" method="post" class="col-12 col-md-6 d-flex">
            @csrf
            <div class="mb-3 me-2 flex-grow-1">
               <input type="text" class="form-control" name="booking_id" placeholder="Input Booking ID here...">
            </div>
            <div class="mb-3">
               <button class="btn btn-primary" type="submit">Submit</button>
            </div>
         </form>
      </div>

      <div class="mb-3">
         <h2 class="mb-3">Check In List</h2>
      </div>
      <ul class="nav nav-tabs" id="myTab" role="tablist">
         <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane"
               type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Checked</button>
         </li>
         <li class="nav-item" role="presentation">
            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane"
               type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Unchecked</button>
         </li>
      </ul>
      <div class="tab-content" id="myTabContent">
         <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
            <div class="table-responsive">
               <table class="table table-hover">
                  <thead>
                     <tr>
                        <th>Booking ID</th>
                        <th>Name</th>
                        <th>Ticket Type</th>
                     </tr>
                  </thead>
                  <tbody class="table-group-divider">
                     @foreach ($checked as $c)
                        <tr>
                           <td>{{ $c->booking_id }}</td>
                           <td>{{ $c->user->name }}</td>
                           <td>{{ $c->ticket_name->name }}</td>
                        </tr>
                     @endforeach
                  </tbody>
               </table>
            </div>
            <div class="d-flex justify-content-center">
               {{ $checked->links() }}
            </div>
         </div>

         <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
            <div class="table-responsive">
               <table class="table table-hover">
                  <thead>
                     <tr>
                        <th>Booking ID</th>
                        <th>Name</th>
                        <th>Ticket Type</th>
                     </tr>
                  </thead>
                  <tbody class="table-group-divider">
                     @foreach ($unchecked as $c)
                        <tr>
                           <td>{{ $c->booking_id }}</td>
                           <td>{{ $c->user->name }}</td>
                           <td>{{ $c->ticket_name->name }}</td>
                        </tr>
                     @endforeach
                  </tbody>
               </table>
            </div>
            <div class="d-flex justify-content-center">
               {{ $unchecked->links() }}
            </div>
         </div>
      </div>

      {{-- <div class="table-responsive">
      <table class="table table-hover">
         <thead>
            <tr>
               <th>#</th>
               <th>Booking ID</th>
               <th>Name</th>
               <th>Ticket Type</th>
               <th>Check In Status</th>
               <th>Action</th>
            </tr>
         </thead>
         
         <tbody class="table-group-divider">
            @foreach ($tickets as $t)
            <tr>
               <td>{{ $t->id }}</td>
               <td>{{ $t->booking_id }}</td>
               <td>{{ $t->user->name }}</td>
               <td>{{ $t->ticket_name->name }}</td>
               <td>{{ $t->checkin->name }}</td>
               <td>
                  <a href="/admin/ticket/{{ $t->id }}/edit">Edit</a> |
                  <form action="/admin/ticket/{{ $t->id }}/delete" method="post" class="d-inline">
                     @csrf
                     <button type="submit" class="btn btn-link p-0 m-0">Delete</button>
                  </form>
               </td>
            </tr>
            @endforeach
         </tbody>
      </table>
   </div>
   <div class="float-end">
      {{ $tickets->links() }}
   </div> --}}
   </div>
@endsection
