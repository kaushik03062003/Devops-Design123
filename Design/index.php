<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking System - Welcome</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body {
            background-image: url('https://images.unsplash.com/photo-1557683316-973673baf926?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');
            background-size: cover;
            background-attachment: fixed;
            background-position: center;
        }
        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        .hero-section {
            min-height: calc(100vh - 8rem);
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>
<body class="min-h-screen text-gray-200">
    <!-- Navigation Bar -->
    <nav class="bg-gray-900 shadow-lg fixed top-0 w-full z-50 glass-effect">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <i class="fas fa-book-open text-2xl text-indigo-400 mr-2"></i>
                    <span class="text-xl font-bold">Booking System</span>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="index.php" class="hover:text-indigo-400 transition"><i class="fas fa-home mr-1"></i> Home</a>
                    <a href="user_signup.php" class="hover:text-indigo-400 transition"><i class="fas fa-user-plus mr-1"></i> Register</a>
                    <a href="user_login.php" class="hover:text-indigo-400 transition"><i class="fas fa-sign-in-alt mr-1"></i> Login</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="hero-section">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="glass-effect rounded-lg shadow-xl p-8">
                <h1 class="text-4xl font-bold mb-4 flex items-center justify-center">
                    <i class="fas fa-book-open text-indigo-400 mr-3"></i>
                    Welcome to Booking System
                </h1>
                <p class="text-gray-300 text-lg mb-6">
                    Discover and book stunning designs with ease. Join our platform to explore a wide range of creative designs and secure your bookings effortlessly.
                </p>
                <div class="flex justify-center space-x-4">
                    <a href="user_login.php" class="inline-flex items-center px-6 py-3 bg-indigo-600 hover:bg-indigo-700 rounded-md text-white font-semibold transition">
                        <i class="fas fa-user-plus mr-2"></i>
                        User Login
                    </a>
                    <a href="admin_login.php" class="inline-flex items-center px-6 py-3 bg-gray-700 hover:bg-gray-800 rounded-md text-white font-semibold transition">
                        <i class="fas fa-sign-in-alt mr-2"></i>
                        Admin Login
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-900 glass-effect py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <p>© 2025 Booking System. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>