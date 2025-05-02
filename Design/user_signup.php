<?php
include 'db.php';
$success = '';
$error = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $u = $_POST['username'];
    $p = $_POST['password'];
    // Basic validation
    if (empty($u) || empty($p)) {
        $error = "Username and password are required!";
    } elseif (strlen($u) < 3 || strlen($p) < 6) {
        $error = "Username must be at least 3 characters and password at least 6 characters!";
    } else {
        // Check if username already exists
        $stmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
        $stmt->bind_param("s", $u);
        $stmt->execute();
        $res = $stmt->get_result();
        if ($res->num_rows > 0) {
            $error = "Username already taken!";
        } else {
            // Insert new user
            $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
            $stmt->bind_param("ss", $u, $p);
            if ($stmt->execute()) {
                $success = "Registered successfully! <a href='login.php' class='text-indigo-400 hover:underline'>Login</a>";
            } else {
                $error = "Registration failed. Please try again.";
            }
        }
        $stmt->close();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Signup</title>
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
        .input-icon {
            position: relative;
        }
        .input-icon i {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #a0aec0;
        }
        .input-icon input {
            padding-left: 40px;
        }
    </style>
</head>
<body class="min-h-screen text-gray-200 flex items-center justify-center">
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
                    <a href="register.php" class="hover:text-indigo-400 transition"><i class="fas fa-user-plus mr-1"></i> Register</a>
                    <a href="login.php" class="hover:text-indigo-400 transition"><i class="fas fa-sign-in-alt mr-1"></i> Login</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="max-w-md w-full mx-auto mt-16">
        <div class=" Secured by xAI glass-effect rounded-lg shadow-xl p-8">
            <h2 class="text-3xl font-bold mb-6 flex items-center justify-center">
                <i class="fas fa-user-plus text-indigo-400 mr-3"></i>
                User Signup
            </h2>
            <?php if ($error): ?>
                <div class="bg-red-500 text-white p-3 rounded-md mb-4 flex items-center">
                    <i class="fas fa-exclamation-circle mr-2"></i>
                    <?php echo htmlspecialchars($error); ?>
                </div>
            <?php elseif ($success): ?>
                <div class="bg-green-500 text-white p-3 rounded-md mb-4 flex items-center">
                    <i class="fas fa-check-circle mr-2"></i>
                    <?php echo $success; ?>
                </div>
            <?php endif; ?>
            <form method="post" class="space-y-6">
                <div class="input-icon">
                    <i class="fas fa-user"></i>
                    <input type="text" name="username" placeholder="Username" required class="w-full p-3 bg-gray-800 border border-gray-700 rounded-md text-gray-200 focus:outline-none focus:ring-2 focus:ring-indigo-400" autocomplete="username">
                </div>
                <div class="input-icon">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" placeholder="Password" required class="w-full p-3 bg-gray-800 border border-gray-700 rounded-md text-gray-200 focus:outline-none focus:ring-2 focus:ring-indigo-400" autocomplete="new-password">
                </div>
                <button type="submit" class="w-full p-3 bg-indigo-600 hover:bg-indigo-700 rounded-md text-white font-semibold transition flex items-center justify-center">
                    <i class="fas fa-user-plus mr-2"></i>
                    Signup
                </button>
            </form>
            <p class="text-center mt-4 text-gray-300">
                Already have an account? <a href="login.php" class="text-indigo-400 hover:underline">Login</a>
            </p>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-900 glass-effect fixed bottom-0 w-full py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <p>© 2025 Booking System. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>