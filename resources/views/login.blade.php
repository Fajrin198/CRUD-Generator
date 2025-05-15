<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Peminjaman Ruangan</title>
    <link rel="stylesheet" href="css/loginRegister.css">
</head>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const flash = document.getElementById('flashMessage');
        if (flash) {
            setTimeout(() => {
                flash.style.transition = 'opacity 0.5s ease';
                flash.style.opacity = '0';
                setTimeout(() => flash.remove(), 500); // hapus dari DOM
            }, 10000); // 10 detik
        }
    });
</script>
<style>
    #flashMessage {
        position: fixed;
        top: 20px;
        left: 50%;
        transform: translateX(-50%);
        background-color: rgba(46, 204, 113, 0.9); /* Hijau transparan */
        color: white;
        padding: 12px 24px;
        border-radius: 8px;
        font-weight: bold;
        z-index: 9999;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: opacity 0.5s ease;
    }
</style>
<body>
    @if(session('success'))
    <div id="flashMessage">
        {{ session('success') }}
    </div>
    @endif
    <div class="main-container">
        <div class="container">
            <div class="header">
                <!-- <img src="assets/logo.png" alt="Logo Universitas" class="logo"> -->
                <div class="title">CRUD GENERATOR</div>
            </div>
            <form action="{{ route('login.process') }}" method="POST">
                @csrf
                <div class="form-login">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Input email" required>
                </div>
                <div class="form-login">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Input password" required>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li style="color:red;list-style-type: none;">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <button class="btn">LOGIN</button>
            </form>
            <button class="btn btn-google">
                <img src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg" alt="Google Logo">
                Login dengan Google
            </button>
            <div class="footer">
                Belum punya akun? <a href="register">Daftar</a>
            </div>
        </div>
    </div>
    <script src="js/script.js"></script>
</body>

</html>