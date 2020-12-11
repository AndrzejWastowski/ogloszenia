<div class="wrapper">
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3>Strefa użytkownika</h3>
        </div>
        <p>strefa w której możesz zarządzać swoimi ogloszeniami</p>
        <ul class="list-unstyled components">
      
            <li class="active">
                <a href="{{ route('select') }}">Dodaj ogłoszenie</a>
            </li>

            
            <li class="active">
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Twoje Ogłoszenia</a>
                <ul class="collapse list-unstyled" id="homeSubmenu">
                    <li>
                        <a href="{{ route('home/list/small') }}">Ogłoszenia drobne</a>
                    </li>
                    <li>
                        <a href="{{ route('home/list/estates') }}">Nieruchomości</a>
                    </li>
                    <li>
                        <a href="{{ route('home/list/automotive') }}">Motoryzacja</a>
                    </li>
                </ul>
            </li>
            
            <li>
                <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Płatności</a>
                <ul class="collapse list-unstyled" id="pageSubmenu">
                    <li>
                        <a href="/home/stan_konta">Stan konta</a>
                    </li>
                    <li>
                        <a href="#">Promuj ogłoszenia</a>
                    </li>
                    <li>
                        <a href="#">Pozostałe</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">Pomoc</a>
            </li>
        </ul>
    </nav>
</div>
