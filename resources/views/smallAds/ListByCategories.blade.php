
@extends('layouts.app')

@section('content')


<div class="container">
<div class="row">
    <div class="col-3">
        <div class="accordion" id="menu_boczne">
            <div class="accordion-item">
                <h2 class="accordion-header" id="naglowek_{{ $category->id }}">
                    <button class="accordion-button " type="button" data-bs-toggle="collapse" data-bs-target="#kategoria_{{ $category->id }}" aria-expanded="true" aria-controls="kategoria_{{ $category->id }}">
                        {{ $category->name }}
                    </button>
                </h2>

                <div id="kategoria_{{ $category->id }}" class="accordion-collapse  " aria-labelledby="naglowek_{{ $category->id }}" data-bs-parent="#menu_boczne">
                    <div class="accordion-body">
                        <ul class="">
                            @foreach($subcategories as $subcategory)
                                @if ($subcategory->small_ads_categories_id ==$category->id) 
                                        
                                            <li class="mb-2"><a href="/drobne/{{ $category->link }}/{{ $subcategory->link }}">{{ $subcategory->name }}</a></li>
                                        
                                @endif  
                            @endforeach    
                        </ul>    
                    </div>
                </div>
            </div>
        

    </div>
    </div>


    <div class="col-7">
   
        <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"> <a href="/">Start</a></li> 
                    <li class="breadcrumb-item"> <a href="/drobne/">Drobne</a></li>  
                    <li class="breadcrumb-item"> <a href="/drobne/{{$category->link}}">{{$category->name}}</a></li>                    
                </ol>
            </nav> 
         
        @foreach($contents as $content)

            
    <div class="card m-1">

        <div class="card-body pt-1" style="background-color: {{ $content->highlighted }};">  
            
        <div class="col-xl-12 pt-0 ">                 
            <p class="text-end mb-0"> <small class="text-muted">{{  $content->date_start  }}</small></p>            
        </div>
        <div class="col-xl-12"><h5 class="card-title"> <strong><a href="{{ route('SmallAdsContentsById', ['category'=> $content->SmallAdsCategories->link,'subcategory'=> $content->SmallAdsSubCategories->link,'id' => $content->id ]) }}">{{ $content->name }} </a></strong></h5></div> 
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
                <div class="row">  
                    <div class="col-9 mb-3">
                    </div>
                    <div class="mb-3">
                        <div class="offset-lg-9 offset-sm-4">
                            <form action="{{ route('SmallAdsContentsById', ['category'=> $content->SmallAdsCategories->link,'subcategory'=> $content->SmallAdsSubCategories->link,'id' => $content->id ]) }}" method="get" enctype="text/plain"><div>
                            
                                <button type="submit" class="btn btn-primary">
                                    {{ __('więcej informacji') }}
                            </button>
                            </form>
                        </div>
                    </div>
            </div>
            </div>
            </div>
        </div>
    </div>

        @endforeach
    <div class="row mt-2">
        {{ $contents->links() }}
    </div>



       
        </div>
        <div class="col-2">

        @include('addons.2col')  
        
        </div>
</div>
</div>
@endsection 


