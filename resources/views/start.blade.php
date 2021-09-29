
@extends('layouts.app')
@section('content') 
<main class="container">
    @include('start.tab_menu')
    @include('start.popular_category')            
    @include('start.4reklamy_gora')
    promocja
    @include('start.promo') 
    4 reklamy dół
    @include('start.4reklamy_dol')   
    slider ads
    @include('start.ads_slider')  
    slider moto
    @include('start.cars_slider')  
    slider estates
    @include('start.estates_slider')
</main>
@endsection


