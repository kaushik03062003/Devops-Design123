<?php
session_start();
include 'db.php';
if (!isset($_SESSION['user'])) die("Access Denied");
$res = $conn->query("SELECT * FROM designs");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Browse Designs</title>
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
        .design-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .design-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.3);
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
                    <a href="book_design.php" class="hover:text-indigo-400 transition"><i class="fas fa-paint-brush mr-1"></i> Designs</a>
                    <a href="my_bookings.php" class="hover:text-indigo-400 transition"><i class="fas fa-calendar-check mr-1"></i> My Bookings</a>
                    <a href="logout.php" class="hover:text-indigo-400 transition"><i class="fas fa-sign-out-alt mr-1"></i> Logout</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="glass-effect rounded-lg shadow-xl p-6">
            <h1 class="text-3xl font-bold mb-6 flex items-center">
                <i class="fas fa-paint-brush text-indigo-400 mr-3"></i>
                Browse Designs
            </h1>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php while($row = $res->fetch_assoc()): ?>
                    <div class="design-card bg-gray-800 rounded-lg overflow-hidden glass-effect p-4">
                        <img src="Uploads/<?php echo htmlspecialchars($row['image']); ?>" alt="<?php echo htmlspecialchars($row['title']); ?>" class="w-full h-48 object-cover rounded-md mb-4">
                        <h2 class="text-xl font-semibold flex items-center">
                            <i class="fas fa-tag text-indigo-400 mr-2"></i>
                            <?php echo htmlspecialchars($row['title']); ?>
                        </h2>
                        <p class="text-green-400 font-bold my-2">
                            <i class="fas fa-dollar-sign mr-1"></i>
                            <?php echo number_format($row['price'], 2); ?>
                        </p>
                        <p class="text-gray-300 text-sm mb-4"><?php echo htmlspecialchars($row['description']); ?></p>
                        <a href="book_design.php?id=<?php echo $row['id']; ?>" class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 rounded-md text-white transition">
                            <i class="fas fa-calendar-check mr-2"></i> Book Now
                        </a>
                    </div>
                <?php endwhile; ?>
            </div>
            <?php if ($res->num_rows == 0): ?>
                <p class="text-center text-gray-300 mt-6">No designs available.</p>
            <?php endif; ?>
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