@extends('layouts.app')

@section('title', 'Customer Locations')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Customer Locations on Map</h2>
    </div>
    <div class="card-body">
        <div id="map" style="height: 500px;"></div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    var map = L.map('map').setView([-2.5489, 118.0149], 5); // Pusat Indonesia

    // Tambahkan Tile Layer dari OpenStreetMap
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);

    // Data customer dari Laravel (dikirim dari controller)
    var customers = @json($customers);

    // Fungsi untuk mendapatkan koordinat dari nama kota
    function getCoordinates(city, callback) {
        var url = `https://nominatim.openstreetmap.org/search?format=json&q=${city}, Indonesia`;
        fetch(url)
            .then(response => response.json())
            .then(data => {
                if (data.length > 0) {
                    var lat = data[0].lat;
                    var lon = data[0].lon;
                    callback(lat, lon);
                }
            })
            .catch(error => console.error('Error:', error));
    }

    // Loop melalui daftar customer dan tampilkan di peta
    customers.forEach(customer => {
        getCoordinates(customer.city_name, (lat, lon) => {
            var marker = L.marker([lat, lon]).addTo(map)
                .bindPopup(`<strong>${customer.cust_name}</strong><br>${customer.city_name}`);
        });
    });
});
</script>
@endsection