
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

                <div class="row">Samochody Osobowe</div>
                <div class="row">Motocykle / skutery / quady</div>
                <div class="row">Busy / autobusy</div>
                <div class="row">Samochody dostawcze i ciężarowe</div>
                <div class="row">Pojazdy rolnicze</div>
                <div class="row">Pozostałe</div>
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


