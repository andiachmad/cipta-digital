<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Cipta Digital</title>
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
                <h2 style="margin-top: 90px;">Sign Up</h2>
                <form method="POST" action="#">
                    @csrf
                    <label for="email">Nama</label>
                    <input type="text" name="nama" placeholder="Cipta Digital" required>

                    <label for="email">E-mail</label>
                    <input type="email" name="email" placeholder="example@gmail.com" required>

                    <label for="password">Password</label>
                    <div class="password-field">
                        <input type="password" id="password" name="password" placeholder="@#*%" required>
                        <span class="toggle-password" onclick="togglePassword()">
                            <i id="toggleIcon" class="bi bi-eye"></i>
                        </span>
                    </div>

                    <label for="password">Confirm Password</label>
                    <div class="password-field">
                        <input type="password" id="confirm-password" name="confirm-password" placeholder="@#*%" required>
                        <span class="toggle-password" onclick="toggleConfirmPassword()">
                            <i id="toggleIcon" class="bi bi-eye"></i>
                        </span>
                    </div>

                    <p class="register-text">
                        Already have an account?<a href="{{ route('auth.login') }}"> Sign In </a>
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
            function toggleConfirmPassword() {
                const passwordField = document.getElementById("confirm-password");
                const icon = document.getElementById("toggleIcon");
                if (passwordField.type === "password") {
                    passwordField.type = "text";
                    icon.classList.remove("bi-eye");
                    icon.classList.add("bi-eye-slash");
                } else {
                    // trigger push
                    passwordField.type = "password";
                    icon.classList.remove("bi-eye-slash");
                    icon.classList.add("bi-eye");
                }
                
            }
        </script>
</body>

</html>