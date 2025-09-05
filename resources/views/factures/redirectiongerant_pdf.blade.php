@extends('base.gerant')

@section('gerant-content')
<head>
    <meta charset="UTF-8">
    <title>Téléchargement en cours</title>
    <style>

        .loader {
            border: 6px solid #f3f3f3;
            border-top: 6px solid #3498db;
            border-radius: 50%;
            width: 60px;
            height: 60px;
            animation: spin 1s linear infinite;
            margin: 30px auto;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .message {
            text-align: center;
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
            color: #3498db;
            margin-top: 20px;
            animation: fadeIn 1s ease-in-out infinite alternate;
        }

        @keyframes fadeIn {
            from { opacity: 0.7; }
            to { opacity: 1; }
        }
    </style>
</head>
<div class="content-body" style="min-height: 788px; text-align: center;">
    <div class="loader"></div>
    <div class="message">Téléchargement en cours... Vous allez être redirigé automatiquement.</div>
</div>
    <script>
        window.onload = function() {
            const link = document.createElement('a');
            link.href = '{{ asset("storage/" . $fileName) }}';
            link.download = '{{ $fileName }}';
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);

            setTimeout(function() {
                window.location.href = "{{ $redirectRoute }}";
            }, 5000);
        };
    </script>

@endsection
