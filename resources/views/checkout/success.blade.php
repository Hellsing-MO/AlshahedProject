@extends('layouts.app')

@section('content')
<div class="container">
  <h2>Order Successful</h2>
  <p>Thank you, {{ $shippingName }}!</p>
  <p>Your order total: <strong>${{ $orderTotal }}</strong></p>
  <p>Shipping to: {{ $shippingAddress }}, {{ $shippingCity }}, {{ $shippingProvince }}, {{ $shippingPostalCode }}</p>
  <a href="{{ url('/') }}" class="btn btn-primary">Back to Home</a>
</div>
@endsection
