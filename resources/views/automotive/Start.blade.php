
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


