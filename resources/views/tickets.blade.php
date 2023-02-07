@extends('layouts.main')
@section('container')
<div class="container">
   <div class="container-fluid d-flex flex-column justify-content-center mt-5">
      <h1 class="text-center display-4 mb-3">Tickets</h1>
      <p class="text-center text-muted">All prices include tax.</p>
   </div>

   <div class="container-fluid">
      <div class="row">
         @foreach ($tickets as $t)
         <div class="col-12 col-md-6">
            <div class="card">
               <div class="card-header">
                  <p class="my-2 fs-4 fw-bold text-center">{{ $t->name }}</p>
               </div>
               <div class="card-body">
                  <p class="display-6 text-center mb-3">Rp {{ number_format($t->price) }}</p>
                  <div class="d-flex justify-content-center">
                     <div class="d-flex">
                        <div class="input-group mb-3">
                           <button type="button" class="btn btn-primary {{ ($t->id == 1) ? 'app-btn-regular-decrease' : 'app-btn-vip-decrease' }}" onclick={{ ($t->id == 1) ? 'addRegular(-1)' : 'addVIP(-1)' }}>-</button>
                           <input type="hidden" class={{ ($t->id == 1? 'regular-price' : 'vip-price') }} name={{ ($t->id == 1) ? 'regularPrice' : 'vipPrice' }} value={{ $t->price }}>
                           <input type="text" name={{ ($t->id == 1) ? 'regularCount' : 'vipCount' }} class="form-control text-center {{ ($t->id == 1) ? 'app-input-regular' : 'app-input-vip' }}" value="0">
                           <button type="button" class="btn btn-primary" onclick={{ ($t->id == 1) ? 'addRegular(1)' : 'addVIP(1)' }}>+</button>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         @endforeach
      </div>

      <div class="card mt-3">
         <div class="card-body">
            <div class="row">
               <div class="col-12 col-md-9">
                  <p class="fw-bold fs-5 mb-0">Sub-total: </p>
                  <p class="app-subtotal fw-bold text-warning fs-3 mb-0">Rp 0</p>
                  {{-- <button onclick="countSubtotal()">click</button> --}}
               </div>
               <div class="col-12 col-md-3 d-flex align-items-stretch">
                  <form action="/tickets" method="post" class="flex-grow-1 py-2 d-flex align-items-stretch">
                     @csrf
                     <input type="hidden" class="app-input-subtotal" name="subtotalValue" value="0">
                     <input type="hidden" class="app-input-regular-count" name="regularCount" value="0">
                     <input type="hidden" class="app-input-vip-count" name="vipCount" value="0">
                     <button type="submit" class="btn btn-primary flex-grow-1">Checkout</button>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<script>
   
   function addRegular(num) {
      var regular = document.querySelector('.app-input-regular');
      var regularInput = document.querySelector('.app-input-regular-count');
      regular.value = parseInt(regular.value)+num;
      regularInput.value = parseInt(regular.value);
      countSubtotal();
   }
   
   function addVIP(num) {
      var vip = document.querySelector('.app-input-vip');
      var vipInput = document.querySelector('.app-input-vip-count');
      vip.value = parseInt(vip.value)+num;
      vipInput.value = parseInt(vip.value);
      countSubtotal();
   }

   // var regularDecreaseBtn = document.querySelector('.app.btn-regular-decrease');
   // var vipDecreaseBtn = document.querySelector('.app.btn-vip-decrease');

   // if (parseInt(regular.value) <= 0) {
   //    regularDecreaseBtn.setAttribute('disabled', 'true');
   // } else {
   //    regularDecreaseBtn.setAttribute('disabled', 'false');
   // }
   const formatter = new Intl.NumberFormat('id-ID', {
      style: 'currency',
      currency: 'IDR',
      maximumSignificantDigits: 3,
   })

   function countSubtotal() {
      var subtotal = document.querySelector('.app-subtotal');
      var inputSubtotal = document.querySelector('.app-input-subtotal');
      var regular = document.querySelector('.app-input-regular');
      var vip = document.querySelector('.app-input-vip');

      var regularPrice = document.querySelector('.regular-price');
      // console.log("Regular price " + parseInt(regularPrice.value));
      var regularValue = parseInt(regular.value) * parseInt(regularPrice.value);
      // console.log("Regular count " + parseInt(regular.value));
      // console.log("Regular value " + regularValue);

      var vipPrice = document.querySelector('.vip-price');
      var vipValue = parseInt(vip.value) * parseInt(vipPrice.value);

      var subtotalValue = vipValue + regularValue;
      console.log(formatter.format(subtotalValue));
      subtotal.innerHTML = formatter.format(subtotalValue);
      inputSubtotal.value = subtotalValue;
   }

   // document.querySelector('.app-input-regular').addEventListener()

</script>
@endsection
