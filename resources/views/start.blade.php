
@extends('layouts.app')
@section('content') 
<main class="container">
    @include('start.tab_menu')
    @include('start.popular_category')            
    @include('start.4reklamy_gora')
    @include('start.promo')

    <hr><br><hr><hr><hr><hr><hr><hr><hr><hr>
    @include('start.4reklamy_dol')
    @include('start.ads_slider')
    @include('start.estates_slider')
</main>
@endsection


