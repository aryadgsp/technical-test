@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Customer Details</h2>
    <p><strong>Name:</strong> {{ $customer->cust_name }}</p>
    <p><strong>Code:</strong> {{ $customer->cust_code }}</p>
    <p><strong>Address:</strong> {{ $customer->cust_address }}</p>
    <p><strong>City:</strong> {{ $customer->city_name }}</p>
    <a href="{{ route('customers.index') }}">Back</a>
</div>
@endsection
