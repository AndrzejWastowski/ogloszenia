@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
    <div class="col-md-3">
        @include('user.sidebar')
    </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Tablica') }}</div>

                <div class="card-body">
                    
    <div class="row justify-content-center">
        <div class="col-md-12">
                <h1>Ogłoszenia - wybierz rodzaj ogłoszenia</h1>

                <ul class="stepper stepper-horizontal">
                    <li  class="active">
                        <a class="p-2 m-1" href="/dodaj">
                            <span class="circle">1</span> 
                                Rodzaj 
                        </a>
                    </li>
                    <li>
                        <a class="p-2 m-1" href="#">
                            <span class="circle">2</span> 
                            Treść
                        </a>
                    </li>
                    <li>
                        <a class="p-2 m-1" href="#">
                            <span class="circle">3</span> 
                                Zdjęcia
                        </a>
                    </li>
                    <li>                        
                        <a class="p-2 m-1" href="#">
                            <span class="circle">4</span> 
                                Promowanie
                        </a>
                    </li>
                    <li>                        
                        <a class="p-2 m-1" href="#">
                            <span class="circle">5</span>
                            Podsumowanie
                        </a>
                    </li>
                </ul>
                <ul>
                    <li><a href="{{ route('home/add/small') }}">Ogłoszenia drobne</a></li>
                    <li><a href="{{ route('home/add/small') }}">Usługi</a></li>
                    <li><a href="{{ route('home/add/estates') }}">Nieruchomości</a></li>
                    <li><a href="{{ route('home/add/automotive') }}">Motoryzacja</a></li>
                    <li><a href="{{ route('home/add/jobs') }}">Praca</a></li>
                    <li><a href="{{ route('home/add/small') }}">Towarzyskie</a></li>
                    <li><a href="{{ route('home/add/small') }}">Zgubione/znalezione</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
