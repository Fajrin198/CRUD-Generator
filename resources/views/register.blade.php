<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Sistem Peminjaman Ruangan</title>
    <link rel="stylesheet" href="css/loginRegister.css">
</head>

<body class="login-page">

    <div class="main-container">
        <div class="container">
            <div class="header">
                <!-- <img src="assets/logo.png" alt="Logo Universitas" class="logo"> -->
                <div class="title">CRUD GENERATOR</div>
            </div>
            <form action="/register" method="post">
                @csrf
                <div class="form-login">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Input email" value="{{ old('email') }}">
                    @error('email')<small style="color:red">{{ $message }}</small>@enderror
                </div>
                <div class="form-login">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Input password">
                    @error('password')<small style="color:red">{{ $message }}</small>@enderror
                </div>
                <div class="form-login">
                    <label for="confirmPassword">Confirm Password</label>
                    <input type="password" id="confirmPassword" name="password_confirmation" placeholder="Input password again">
                </div>
                <button type="submit" class="btn" id="registerButton">DAFTAR</button>
            </form>
            <button class="btn btn-google">
                <img src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg" alt="Google Logo">
                Daftar dengan Google
            </button>
            <div class="footer">
                Punya akun? <a href="login">Login</a>
            </div>
        </div>
    </div>

    <script src="js/script.js"></script>
</body>
</html>