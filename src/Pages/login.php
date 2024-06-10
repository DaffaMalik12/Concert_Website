<?php
session_start();
include '../../Config/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare and bind
    $stmt = $conn->prepare("SELECT * FROM user_table WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Verify the password
        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $username;
            // Redirect to home.php
            header("Location: tiketing.php");
            exit();
        } else {
            $error = "Invalid password";
        }
    } else {
        $error = "No user found";
    }

    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.11.1/dist/full.min.css" rel="stylesheet" type="text/css" />
</head>

<body class="">
    <!-- Navbar -->
    <div class="navbar bg-yellow-300 ">
        <div class="flex-1">
            <a class="btn btn-ghost text-xl ml-48">Santi Tiket</a>
        </div>
    </div>
    <!-- Form Login -->
    <div style="background-image: url(../asset/img/Home%20Bg.png);" class="container bg-cover flex flex-col items-center justify-center min-h-screen -mt-16">
        <div class="w-full max-w-md">
            <h1 class="text-4xl font-bold text-center text-orange-500 mb-6">Login</h1>
            <div class="backdrop-blur-sm bg-white/30 rounded-lg shadow-md p-6">
                <?php if (isset($error)) {
                    echo "<p class='text-red-500 text-center'>$error</p>";
                } ?>
                <form class="space-y-6" method="POST" action="login.php">
                    <div>
                        <label for="username" class="block mb-2 text-sm font-medium text-gray-900">Username</label>
                        <input type="text" name="username" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Username" required>
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                        <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required>
                    </div>
                    <div class="flex items-center justify-between">
                        <a href="#" class="text-sm font-medium text-primary-600 hover:underline">Forgot password?</a>
                    </div>
                    <button type="submit" class="w-full text-white bg-slate-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Sign in</button>
                    <p class="text-sm font-light text-gray-500">
                        Don’t have an account yet? <a href="register.php" class="font-medium text-primary-600 hover:underline">Sign up</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</body>

</html>