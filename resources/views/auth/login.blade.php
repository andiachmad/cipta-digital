<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In - Cipta Digital</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
</head>

<body>
    <div class="container">
        <!-- Left Section -->
        <div class="left-box">
            <!-- Logo di atas card -->
            <div class="logo-header">
                <img src="{{ asset('images/logo (2).png') }}" alt="Cipta Digital" />
            </div>
            <!-- Isi form -->
            <div class="form-content">
                <h2>Sign In</h2>
                <form method="POST" action="{{ route('auth.login.post') }}">
                    @csrf
                    <label for="email">E-mail</label>
                    <input type="email" name="email" placeholder="example@gmail.com" required>

                    <label for="password">Password</label>
                    <div class="password-field">
                        <input type="password" id="password" name="password" placeholder="@#*%" required>
                        <span class="toggle-password" onclick="togglePassword()">
                            <i id="toggleIcon" class="bi bi-eye"></i>
                        </span>
                    </div>

                    <p class="register-text">
                        Don’t have an account? <a href="{{ route('auth.register') }}">Create now</a>
                    </p>

                    <button type="submit" class="btn-submit">Sign in</button>
                </form>
            </div>
        </div>

        <!-- Right Section (Banner) -->
        <div class="right-box">
            <img src="{{ asset('images/banner.png') }}" alt="Banner" class="banner-img">
        </div>

        <script>
            function togglePassword() {
                const passwordField = document.getElementById("password");
                const icon = document.getElementById("toggleIcon");
                if (passwordField.type === "password") {
                    passwordField.type = "text";
                    icon.classList.remove("bi-eye");
                    icon.classList.add("bi-eye-slash");
                } else {
                    passwordField.type = "password";
                    icon.classList.remove("bi-eye-slash");
                    icon.classList.add("bi-eye");
                    
                }
            }
        </script>
</body>

</html>