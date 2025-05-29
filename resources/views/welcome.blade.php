<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to EstateLink</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans bg-cover bg-center bg-no-repeat text-white" style="background-image: url('{{ asset('images/00f47ba20fd31f35fcfe75c555d85a8d.jpg') }}');">

    {{-- Hero Section --}}
    <div class="min-h-screen bg-black/70 flex flex-col items-center justify-center text-center px-4">
        <h1 class="text-5xl sm:text-7xl font-extrabold mb-4 text-white drop-shadow-lg">Welcome to EstateLink</h1>
        <p class="text-lg sm:text-xl mb-6 text-gray-200">Find or list real estate easily with us</p>
        <div class="flex gap-4">
            <a href="{{ route('login') }}" class="bg-babyblue text-navy px-6 py-2 rounded hover:bg-orange hover:shadow transition">Login</a>
            <a href="{{ route('register') }}" class="bg-babyblue text-navy px-6 py-2 rounded hover:bg-orange hover:shadow transition">Register</a>
        </div>
    </div>

    {{-- About Us Section --}}
    <section class="bg-gradient-to-br from-navy via-babyblue text-navy py-16 px-6 sm:px-12">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-4xl text-navy font-bold mb-4">About EstateLink</h2>
            <p class="text-lg text-white leading-relaxed">
                EstateLink is your gateway to finding or listing real estate with ease and elegance.
                Whether you're a buyer, seller, or investor, we provide a seamless and secure platform to connect with your dream property.
                Our mission is to simplify the real estate process while offering a luxurious user experience.
            </p>
        </div>
    </section>

</body>
</html>
