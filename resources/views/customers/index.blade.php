@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Customer List</h2>
    <form action="{{ route('customers.index') }}" method="GET">
        <input type="text" name="search" placeholder="Search..." value="{{ request('search') }}">
        <button type="submit">Search</button>
    </form>
    <a href="{{ route('customers.create') }}">Add Customer</a>
    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Code</th>
            <th>Address</th>
            <th>City</th>
            <th>Action</th>
        </tr>
        @foreach($customers as $customer)
        <tr>
            <td>{{ $customer->cust_id }}</td>
            <td>{{ $customer->cust_name }}</td>
            <td>{{ $customer->cust_code }}</td>
            <td>{{ $customer->cust_address }}</td>
            <td>{{ $customer->city->city_name }}</td>
            <td>
                <a href="{{ route('customers.show', $customer->cust_id) }}">Show</a>
                <a href="{{ route('customers.edit', $customer->cust_id) }}">Edit</a>
                <form action="{{ route('customers.destroy', $customer->cust_id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
