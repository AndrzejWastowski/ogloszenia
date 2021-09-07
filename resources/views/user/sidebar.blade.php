
<div class="wrapper">
    <nav id="sidebar">
    <div class="sidebar-header">
            <h3>Strefa użytkownika</h3>
            <p>Dodawaj i modyfikuj ogłoszenia</p>
    </div>

    <div class="accordion" id="accordionDashboard">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Dodaj Ogłoszenie
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionDashboard">
                <div class="accordion-body">
                    <ul class="list-unstyled" id="AddSubmenu">
                        <li><a href="{{ route('small_ads_content') }}">Ogłoszenia drobne</a></li>
                        <li><a href="{{ route('estates_content') }}">Nieruchomości</a></li>
                        <li><a href="{{ route('services_content') }}">Usługi</a></li>                
                        <li><a href="{{ route('automotive_type') }}">Motoryzacja</a></li>
                        <li><a href="{{ route('home/add/jobs') }}">Praca</a></li>
                        
                        
                    </ul>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                Twoje Ogłoszenia
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionDashboard">
                <div class="accordion-body">
                    <ul class="list-unstyled" id="homeSubmenu">
                        <li><a href="{{ route('home/lists/small') }}">Ogłoszenia drobne</a></li>
                        <li><a href="{{ route('home/lists/estates') }}">Nieruchomości</a></li>
                        <li><a href="{{ route('home/lists/cars') }}">Motoryzacja</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Płatności
                </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionDashboard">
                <div class="accordion-body">
                    <ul class="list-unstyled" id="pageSubmenu">
                        <li><a href="/home/stan_konta">Stan konta</a></li>
                        <li><a href="#">Promuj ogłoszenia</a></li>
                        <li><a href="#">Pozostałe</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingFour">
                <button class="accordion-button " type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
                        Dodatki
                </button>
            </h2>
            <div id="collapseFour" class="accordion-collapse " aria-labelledby="headingThree" data-bs-parent="#accordionDashboard">
                <div class="accordion-body">
                    <a href="#">Pomoc</a>
                </div>
            </div>
        </div>
    </div>
    </nav>
</div>

