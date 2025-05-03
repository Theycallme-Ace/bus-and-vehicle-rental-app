<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}
require_once __DIR__ . '/../includes/header.php';
?>

<div class="container mx-auto px-4 py-6">
    <h1 class="text-3xl font-bold mb-6 text-blue-600">Admin Dashboard</h1>

    <section class="mb-8">
        <h2 class="text-xl font-semibold mb-4">Vehicle GPS System</h2>
        <div id="map" class="w-full h-96 rounded shadow"></div>
    </section>

    <section>
        <h2 class="text-xl font-semibold mb-4">Summary</h2>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
            <div class="bg-white p-4 rounded shadow">
                <h3 class="text-lg font-semibold">Total Vehicles</h3>
                <p id="total-vehicles" class="text-2xl font-bold">0</p>
            </div>
            <div class="bg-white p-4 rounded shadow">
                <h3 class="text-lg font-semibold">Active Rentals</h3>
                <p id="active-rentals" class="text-2xl font-bold">0</p>
            </div>
            <div class="bg-white p-4 rounded shadow">
                <h3 class="text-lg font-semibold">Registered Users</h3>
                <p id="registered-users" class="text-2xl font-bold">0</p>
            </div>
        </div>
    </section>
</div>

<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />

<script>
// Initialize map
var map = L.map('map').setView([0, 0], 2);

// Add OpenStreetMap tiles
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 18,
}).addTo(map);

// Example vehicle GPS data (to be replaced with dynamic data)
var vehicles = [
    { id: 1, name: "Bus 101", lat: 40.7128, lng: -74.0060 },
    { id: 2, name: "Van 202", lat: 34.0522, lng: -118.2437 },
    { id: 3, name: "Car 303", lat: 51.5074, lng: -0.1278 }
];

// Add markers for vehicles
vehicles.forEach(function(vehicle) {
    L.marker([vehicle.lat, vehicle.lng]).addTo(map)
        .bindPopup(vehicle.name);
});

// TODO: Fetch and update summary data dynamically
document.getElementById('total-vehicles').textContent = vehicles.length;
document.getElementById('active-rentals').textContent = 5; // Placeholder
document.getElementById('registered-users').textContent = 20; // Placeholder
</script>

<?php
require_once __DIR__ . '/../includes/footer.php';
?>
