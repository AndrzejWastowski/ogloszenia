
@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
   

    <div class="col-9">
        @foreach($contents as $content)      
        
        @php
            
            $date = explode("-", $content->date_add);
            $day = $date[2];
            $month = $date[1];
            $year = $date[0];

        @endphp


        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Start</a></li>
                <li class="breadcrumb-item"><a href="/nieruchomosci/">Nieruchomosci</a></li>
               
                <li class="breadcrumb-item"><a href="/nieruchomosci/{{ $content->EstatesCategories->link }}">{{ $content->EstatesCategories->name }}</a></li>
                
                
            </ol>
        </nav>  
        <div class="card m-1">
        <div class="card-body p-3" style="background-color: {{ $content->highlighted }};">  
            <div class="row mb-0 pb-0">
                <div class="col-xl-10"><h5 class="card-title"> <strong>{{ $content->name }} </strong></h5></div>
                <div class="col-xl-2 text-end"><small>nr ogł.<strong> N/{{ $content->id }}/{{ $year }}</strong></small></div>
            </div>
            <div class="card-text black-text">                
                <div class="row">
                    <div class="col-9">
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
                                        <div class="carousel-item {{ $active }} "><img class="d-block w-100 "  src="{{ $storage->url('public/estates/'.$photo->name.'_kw.jpg') }}" alt=" {{ $content->name }} " ></div>
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
                    </div>
            <!--/.Carousel Wrapper--> 
                    <!--/.Slides-->
                    <!--Grid column-->
                    <div class="col-3">
                       
                            <ul class="list-unstyled">
                                         
                                    <li class="text-end"><small><strong>{{  $content->date_start  }}</strong></small></li>            
                                    <li class="text-end"><small>dodał: <strong>{{  $content->User->name }} </strong></small></li>

                                    <li><h5 class="text-center">Cena <strong class="text-success">{{ $content->price }} </strong> pln</h5></li>

                                    <li class="text-end"><small>tel: <strong>{{  $content->contact_phone ?? 'nie podano' }} </strong></small></li>
                                    <li class="text-end"><small>mail: <strong>{{  $content->contact_email ?? 'nie podano'  }} </strong></small></li>   
                                    <li class="text-end"><small>powierzchnia: <strong>{{  $content->area }} </strong> {{  $content->unit }}</small></li>   
                                    

                            </ul>                        
                            


                      
                            
                                                    
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-12">
                        <label ><strong>Informacje podstawowe</strong></label>
                        <p class="lead"><strong>{{ $content->lead }}.</strong></p>  

                        <label ><strong>Opis rozszerzony</strong></label>
                        <p class="stopoverflow">{{ $content->description }}</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
    
        @endforeach
        </div>
        <div class="col-3">

        @include('addons.2col')  
        
        </div>
</div>
</div>
@endsection 


