
@extends('layouts.app')
@section('content') 
<main class="container">
    @include('start.tab_menu')
    @include('start.popular_category')            
    @include('start.4reklamy_gora')    
    @include('start.ads_slider')      
    @include('start.cars_slider') 
    @include('start.estates_slider')    
    @include('start.4reklamy_dol')   
    
</main>
@endsection


