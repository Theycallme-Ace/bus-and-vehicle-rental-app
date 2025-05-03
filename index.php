<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Bus and Vehicle Rental</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

<header class="bg-white shadow">
    <div class="container mx-auto px-4 py-4 flex justify-between items-center">
        <a href="index.php" class="text-2xl font-bold text-blue-600">BusRental</a>
        <nav>
            <ul class="flex space-x-6 text-gray-700">
                <li><a href="#" class="hover:text-blue-600 transition">Home</a></li>
                <li><a href="#" class="hover:text-blue-600 transition">Vehicles</a></li>
                <li><a href="#" class="hover:text-blue-600 transition">Destinations</a></li>
                <li><a href="#" class="hover:text-blue-600 transition">About</a></li>
                <li><a href="login.php" class="hover:text-blue-600 transition">Admin Login</a></li>
                <li><a href="register.php" class="hover:text-blue-600 transition">Register</a></li>
            </ul>
        </nav>
    </div>
</header>

<!-- Slider Section -->
<section class="relative max-w-6xl mx-auto mt-6">
    <div class="overflow-hidden rounded-lg shadow-lg">
        <div class="relative h-64 sm:h-96">
            <img src="assets/slider1.jpg" alt="Slider Image 1" class="absolute inset-0 w-full h-full object-cover" />
            <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center">
                <h2 class="text-white text-3xl sm:text-5xl font-bold">Welcome to Bus and Vehicle Rental</h2>
            </div>
        </div>
    </div>
</section>

<!-- Main Content -->
<main class="container mx-auto px-4 py-8">
    <h3 class="text-xl font-semibold mb-4">Our Services</h3>
    <p class="text-gray-700 mb-6">
        We offer a wide range of buses and vehicles for rent with competitive tariffs and excellent service.
    </p>
    <!-- Additional content can be added here -->
</main>

<footer class="bg-white border-t mt-12 py-6 text-center text-gray-600">
    &copy; 2024 Bus and Vehicle Rental. All rights reserved.
</footer>

</body>
</html>
