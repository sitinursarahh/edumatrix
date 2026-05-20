<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css"> <!-- linking with style.css -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'> <!-- linking with boxicon.com -->
    <link rel="icon" href="#"> <!-- your logo optional -->
    <title>sign-up__sign-in</title>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>
<a href="{{ url()->previous() }}" class="back-button">
    <i class='bx bx-arrow-back'></i>
</a>
<div class="matrix-bg">
    <span>[ ]</span><span>[ ]</span><span>[ ]</span><span>[ ]</span><span>[ ]</span>
    <span>[ ]</span><span>[ ]</span><span>[ ]</span><span>[ ]</span><span>[ ]</span>
    <span>[ ]</span><span>[ ]</span><span>[ ]</span><span>[ ]</span><span>[ ]</span>
    <span>[ ]</span><span>[ ]</span><span>[ ]</span><span>[ ]</span><span>[ ]</span>
</div>

                 <!-- Sign up -->
    <div class="container" id="container">
        <div class="form-container sign-up">
    <form method="POST" action="{{ route('register') }}">
    @csrf

    <h1>Daftar Akun</h1>

    <div class="input-group">
        <label>Nama</label>
        <input type="text" name="name" required>
    </div>

    <div class="input-group">
        <label>Email</label>
        <input type="email" name="email" required>
    </div>

    <div class="input-group" style="position: relative;">
    <label>Kata Sandi</label>
    <input type="password" name="password" id="passwordRegister" required>

    <span onclick="togglePassword('passwordRegister', this)" 
          style="position:absolute; right:10px; top:38px; cursor:pointer;">
        <i class="fa fa-eye-slash"></i>
    </span>
</div>

    <div class="input-group" style="position: relative;">
    <label>Konfirmasi Kata Sandi</label>
    <input type="password" name="password_confirmation" id="passwordConfirm" required>

    <span onclick="togglePassword('passwordConfirm', this)" 
          style="position:absolute; right:10px; top:38px; cursor:pointer;">
        <i class="fa fa-eye-slash"></i>
    </span>
</div>

    <!-- <div class="input-group">
        <label>Kelas</label>
        <input type="text" name="kelas">
    </div> -->

    <div class="input-group">
        <label>Daftar Sebagai</label>
        <select name="role" id="role" required>
            <option value="">-- Pilih --</option>
            <option value="siswa">Siswa</option>
            <option value="guru">Guru</option>
        </select>
    </div>

    <div class="input-group" id="token-siswa" style="display: none;">
    <label>Kelas</label>
    <select name="kelas" id="kelas-input" disabled required>
        <option value="">-- Pilih Kelas --</option>
        <option value="1">XI IPA 1</option>
        <option value="2">XI IPA 2</option>
        <option value="3">XI IPS 1</option>
        <option value="4">XI IPS 2</option>
    </select>

    <label>Token Kelas</label>
    <input type="text" name="token_siswa" id="token-siswa-input" disabled>
</div>

    <div class="input-group" id="token-guru" style="display: none;">
        <label>Token Guru</label>
        <input type="text" name="token_guru" id="token-guru-input" disabled>
    </div>

    <button type="submit">Sign Up</button>

    @if ($errors->any())
    <div class="error-box">
        @foreach ($errors->all() as $error)
            <p style="color:red; font-size:14px;">{{ $error }}</p>
        @endforeach
    </div>
@endif

</form>

</div>


                 <!-- Sign in -->
        <div class="form-container sign-in">
            <form method="POST" action="{{ route('login') }}">
    @csrf

    <div class="text-center mb-3">
    <img src="{{ asset('img/logo.png') }}" width="140" style="margin-top: -35px;" alt="Logo" class="logo-login">
</div>


    <h1>Log In</h1>

    <div class="input-group">
        <label>Email</label>
        <input type="email" name="email" required>
    </div>

    <div class="input-group" style="position: relative;">
    <label>Kata Sandi</label>
    <input type="password" name="password" id="passwordLogin" required>

    <span onclick="togglePassword('passwordLogin', this)" 
          style="position:absolute; right:10px; top:38px; cursor:pointer;">
        <i class="fa fa-eye-slash"></i>
    </span>
</div>

    <button type="submit">Log In</button>

    @if ($errors->has('login'))
    <p style="color:red; font-size:14px; margin-top:10px;">
        {{ $errors->first('login') }}
    </p>
@endif

</form>

        </div>

                <!--Redirect to Sign in Page-->
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Selamat Datang di<br>EduMatrix</h1>
                    <p>Masuk untuk mulai belajar matriks</p>
                    <button class="hidden" id="login">Log In</button>
                </div>
                <!--Redirect to Sign up Page-->
                <div class="toggle-panel toggle-right">
                    <h1>EduMatrix</h1>
                    <p>Daftar sekarang dan pahami matriks dengan mudah serta interaktif</p>
                    <br>
                    <p>Belum punya akun? daftar disini👇🏼</p>
                    <button class="hidden" id="register">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

    
    <!-- linking with script.js -->
<script>
    const container = document.getElementById('container');
const registerBtn = document.getElementById('register');
const loginBtn = document.getElementById('login');

registerBtn.addEventListener('click', () => {
    container.classList.add("active");
});

loginBtn.addEventListener('click', () => {
    container.classList.remove("active");
});
</script>



<script>
const roleSelect = document.getElementById("role");

const tokenSiswaGroup = document.getElementById("token-siswa");
const tokenGuruGroup = document.getElementById("token-guru");

const kelasInput = document.getElementById("kelas-input");
const tokenSiswaInput = document.getElementById("token-siswa-input");
const tokenGuruInput = document.getElementById("token-guru-input");

roleSelect.addEventListener("change", function () {

    // SEMBUNYIKAN + DISABLE SEMUA
    tokenSiswaGroup.style.display = "none";
    tokenGuruGroup.style.display = "none";

    kelasInput.disabled = true;
    tokenSiswaInput.disabled = true;
    tokenGuruInput.disabled = true;

    if (this.value === "siswa") {
        tokenSiswaGroup.style.display = "flex";
        kelasInput.disabled = false;
        tokenSiswaInput.disabled = false;
    }

    if (this.value === "guru") {
        tokenGuruGroup.style.display = "flex";
        tokenGuruInput.disabled = false;
    }
});
</script>

<script>
@if ($errors->any())
    document.getElementById('container').classList.add("active");
@endif
</script>


<script>
@if ($errors->has('login'))
    document.getElementById('container').classList.remove("active");
@endif
</script>

<script>
function togglePassword(inputId, el) {
    const input = document.getElementById(inputId);
    const icon = el.querySelector("i");

    if (input.type === "password") {
        input.type = "text";
        icon.classList.remove("fa-eye-slash");
        icon.classList.add("fa-eye");
    } else {
        input.type = "password";
        icon.classList.remove("fa-eye");
        icon.classList.add("fa-eye-slash");
    }
}
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if(session('success'))
<script>
Swal.fire({
    icon: 'success',
    title: 'Berhasil',
    text: '{{ session('success') }}',
    confirmButtonText: 'OK'
});
</script>
@endif
</body>
</html>
<!-- created by badr aouragh or boss.exe -->