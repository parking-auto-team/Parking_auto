@extends('base.admin')

@section('admin-content')
    <style>
        .table thead th {
            background: linear-gradient(135deg, #4e73df, #224abe);
            color: #fff;
            text-align: center;
        }
        .table tbody td {
            vertical-align: middle;
            text-align: center;
        }
        .btn-xs {
            border-radius: 8px;
            transition: all 0.3s;
        }
        .btn-xs:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
        }
        .badge {
            padding: 5px 12px;
            border-radius: 12px;
            font-weight: 600;
        }
        .badge.btn-success {
            background: linear-gradient(135deg, #28a745, #218838);
        }
        .badge.btn-warning {
            background: linear-gradient(135deg, #f6c23e, #e0a800);
        }
        .card-title {
            font-weight: 700;
        }
    </style>

    <div class="content-body" style="min-height: 788px;">
        <div class="container-fluid">
            <div class="page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Parking</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Emplacements</a></li>
                </ol>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card shadow">
                        <div class="card-header">
                            <h4 class="card-title">Liste des emplacements</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example4" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Numéro</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                            <th>Montant</th>
                                            <th>Marque</th>
                                            <th>Type</th>
                                            <th>Matricule</th>
                                            <th>Temps de stationnement</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($emplacements as $emplacement)
                                            <tr>
                                                <td>{{ $emplacement->number }}</td>

                                                <td>
                                                    @if ($emplacement->status)
                                                        <label class="badge btn-success">Activé</label>
                                                    @else
                                                        <label class="badge btn-warning">Libre</label>
                                                    @endif
                                                </td>

                                                <td>
                                                    @if ($emplacement->status)
                                                        <button 
                                                            class="btn btn-warning shadow btn-xs liberer-btn" 
                                                            data-id="{{ $emplacement->id }}" 
                                                            title="Libérer">
                                                            <i class="fa fa-power-off"></i>
                                                        </button>
                                                    @else
                                                        <a href="{{ route('deleteplace', ['id' => $emplacement->id]) }}"
                                                           class="btn btn-danger shadow btn-xs" title="Supprimer"
                                                           onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet emplacement ?');">
                                                           <i class="fa fa-trash"></i>
                                                        </a>
                                                    @endif
                                                </td>

                                                @php
                                                    $vehicule = $emplacement->vehicule;
                                                    $abonnement = optional($vehicule)->abonnement;
                                                    $dateDebut = $abonnement?->created_at;
                                                    $dureeMinutes = $abonnement?->duree;
                                                    $dateFin = $dateDebut ? $dateDebut->copy()->addMinutes($dureeMinutes) : null;
                                                @endphp

                                                <td><strong>{{ $abonnement?->montant ?? '-' }}</strong></td>
                                                <td>{{ optional($vehicule?->marque)->name ?? '-' }}</td>
                                                <td>{{ optional($vehicule?->type)->name ?? '-' }}</td>
                                                <td>{{ $vehicule?->matricule ?? '-' }}</td>

                                                <td>
                                                    @if ($dateFin)
                                                        <span class="countdown" data-end="{{ $dateFin->format('Y-m-d H:i:s') }}"></span>
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const countdowns = document.querySelectorAll('.countdown');
        countdowns.forEach(function(el) {
            const endTime = new Date(el.dataset.end).getTime();
            function updateCountdown() {
                const now = new Date().getTime();
                const distance = endTime - now;
                if (distance <= 0) {
                    el.innerHTML = "Expiré";
                    return;
                }
                const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((distance % (1000 * 60)) / 1000);
                el.innerHTML = `${days}j ${hours}h ${minutes}m ${seconds}s`;
            }
            updateCountdown();
            setInterval(updateCountdown, 1000);
        });

        $('.liberer-btn').click(function() {
            var id = $(this).data('id');
            if (confirm('Êtes-vous sûr de vouloir libérer cet emplacement ?')) {
                $.ajax({
                    url: '/liberer-emplacement/' + id,
                    type: 'GET',
                    success: function(response) {
                        if (response.success) {
                            alert(response.message);
                            location.reload();
                        }
                    },
                    error: function() {
                        alert('Erreur lors de la libération. Veuillez réessayer.');
                    }
                });
            }
        });
    });
    </script>
@endsection
