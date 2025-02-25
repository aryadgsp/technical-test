@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add Customer</h2>
    <form action="{{ route('customers.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="cust_name">Nama Customer</label>
            <input type="text" class="form-control" name="cust_name" required>
        </div>

        <div class="form-group">
            <label for="cust_code">Kode Customer</label>
            <input type="text" class="form-control" name="cust_code" required>
        </div>

        <div class="form-group">
            <label for="cust_address">Alamat</label>
            <input type="text" class="form-control" name="cust_address" required>
        </div>

        <div class="form-group">
            <label for="city_id">Kota</label>
            <select class="form-control" name="city_id" required>
                <option value="">Pilih Kota</option>
                @foreach ($cities as $city)
                <option value="{{ $city->id }}">{{ $city->city_name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection