<?php
session_start();
include 'db.php';
if (!isset($_SESSION['admin'])) die("Access Denied");
$res = $conn->query("SELECT b.id, u.username, d.title FROM bookings b JOIN users u ON b.user_id = u.id JOIN designs d ON b.design_id = d.id");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Booking Dashboard</title>
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
    </style>
</head>
<body class="min-h-screen text-gray-200">
    <!-- Navigation Bar -->
    <nav class="bg-gray-900 shadow-lg sticky top-0 z-50 glass-effect">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <i class="fas fa-book-open text-2xl text-indigo-400 mr-2"></i>
                    <span class="text-xl font-bold">Booking Dashboard</span>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="admin_dashboard.php" class="hover:text-indigo-400 transition"><i class="fas fa-home mr-1"></i> Home</a>
                    <a href="manage_design.phpx" class="hover:text-indigo-400 transition"><i class="fas fa-users mr-1"></i> Manage Design</a>
                    <a href="logout.php" class="hover:text-indigo-400 transition"><i class="fas fa-sign-out-alt mr-1"></i> Logout</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="glass-effect rounded-lg shadow-xl p-6">
            <h1 class="text-3xl font-bold mb-6 flex items-center">
                <i class="fas fa-calendar-check text-indigo-400 mr-3"></i>
                Booking Records
            </h1>
            <div class="overflow-x-auto">
                <table class="w-full table-auto">
                    <thead>
                        <tr class="bg-gray-800 text-left">
                            <th class="px-4 py-3"><i class="fas fa-user mr-2"></i> Username</th>
                            <th class="px-4 py-3"><i class="fas fa-paint-brush mr-2"></i> Design Title</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row = $res->fetch_assoc()): ?>
                            <tr class="border-b border-gray-700 hover:bg-gray-800 transition">
                                <td class="px-4 py-3"><?php echo htmlspecialchars($row['username']); ?></td>
                                <td class="px-4 py-3"><?php echo htmlspecialchars($row['title']); ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-900 glass-effect mt-8 py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <p>&copy; 2025 Booking System. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>