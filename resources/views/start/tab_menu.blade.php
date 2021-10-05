<div class="container mb-3">
	<nav>
		<div class="nav nav-tabs" id="nav-tab" role="tablist">
			<button class="nav-link active  id="nav-smal-ads" data-bs-toggle="tab" data-bs-target="#nav-small-ads" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Ogłoszenia Drobne</button>
			<button class="nav-link" id="nav-estates-tab" data-bs-toggle="tab" data-bs-target="#nav-estates" type="button" role="tab" aria-controls="nav-estates" aria-selected="false">Nieruchomości</button>
			<button class="nav-link" id="nav-services-tab" data-bs-toggle="tab" data-bs-target="#nav-services" type="button" role="tab" aria-controls="nav-services" aria-selected="false">Usługi</button>
			<button class="nav-link" id="nav-job-tab" data-bs-toggle="tab" data-bs-target="#nav-job" type="button" role="tab" aria-controls="nav-job" aria-selected="false">Praca</button>
			<button class="nav-link" id="nav-automoto-tab" data-bs-toggle="tab" data-bs-target="#nav-automoto" type="button" role="tab" aria-controls="nav-automoto" aria-selected="false">Motoryzacja</button>
			<button class="nav-link" id="nav-agro-tab" data-bs-toggle="tab" data-bs-target="#nav-agro" type="button" role="tab" aria-controls="nav-agro" aria-selected="false">Rolnictwo</button>
		</div>
	</nav>
	<div class="tab-content" id="nav-tabContent">
		<div class="tab-pane fade show active " id="nav-small-ads" role="tabpanel" aria-labelledby="nav-smal-ads">
			<div class="card">
				<div class="card-body ">Ołoszenia drobne - kategorie</div>
			</div>
		</div>
		<div class="tab-pane fade" id="nav-estates" role="tabpanel" aria-labelledby="nav-estates-tab">  
			<div class="card">
				<div class="card-body">Nieruchomości - kategorie</div>
			</div>
		</div>
		<div class="tab-pane fade" id="nav-services" role="tabpanel" aria-labelledby="nav-services-tab">
			<div class="card">
				<div class="card-body">Usługi budowlane , ksiegowe itd... tu będą najczęściej używane kategorie</div>
			</div>
		</div>
		<div class="tab-pane fade" id="nav-job" role="tabpanel" aria-labelledby="nav-job-tab">
			<div class="card">
				<div class="card-body">Praca - kategorie</div>
			</div>
		</div>
		<div class="tab-pane fade" id="nav-automoto" role="tabpanel" aria-labelledby="nav-automoto-tab">
			<div class="card">
				<div class="card-body">Motoryzacja 
					<div class="row">
						<div class="col-lg-2" class="text-center">
							<a href="{{ route("CarsStart") }}" title=""><img class="img-fluid" src="{{ $storage->url('icons/osobowe.png') }}" alt=""></a>
							<a href="{{ route("CarsStart") }}">Samochody osobowe</a>
						</div>
						<div class="col-lg-2" class="text-center">
							<a href="{{ route("MotorcyclesStart") }}" title=""><img class="img-fluid" src="{{ $storage->url('icons/motocykl.png') }}" alt=""></a>
							<a href="{{ route("MotorcyclesStart") }}">Motocykle / skutery / quady</a>
						</div>
						<div class="col-md-2" class="text-center">
							<a href="{{ route("BusStart") }}" title=""><img class="img-fluid" src="{{ $storage->url('icons/autobus.png') }}" alt=""></a>
							<a href="{{ route("BusStart") }}">Busy / autobusy</a>
						</div>
						<div class="col-lg-2" class="text-center">
							<a href="{{ route("TruckStart") }}" title=""><img class="img-fluid" src="{{ $storage->url('icons/transport.png') }}" alt=""></a>
							<a href="{{ route("TruckStart") }}">Samochody dostawcze i ciężarowe</a>
						</div>
						<div class="col-lg-2" class="text-center">
							<a href="{{ route("AgriculturalVehiclesStart") }}" title=""><img class="img-fluid" src="{{ $storage->url('icons/rolnicze.png') }}" alt=""></a>
							<a href="{{ route("AgriculturalVehiclesStart") }}">Pojazdy rolnicze</a>
						</div>
						<div class="col-lg-2" class="text-center">
							<a href="{{ route("ConstructionVehiclesStart") }}" title=""><img class="img-fluid" src="{{ $storage->url('icons/budowa.png') }}" alt=""></a>
							<a class="text-center" href="{{ route("ConstructionVehiclesStart") }}">Budowlane</a>                        
						</div>
						
					</div>
				   
				</div>
			</div>
		</div>
			<div class="tab-pane fade" id="nav-agro" role="tabpanel" aria-labelledby="nav-agro-tab">
				<div class="card">
					<div class="card-body">
						Rolnictwo
						<ul>
							<li>Ciągniki / kombajny</li>
							<li>Przyczepy i naczepy</li>
							<li>Skup / sprzedaż zwierząt</li>
							<li>Skup / sprzedaż roślin</li>
						</div>
				</div>
			</div>
		</div>  
	</div>
</div>



