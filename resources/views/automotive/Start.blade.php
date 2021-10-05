
@extends('layouts.app')

@section('content')


<div class="container">
    <nav class="card p-3 pb-0 mb-3 bg-white" aria-label="breadcrumb">
        <ol class="breadcrumb" >
            <li class="breadcrumb-item"> <a href="/">Start</a></li> 
            <li class="breadcrumb-item"> <a href="/motoryzacja/">Motoryzacja</a></li>              
        </ol>
    </nav> 

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
   
    <div class="row">
        <div class="col-3">
            <div class="accordion  bg-white" id="menu_boczne">
                <div class="accordion-item">
                    
                        <button class="list-group-item list-group-item-action active" type="button"  >
                            KATEGORIA
                        </button>
                        
                </div> 
              

                <div class="row p-3"><a href="{{ route("CarsStart") }}">Samochody Osobowe</a></div>
                <div class="row p-3"><a href="{{ route("MotorcyclesStart") }}">Motocykle / skutery / quady</a></div>
                <div class="row p-3"><a href="{{ route("BusStart") }}">Busy / autobusy</a></div>
                <div class="row p-3"><a href="{{ route("TruckStart") }}">Samochody dostawcze i ciężarowe</a></div>
                <div class="row p-3"><a href="{{ route("AgriculturalVehiclesStart") }}">Pojazdy rolnicze</a></div>
                <div class="row p-3"><a href="{{ route("AnotherStart") }}/">Pozostałe</a></div>
            </div>
        </div>

    <div class="col-7 p-0">

  

    
       
        </div>
        <div class="col-2">

        @include('addons.2col')  
        
        </div>
</div>
</div>
@endsection 


