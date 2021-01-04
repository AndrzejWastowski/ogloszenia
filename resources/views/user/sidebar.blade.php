<div class="wrapper">
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3>Strefa użytkownika</h3>
        </div>
        <p>strefa w której możesz zarządzać swoimi ogloszeniami</p>
        <ul class="list-unstyled components">
      
            <li class="active">
            <a href="#AddSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Dodaj Ogłoszenie</a>
            </li>

            

            <ul class="collapse list-unstyled" id="AddSubmenu">
                    <li><a href="{{ route('small_ads_content') }}">Ogłoszenia drobne</a></li>
                    <li><a href="{{ route('small_ads_content') }}">Usługi</a></li>
                    <li><a href="{{ route('home/add/estates') }}">Nieruchomości</a></li>
                    <li><a href="{{ route('home/add/automotive') }}">Motoryzacja</a></li>
                    <li><a href="{{ route('home/add/jobs') }}">Praca</a></li>
                    <li><a href="{{ route('small_ads_content') }}">Towarzyskie</a></li>
                    <li><a href="{{ route('small_ads_content') }}">Zgubione/znalezione</a></li>
                </ul>


            <li class="active">
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Twoje Ogłoszenia</a>
                <ul class="collapse list-unstyled" id="homeSubmenu">
                    <li>
                        <a href="{{ route('home/lists/small') }}">Ogłoszenia drobne</a>
                    </li>
                    <li>
                        <a href="{{ route('home/lists/estates') }}">Nieruchomości</a>
                    </li>
                    <li>
                        <a href="{{ route('home/lists/automotive') }}">Motoryzacja</a>
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
