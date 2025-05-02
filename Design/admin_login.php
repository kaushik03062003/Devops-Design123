<?php
session_start();
include 'db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    if ($user == "admin" && $pass == "admin123") {
        $_SESSION['admin'] = true;
        header("Location: admin_dashboard.php");
        exit();
    } else {
        $error = "Invalid credentials";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body {
            min-height: 100vh;
            background-image: url('https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=1920&q=80');
            background-size: cover;
            background-attachment: fixed;
            background-position: center;
            font-family: 'Inter', sans-serif;
        }
        .navbar {
            background: linear-gradient(to right, rgba(59, 130, 246, 0.95), rgba(37, 99, 235, 0.95));
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .nav-link {
            transition: all 0.3s ease;
            position: relative;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            border-radius: 8px;
        }
        .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.1);
            transform: translateY(-2px);
        }
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background-color: #ffffff;
            transition: width 0.3s ease;
        }
        .nav-link:hover::after {
            width: 100%;
        }
        .form-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(5px);
            border-radius: 1rem;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
            transition: transform 0.3s ease;
        }
        .form-container:hover {
            transform: translateY(-5px);
        }
        .form-group {
            position: relative;
        }
        .form-group i {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #3b82f6;
        }
        .form-group input {
            padding-left: 2.5rem;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }
        .form-group input:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }
        .error {
            background: #ef4444;
            color: white;
            padding: 1rem;
            border-radius: 8px;
            text-align: center;
            font-weight: 600;
        }
        button {
            transition: all 0.3s ease;
        }
        button:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body class="min-h-screen flex flex-col">
    <!-- Navigation Bar -->
    <nav class="navbar py-4 px-6 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <div class="text-white text-2xl font-bold flex items-center gap-2">
                <i class="fa-solid fa-home"></i>
                Interior Admin
            </div>
            <div class="flex space-x-4">
                <a href="index.php" class="nav-link text-white">
                    <i class="fa-solid fa-house"></i>
                    Home
                </a>
                <a href="admin_login.php" class="nav-link text-white">
                    <i class="fa-solid fa-lock"></i>
                    Admin Login
                </a>
            </div>
        </div>
    </nav>

    <!-- Login Form -->
    <main class="flex-grow flex items-center justify-center px-6 py-12">
        <div class="form-container p-8 max-w-md w-full">
            <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center justify-center gap-2">
                <i class="fa-solid fa-sign-in-alt text-blue-600"></i>
                Admin Login
            </h2>
            <form method="post">
                <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
                <div class="form-group mb-4">
                    <i class="fa-solid fa-user"></i>
                    <input type="text" name="user" placeholder="Username" required class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                </div>
                <div class="form-group mb-6">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" name="pass" placeholder="Password" required class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                </div>
                <button type="submit" class="w-full bg-blue-600 text-white p-3 rounded-lg hover:bg-blue-700 flex items-center justify-center gap-2">
                    <i class="fa-solid fa-right-to-bracket"></i>
                    Login
                </button>
            </form>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-4 text-center">
        <p>© 2025 Interior Admin. All rights reserved.</p>
    </footer>
</body>
</html>