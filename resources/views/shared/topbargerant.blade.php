<style>
    .header-profile:hover .dropdown-menu {
        display: block !important;
        margin-top: 10px;
    }

    .dropdown-menu.profile-dropdown {
        padding: 15px;
        width: 280px;
        border-radius: 10px;
        background: #fff;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        transition: all 0.3s ease;
    }

    .profile-details {
        display: flex;
        gap: 15px;
        align-items: center;
        margin-bottom: 15px;
        padding-left: 20px;
    }

    .profile-details img {
        border-radius: 0px !important;
        width: 80px !important;
        height: 80px !important;
        object-fit: cover;
        box-shadow: 0 4px 8px rgba(0,0,0,0.2);
    }

    .profile-details-info {
        text-align: left;
        flex: 1;
        padding-left: 20px;
    }

    .profile-details-info h5,
    .profile-details-info p {
        margin: 0;
        color: #333;
    }

    .profile-details-info p {
        font-size: 13px;
        color: #666;
    }

    .dropdown-menu .logout-btn {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 8px;
        background-color: #224abe;
        color: white;
        font-weight: bold;
        margin-top: 8px;
        text-decoration: none;
        border-radius: 8px;
        padding: 10px;
        transition: 0.3s;
    }

    .dropdown-menu .logout-btn:hover {
        background-color: transparent;
        color: #224abe;
    }
</style>

<div class="header" style="background: linear-gradient(135deg, #fff, #224abe); box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); border-radius: 0 0 10px 10px;">
    <div class="header-content">
        <nav class="navbar navbar-expand">
            <div class="collapse navbar-collapse justify-content-between">
                <div class="header-left">
                    <div class="dashboard_bar text-white font-weight-bold">
                        Dashboard
                    </div>
                </div>
                <ul class="navbar-nav header-right">
                    <li class="nav-item dropdown header-profile">
                        <a class="nav-link text-white" href="javascript:void(0)" role="button" style="display: flex; align-items: center;">
                            <img src="{{ asset('images/profile/17.jpg') }}" width="35" height="35" alt="profil" class="rounded-circle mr-2" />
                            <div class="header-info">
                                <span class="text-white font-weight-bold">
                                    {{ Auth::guard('gerant')->user()->name }} {{ Auth::guard('gerant')->user()->lastname }}
                                </span>
                                <p class="fs-12 mb-0 text-white">{{ Auth::guard('gerant')->user()->email }}</p>
                                <p class="fs-12 mb-0 text-white"><strong>Gérant</strong></p>
                            </div>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right profile-dropdown">
                            <div class="profile-details">
                                <img src="{{ asset('images/profile/17.jpg') }}" alt="profil gérant">
                                <div class="profile-details-info">
                                    <h5>{{ Auth::guard('gerant')->user()->name }} {{ Auth::guard('gerant')->user()->lastname }}</h5>
                                    <p><i class='bx bx-envelope'></i> {{ Auth::guard('gerant')->user()->email }}</p>
                                    <p><i class='bx bx-map'></i> {{ Auth::guard('gerant')->user()->address }}</p>
                                </div>
                            </div>

                            <a class="logout-btn" href="{{ route('logout') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                                    <polyline points="16 17 21 12 16 7"></polyline>
                                    <line x1="21" y1="12" x2="9" y2="12"></line>
                                </svg>
                                Déconnexion
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
