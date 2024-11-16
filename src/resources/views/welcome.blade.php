<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to My App</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="h-screen bg-cyan-800 flex justify-center items-center ">
    <!-- Wrapper -->
    <div class=" bg-white rounded p-8 text-center">
        <!-- Logo -->
        <div class="mb-8">
            <img src="{{ asset('images/logo_icon_black.png') }}" alt="CoreConnect" class="h-12 w-auto mx-auto">
        </div>
        <!-- Title -->
        <h1 class="text-4xl font-bold text-gray-700 mb-4">Core Connect</h1>

        <!-- Subtitle -->
        <p class="text-lg text-gray-500 mb-8">
            Authentic Conversations Strengthen the Bonds of True Friendship

        </p>

        <!-- Buttons -->
        <div class="flex justify-center gap-4">
            <!-- Login Button -->
            <a href="{{ route('login') }}" class="px-6 py-2 bg-gray-500 text-white rounded shadow hover:bg-gray-700">
                Log In
            </a>
            <!-- Register Button -->
            <a href="{{ route('register') }}" class="px-6 py-2 bg-white border-2 border-gray-600 text-gray-700 rounded shadow hover:bg-gray-200">
                Register
            </a>
        </div>
    </div>
</body>

