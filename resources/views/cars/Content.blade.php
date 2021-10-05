
@extends('layouts.app')

@section('content')
<div class="container  mb-3">
<div class="row">
    <div class="col-md-9 mb-3">
        @foreach($contents as $content)  
        
        <nav class="card p-3 pb-0 mb-3 bg-white" aria-label="breadcrumb">
            <ol class="breadcrumb" >
                <li class="breadcrumb-item"> <a href="/">Start</a></li> 
                <li class="breadcrumb-item"> <a href="/motoryzacja/">Motoryzacja</a></li>  
                <li class="breadcrumb-item"> <a href="/motoryzacja/samochody_osobowe">Samochody osobowe</a></li> 
                <li class="breadcrumb-item"> <a href="{{ route('CarsListByBrandsId', ['brand'=> $content->CarsBrands->name, 'bid' => $content->CarsBrands->id]) }}"> {{ $content->CarsBrands->name }} </a></li>
                <li class="breadcrumb-item"><a href="{{ route('CarsListByModelsId', ['brand'=> $content->CarsBrands->name, 'bid' => $content->CarsBrands->id, 'model'=> $content->CarsModels->name, 'mid' => $content->CarsModels->id ]) }}"> {{ $content->CarsModels->name }} </a></li>
                <li class="breadcrumb-item active"> <a href="{{ route('CarsShortContentsById',['id'=>$content->id]) }}">{{ $content->name }} </a></li>
            </ol>
        </nav>


       
        <div class="card">
            <div class="card-body p-3" style="background-color: {{ $content->highlighted }};">          
            <h5 class="card-title"> <strong>{{ $content->name }} </strong></h5>        
            <div class="card-text black-text">                
                <div class="row">
                    <div class="col-md-9">
                        <div id="carousel_{{ $content->id }}" class="carousel slide" data-bs-ride="carousel">




                            <div class="carousel-inner">

                                @php
                                    $active = null;
                                    $count = 0;
                                    $HTML_PHOTO ='';
                                    $HTML_THUMBS ='';
                                @endphp

                                @foreach ($content->photos as $photo)
                                    @if ($active==null) @php($active = 'active') @else @php($active = ' ') @endif                            
                                        <div class="carousel-item {{ $active }} "><img class="d-block w-100 "  src="{{ $storage->url('public/cars/'.$photo->name.'_d.jpg') }}" alt=" {{ $content->name }} " ></div>
                                @endforeach    

                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carousel_{{ $content->id }}"  data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Poprzednie</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carousel_{{ $content->id }}"  data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Następne</span>
                            </button>
                        </div>



                        <div class="carousel-indicators" style=" position: static;">
                            {{ $HTML_THUMBS }}                       
                        </div>


                    </div>
                     <!--/.Carousel Wrapper--> 
                    <!--/.Slides-->
                    <!--Grid column-->
                    <div class="col-md-3">
                        <ul class="list-unstyled">
                                         
                            <li class="text-end"><small><strong>{{  $content->date_start  }}</strong></small></li>            
                            <li class="text-end"><small>od: <strong>{{  $content->User->name }} </strong></small></li>
                            <li><h5 class="text-end">Cena <strong class="text-success">{{ $content->price }} </strong> pln</h5></li>
                            <li class="text-end"><small>tel: <strong>{{  $content->contact_phone ?? 'nie podano' }} </strong></small></li>
                            <li class="text-end"><small>mail: <strong>{{  $content->contact_email ?? 'nie podano'  }} </strong></small></li>                               
                        </ul>                        
                    </div>
                </div>
                <div class="row mt-2">                    
                    <label ><strong>Informacje podstawowe</strong></label>
                    <p class="lead"><strong>{{ $content->lead }}.</strong></p>   
                    <label ><strong>Informacje szczegółowe</strong></label>
                    <p class="stopoverflow">{{ $content->description }}</p>                    
                </div>
            </div>

        </div>
    </div>
    
        @endforeach
        </div>
        <div class="col-md-3">

        @include('addons.2col')  
        
        </div>
</div>
</div>
@endsection 


