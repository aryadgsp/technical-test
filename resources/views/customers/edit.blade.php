@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Customer</h2>
    <form action="{{ route('customers.update', $customer->cust_id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="cust_name" value="{{ $customer->cust_name }}" required>
        <input type="text" name="cust_code" value="{{ $customer->cust_code }}" required>
        <input type="text" name="cust_address" value="{{ $customer->cust_address }}" required>
        <input type="number" name="city_id" value="{{ $customer->city_id }}" required>
        <input type="text" name="city_name" value="{{ $customer->city_name }}" required>
        <button type="submit">Update</button>
    </form>
</div>
@endsection
