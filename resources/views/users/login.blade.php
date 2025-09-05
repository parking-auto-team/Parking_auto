@extends('base.auth')

@section('auth-content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }

    body {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      background: url("/img/IMG_7097.JPG") no-repeat;
      background-size: cover;
      background-position: center;
    }

    .wrapper {
      width: 420px;
      background-color: transparent;
      border: 2px solid rgba(255, 255, 255, 0.2);
      backdrop-filter: blur(15px);
      box-shadow: 0 0 10px rgba(0, 0, 0, .2);
      color: #fff;
      border-radius: 10px;
      padding: 30px 40px;
    }

    .wrapper h4 {
      text-align: center;
      margin-top: 10px;
      color: #fff;
    }

    .wrapper .input-box {
      width: 100%;
      height: 50px;
      position: relative;
      margin: 20px 0;
    }

    .input-box input,
    .input-box select {
      width: 100%;
      height: 100%;
      background: transparent;
      border: none;
      outline: none;
      border: 2px solid rgba(255, 255, 255, 0.2);
      border-radius: 40px;
      font-size: 16px;
      color: #fff;
      padding: 20px;
    }

    .input-box input::placeholder {
      color: #fff;
    }

    .input-box i {
      position: absolute;
      right: 20px;
      top: 50%;
      transform: translateY(-50%);
      font-size: 20px;
    }

    .wrapper .btn {
      width: 100%;
      height: 45px;
      background: #fff;
      border: none;
      outline: none;
      border-radius: 40px;
      cursor: pointer;
      font-size: 16px;
      color: #333;
      font-weight: 600;
      margin-top: 15px;
    }

    .error-alert {
        color: #ffcccb;
        font-size: 13px;
        margin-top: -10px;
        margin-bottom: 10px;
    }

    .alert-danger {
        background-color: rgba(255, 0, 0, 0.2);
        color: #fff;
        padding: 10px;
        border-radius: 8px;
        text-align: center;
        margin-top: 10px;
    }

    .show-password {
        position: absolute;
        right: 45px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 20px;
        cursor: pointer;
        display: none;
    }

    .lock-icon {
        transition: all 0.3s;
    }
</style>

<div class="wrapper">
    <div class="text-center">
        <img src="{{ asset('assets2/images/Parking4.png') }}" alt="logo" width="50">
    </div>
    <h4>Bienvenue sur la page de connexion</h4>

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('login.submit') }}" method="POST">
        @csrf

        <div class="input-box">
            <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
            <i class='bx bxs-user'></i>
        </div>
        @error('email')
            <div class="error-alert">{{ $message }}</div>
        @enderror

        <div class="input-box">
            <input type="password" name="password" id="password" placeholder="Mot de passe" required>
            <i class='bx bxs-lock-alt lock-icon'></i>
            <i class='bx bx-hide show-password' style="display: none; right: 45px !important;"></i>
        </div>
        @error('password')
            <div class="error-alert">{{ $message }}</div>
        @enderror

        <div class="input-box">
            <select name="user_type" required style="background: gray; border: 2px solid rgba(255, 255, 255, 0.2); border-radius: 40px; color: #fff; font-size: 16px; padding: 0 20px; appearance: none;">
                <option value="">Sélectionnez votre rôle</option>
                <option value="client">Client</option>
                <option value="gerant">Gérant</option>
                <option value="admin">Admin</option>
            </select>
        </div>
        @error('user_type')
            <div class="error-alert">{{ $message }}</div>
        @enderror

        <button type="submit" class="btn">Se connecter</button>
    </form>
</div>

<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const passwordInput = document.getElementById('password');
    const lockIcon = document.querySelector('.lock-icon');
    const showPasswordIcon = document.querySelector('.show-password');

    showPasswordIcon.addEventListener('click', function() {
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            this.classList.replace('bx-hide', 'bx-show');
            lockIcon.style.display = 'none';
        } else {
            passwordInput.type = 'password';
            this.classList.replace('bx-show', 'bx-hide');
            lockIcon.style.display = 'block';
        }
    });

    passwordInput.addEventListener('focus', function() {
        showPasswordIcon.style.display = 'block';
    });

    passwordInput.addEventListener('blur', function() {
        if (this.value === '') {
            showPasswordIcon.style.display = 'none';
            lockIcon.style.display = 'block';
        }
    });
});
</script>
@endsection
