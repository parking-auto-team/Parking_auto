@extends('base.client')

@section('client-content')

<style>
    .password-card {
        background: linear-gradient(135deg, #fff, #224abe);
        color: #fff;
        border-radius: 15px;
        padding: 30px;
        box-shadow: 0 15px 35px rgba(0,0,0,0.3);
        transition: all 0.4s ease;
        text-align: center;
    }

    .password-card:hover {
        transform: translateY(-5px);
    }

    .password-card h4 {
        font-weight: 700;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
    }

    .password-card form {
        text-align: left;
    }

    .password-card label {
        font-weight: 600;
        margin-top: 1rem;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .password-card .btn-submit,
    .password-card .btn-back {
        background-color: #fff !important;
        color: #224abe !important;
        font-weight: bold;
        border-radius: 25px;
        padding: 0.6rem 1.5rem;
        border: none;
        margin-top: 1rem;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-block;
    }

    .password-card .btn-submit:hover,
    .password-card .btn-back:hover {
        background-color: #f1f1f1 !important;
        transform: translateY(-2px);
    }

    .card-footer {
        background: #fff;
        color: #224abe;
        border-radius: 0 0 15px 15px;
        font-size: 0.85rem;
        font-weight: 500;
        padding: 0.75rem 0;
        text-align: center;
    }

    .input-container {
        position: relative;
    }

    .input-container input {
        width: 100%;
        padding: 0.6rem 2.5rem 0.6rem 0.6rem;
        border-radius: 10px;
        border: none;
        box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.1);
        outline: none;
    }

    .toggle-password {
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
        font-size: 1.2rem;
        color: #224abe;
    }

    .toggle-password:hover {
        color: #000;
    }
</style>

<!-- Lien vers Boxicons -->
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

<div class="content-body" style="min-height: 788px;">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Sécurité</a></li>
                <li class="breadcrumb-item active"><a href="#">Changer mot de passe</a></li>
            </ol>
        </div>

        <!-- row -->
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8">
                <div class="password-card">
                    <h4><i class='bx bxs-lock-alt'></i> Modifier le mot de passe</h4>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </div>
                    @endif

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('clientmdp') }}" method="POST">
                        @csrf

                        <label><i class='bx bx-lock'></i> Mot de passe actuel</label>
                        <div class="input-container">
                            <input type="password" name="current_password" id="current_password" required>
                            <i class='bx bx-show toggle-password' data-target="current_password"></i>
                        </div>

                        <label><i class='bx bx-lock-open'></i> Nouveau mot de passe</label>
                        <div class="input-container">
                            <input type="password" name="new_password" id="new_password" required>
                            <i class='bx bx-show toggle-password' data-target="new_password"></i>
                        </div>

                        <label><i class='bx bx-check-shield'></i> Confirmer le nouveau mot de passe</label>
                        <div class="input-container">
                            <input type="password" name="new_password_confirmation" id="new_password_confirmation" required>
                            <i class='bx bx-show toggle-password' data-target="new_password_confirmation"></i>
                        </div>

                        <div style="display: flex; justify-content: space-between; gap: 10px; margin-top: 1rem;">
                            <button type="submit" class="btn-submit" style="flex: 1;">
                                <i class='bx bx-refresh'></i> Mettre à jour
                            </button>

                            <a href="{{ route('dashboard-client') }}" class="btn-back" style="flex: 1; text-align: center;">
                                <i class='bx bx-arrow-back'></i> Annuler
                            </a>
                        </div>
                    </form>
                </div>

                <div class="card-footer">
                    © 2025 @Me. Tous droits réservés.
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.querySelectorAll('.toggle-password').forEach(icon => {
        icon.addEventListener('click', () => {
            const targetInput = document.getElementById(icon.dataset.target);
            const isPassword = targetInput.getAttribute('type') === 'password';
            targetInput.setAttribute('type', isPassword ? 'text' : 'password');
            icon.classList.toggle('bx-show');
            icon.classList.toggle('bx-hide');
        });
    });
</script>

@endsection
