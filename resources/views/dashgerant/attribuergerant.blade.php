@extends('base.gerant')

@section('gerant-content')

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
</head>
<style>
    .card {
        border-radius: 20px;
        background: linear-gradient(135deg, #fff, #224abe);
        color: #fff;
        box-shadow: 0 8px 20px rgba(78, 115, 223, 0.3);
        transition: all 0.3s ease;
    }
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 25px rgba(78, 115, 223, 0.5);
    }
    .card-header h4 {
        font-weight: 700;
        letter-spacing: 1px;
    }
    label, h6 {
        font-weight: 600;
        color: #fff;
    }
    .form-control {
        border-radius: 15px;
        padding: 10px 15px;
        border: none;
        background-color: rgba(255, 255, 255, 0.1);
        color: #999;
    }
    .form-control:hover::placeholder {
        color: black;
    }
    .form-control::placeholder {
        color: #999;
    }
    .form-control:hover {
        background-color: white;
        color: black;
    }
    .form-control:focus {
        background-color: rgba(255, 255, 255, 0.2);
        color: #fff;
    }
    option.form{
        color: black;
    }
    .btn-primary {
        border-radius: 25px;
        background-color: #fff;
        color: #4e73df;
        font-weight: bold;
        transition: all 0.3s ease;
        border: none;
    }
    .btn-primary:hover {
        background-color: #f0f0f0;
        color: #224abe;
    }
    .alert-success, .alert-danger {
        border-radius: 10px;
        font-weight: 600;
        padding: 10px 15px;
        margin-bottom: 15px;
    }
</style>

<div class="content-body" style="min-height: 788px;">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Formulaire</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Attribuer un emplacement</a></li>
            </ol>
        </div>
        <div class="row">
            <div class="col-xl-6 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Attribuer une place</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">

                            @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif

                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            @error('client_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror

                            <form id="attribuer-form" action="{{ route('Attribuergerant') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <h6>Client</h6>
                                    <select name="client_id" class="form-control" id="client-select" required>
                                        @foreach($clients as $client)
                                            <option class="form" value="{{ $client->id }}">{{ $client->name }} {{ $client->lastname }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <h6>Véhicule</h6>
                                    <select name="vehicule_id" class="form-control" id="vehicule-select" required>
                                        <option value="">Sélectionnez un véhicule</option>
                                        @foreach($vehicules as $vehicule)
                                            <option class="form" value="{{ $vehicule->id }}" data-client="{{ $vehicule->client_id }}">
                                                {{ $vehicule->license_plate ?? $vehicule->marque->name }} - {{ $vehicule->matricule }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <h6>Durée de stationnement :</h6>
                                    <div class="d-flex" style="gap: 20px;">
                                        <input name="start_at" type="text" id="start_at" class="form-control" required style="flex: 1;"
                                               value="{{ \Carbon\Carbon::now()->format('Y-m-d H:i') }}">
                                        <input name="end_at" type="text" id="end_at" class="form-control" required style="flex: 1;"
                                               value="{{ \Carbon\Carbon::now()->addHour()->format('Y-m-d H:i') }}">
                                    </div>
                                    <div id="date-error"></div>
                                </div>

                                <div class="form-group">
                                    <h6>Emplacement</h6>
                                    <select name="emplacement_id" class="form-control" required>
                                        <option value="">--- Sélectionnez un emplacement ---</option>
                                        @foreach($emplacements as $emplacement)
                                            <option class="form" value="{{ $emplacement->id }}">Place {{ $emplacement->number }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group" style="max-width: 150px;">
                                    <h6>Montant</h6>
                                    <input type="text" class="form-control" name="montant" placeholder="Entrer le montant" required>
                                </div>

                                <button type="submit" class="btn btn-primary">Attribuer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    var clientSelect = document.getElementById('client-select');
    var vehiculeSelect = document.getElementById('vehicule-select');

    function filterVehicules() {
        var clientId = clientSelect.value;
        Array.from(vehiculeSelect.options).forEach(function(option) {
            if (option.value === "") {
                option.hidden = false;
                return;
            }
            if (option.getAttribute('data-client') === clientId) {
                option.hidden = false;
            } else {
                option.hidden = true;
            }
        });
        vehiculeSelect.value = "";
    }

    clientSelect.addEventListener('change', filterVehicules);
    filterVehicules();

    const now = new Date();
    const endTime = new Date();
    endTime.setHours(endTime.getHours() + 1);

    flatpickr("#start_at", {
        enableTime: true,
        dateFormat: "Y-m-d H:i",
        defaultDate: now,
        time_24hr: true,
    });

    flatpickr("#end_at", {
        enableTime: true,
        dateFormat: "Y-m-d H:i",
        defaultDate: endTime,
        time_24hr: true,
    });

    const form = document.getElementById('attribuer-form');
    const startInput = document.getElementById('start_at');
    const endInput = document.getElementById('end_at');
    const errorDiv = document.getElementById('date-error');

    form.addEventListener('submit', function(e) {
        const startDate = new Date(startInput.value);
        const endDate = new Date(endInput.value);

        errorDiv.innerText = '';

        if (endDate <= startDate) {
            e.preventDefault();
            errorDiv.innerText = "La date et l'heure de fin doivent être supérieures à celles de début.";
            errorDiv.style.color = 'red';
            errorDiv.style.fontWeight = 'bold';
        }
    });
});
</script>

@endsection
