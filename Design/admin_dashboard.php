<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome CDN for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            background-image: url('https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=1920&q=80');
            background-size: cover;
            background-attachment: fixed;
            background-position: center;
        }
        .navbar {
            background: linear-gradient(to right, rgba(59, 130, 246, 0.9), rgba(37, 99, 235, 0.9));
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .nav-link {
            transition: all 0.3s ease;
            position: relative;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        .nav-link:hover {
            transform: translateY(-2px);
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 8px;
        }
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background-color: #ffffff;
            transition: width 0.3s ease;
        }
        .nav-link:hover::after {
            width: 100%;
        }
        .welcome-section {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 1rem;
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(5px);
        }
    </style>
</head>
<body class="min-h-screen flex flex-col">
    <!-- PHP Session Check -->
    <?php
        session_start();
        if (!isset($_SESSION['admin'])) {
            die("Access Denied");
        }
    ?>

    <!-- Navigation Bar -->
    <nav class="navbar py-4 px-6 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <div class="text-white text-2xl font-bold flex items-center gap-2">
                <i class="fa-solid fa-shield-halved"></i>
                Admin Dashboard
            </div>
            <div class="flex space-x-6">
                <a href="add_design.php" class="nav-link text-white px-4 py-2 rounded-lg">
                    <i class="fa-solid fa-plus-circle"></i>
                    Add Design
                </a>
                <a href="manage_design.php" class="nav-link text-white px-4 py-2 rounded-lg">
                    <i class="fa-solid fa-cogs"></i>
                    Manage Designs
                </a>
                <a href="view_bookings.php" class="nav-link text-white px-4 py-2 rounded-lg">
                    <i class="fa-solid fa-calendar-check"></i>
                    View Bookings
                </a>
                <a href="logout.php" class="nav-link text-white px-4 py-2 rounded-lg">
                    <i class="fa-solid fa-sign-out-alt"></i>
                    Logout
                </a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-grow flex items-center justify-center px-6 py-12">
        <div class="welcome-section p-8 max-w-2xl text-center">
            <h1 class="text-3xl font-bold text-gray-800 mb-4">Welcome, Admin!</h1>
            <p class="text-gray-600 mb-6">Manage your designs and bookings with ease. Use the navigation bar above to get started.</p>
            <div class="flex justify-center gap-4">
                <a href="add_design.php" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition flex items-center gap-2">
                    <i class="fa-solid fa-plus"></i>
                    Add New Design
                </a>
                <a href="view_bookings.php" class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition flex items-center gap-2">
                    <i class="fa-solid fa-eye"></i>
                    View Bookings
                </a>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-4 text-center">
        <p>&copy; 2025 Admin Dashboard. All rights reserved.</p>
    </footer>
</body>
</html>