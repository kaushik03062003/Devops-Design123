<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user'])) {
    die("Access Denied");
}

// Check if 'id' is passed in URL
if (!isset($_GET['id'])) {
    die("No design selected.");
}

$uid = $_SESSION['user'];
$did = (int)$_GET['id']; // safely cast to int to avoid SQL injection

// Insert booking
$sql = "INSERT INTO bookings (user_id, design_id) VALUES ($uid, $did)";
if ($conn->query($sql)) {
    echo "Booked successfully! <a href='user_dashboard.php'>Back</a>";
} else {
    echo "Error: " . $conn->error;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation</title>
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
            border eightyfour: 1px solid rgba(255, 255, 255, 0.2);
        }
    </style>
</head>
<body class="min-h-screen text-gray-200">
    <!-- Navigation Bar -->
    <nav class="bg-gray-900 shadow-lg sticky top-0 z-50 glass-effect">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <i class="fas fa-book-open text-2xl text-indigo-400 mr-2"></i>
                    <span class="text-xl font-bold">Booking System</span>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="user_dashboard.php" class="hover:text-indigo-400 transition"><i class="fas fa-home mr-1"></i> Dashboard</a>
                    <a href="designs.php" class="hover:text-indigo-400 transition"><i class="fas fa-paint-brush mr-1"></i> Designs</a>
                    <a href="logout.php" class="hover:text-indigo-400 transition"><i class="fas fa-sign-out-alt mr-1"></i> Logout</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="glass-effect rounded-lg shadow-xl p-8 text-center max-w-md mx-auto">
            <i class="fas fa-check-circle text-5xl text-green-400 mb-4"></i>
            <h1 class="text-2xl font-bold mb-4">Booking Confirmed!</h1>
            <p class="text-gray-300 mb-6">Your design has been successfully booked.</p>
            <a href="user_dashboard.php" class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 rounded-md text-white transition">
                <i class="fas fa-arrow-left mr-2"></i> Back to Dashboard
            </a>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-900 glass-effect mt-8 py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <p>© 2025 Booking System. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>