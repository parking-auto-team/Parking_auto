
    <div class="deznav">
        <div class="deznav-scroll">

            <ul class="metismenu" id="menu" style="position: fixed;">
                <li><a class="has-arrow ai-icon" href="{{ route('dashboard-admin') }}" aria-expanded="false">
                    <i class="flaticon-381-networking"></i>
                        <span class="nav-text">Dashboard admin</span>
                    </a>
                </li>
                <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-database"></i>
                        <span class="nav-text">Gestions</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{ route('tablegerant') }}">
                            <i class="flaticon-381-user-8"></i>
                            <span>Gerant </span>
                            </a>
                        </li>
                        <li><a href="{{ route('tableclient') }}">
                            <i class="flaticon-381-id-card-4"></i>
                            <span>Client</span> 
                            </a>
                        </li>
                    </ul>
                </li>
               

                <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-home-2"></i>
                        <span class="nav-text">Parking</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{ route('liste') }}">
                            <i class="flaticon-381-notepad-2"></i>
                            <span>Liste emplacement</span>
                            </a>
                        </li>
                        <li><a href="{{ route('ajouterplace') }}">
                            <i class="flaticon-381-add-3"></i>
                            <span>Ajouter place</span>
                            </a>
                        </li>
                         <li><a href="{{ route('Attribuer') }}">
                            <i class="flaticon-381-add-2"></i>
                            <span>Attribution de place</span>
                            </a>
                        </li>

                    </ul>

                </li>
                <li style="margin-top: 210px"><a class="has-arrow ai-icon" href="{{ route('logout') }}" aria-expanded="false">
                    <i class="flaticon-381-turn-off"></i>
                        <span class="nav-text">Déconnexion</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
