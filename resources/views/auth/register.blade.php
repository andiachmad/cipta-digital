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
                    <form method="POST" action="{{ route('auth.register.post') }}">
                        @csrf

                        <!-- Nama -->
                        <label for="nama">Nama</label>
                        <input type="text" id="nama" name="nama" placeholder="username" required value="{{ old('nama') }}">
                        @error('nama')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <!-- Email -->
                        <label for="email">E-mail</label>
                        <input type="email" id="email" name="email" placeholder="example@gmail.com" required>

                        <!-- Password -->
                        <label for="password">Password</label>
                        <div class="password-field">
                            <input type="password" id="password" name="password" placeholder="@#*%" required>
                            <span class="toggle-password" onclick="togglePassword()">
                                <i id="toggleIconPassword" class="bi bi-eye"></i>
                            </span>
                        </div>
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <!-- Confirm Password -->
                        <label for="password_confirmation">Confirm Password</label>
                        <div class="password-field">
                            <input type="password" id="confirm-password" name="password_confirmation" placeholder="@#*%" required>
                            <span class="toggle-password" onclick="toggleConfirmPassword()">
                                <i id="toggleIconConfirm" class="bi bi-eye"></i>
                            </span>
                        </div>
                        @error('password_confirmation')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <!-- Link ke Login -->
                        <p class="register-text">
                            Already have an account? <a href="{{ route('auth.login') }}">Sign In</a>
                        </p>

                        <!-- Tombol Submit -->
                        <button type="submit" class="btn-submit">Sign Up</button>
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
                const icon = document.getElementById("toggleIconPassword");
                
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
                const icon = document.getElementById("toggleIconConfirm");

                if (passwordField.type === "password") {
                    passwordField.type = "text";
                    icon.classList.replace("bi-eye", "bi-eye-slash");
                } else {
                    // trigger push
                    passwordField.type = "password";
                    icon.classList.replace("bi-eye-slash", "bi-eye");
                }
                
            }
        </script>
    </body>
</html>