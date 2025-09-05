
<div class="header" style="background: linear-gradient(135deg, #fff, #224abe); box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); border-radius: 0 0 10px 10px;">

    <div class="header-content">
        <nav class="navbar navbar-expand">
            <div class="collapse navbar-collapse justify-content-between">
                <div class="header-left">
                    <div class="dashboard_bar">
                        Dashboard
                    </div>
                </div>
                <ul class="navbar-nav header-right">
                   
                    <li class="nav-item dropdown header-profile">
                         <a class="nav-link" href="javascript:void(0)" role="button" data-toggle="dropdown" style="display: flex; align-items: center;">
                            <img src="{{ asset('images/profile/17.jpg') }}" width="20" alt=""/>
                            <div class="header-info">
                                <span class="text-white font-weight-bold">Admin</span>
                                <p class="fs-12 mb-0 text-white"><strong>Administrateur</strong></p>
                                
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            
                            <a class="nav-link" href="{{ route('logout') }}" aria-expanded="false">
                                <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                <span class="ml-2">Deconnexion </span>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
