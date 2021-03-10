
@extends('layouts.app')

@section('content')
<div class="container">

        @foreach($contents as $content)
  
        {{$content->SmallAdsCategories->name}} / {{$content->SmallAdsSubCategories->name}}
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">{{ $content->SmallAdsCategories->name }}</li>
            <li class="breadcrumb-item ">{{ $content->SmallAdsSubCategories->name }}</li>
            <li class="breadcrumb-item active">{{ $content->name }}</li>                   
        </ol>
    </nav>  
    <div class="card m-1">

        <div class="card-body p-3" style="background-color: {{ $content->highlighted }};">  
            <div class="row mb-0 pb-0">
                <div class="col-xl-8"><h5 class="card-title"> <strong>{{ $content->name }} </strong></h5></div> 
                <div class="col-xl-4 text-right">
                    <ul class="list-unstyled">
                            <li><small>nr ogł.<strong> D/{{ $content->id }}</strong></small></li>            
                            <li><small>dodano: <strong>{{  $content->date_start  }}</strong></small></li>            
                            <li><small>autor: <strong>{{  $content->User->name }} </strong></small></li>            
                    </ul>          
                </div>
            </div>
            <div class="card-text black-text">                
                <div class="row">
                    <div class="col-3">
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
                                        <div class="carousel-item {{ $active }} "><img class="d-block w-100 "  src="{{ $storage->url('public/small_ads/'.$photo->name.'_kw.jpg') }}" alt=" {{ $content->name }} " ></div>
                                @endforeach    

                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carousel_{{ $content->id }}"  data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carousel_{{ $content->id }}"  data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
               <!--/.Carousel Wrapper--> 

                    <!--/.Slides-->
                    <!--Grid column-->
                    <div class="col-9">
                            <!--Excerpt-->                        
                            <h4 class="text-right">Cena: <strong>{{ $content->price }} </strong> pln</h4>
                            <p class="lead"><strong>{{ $content->lead }}.</strong></p>                            
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-12">
                        <label ><strong>OPIS</strong></label>
                        <p class="stopoverflow">{{ $content->description }}</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
    
        @endforeach
        </div>
@endsection 


