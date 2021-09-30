
@extends('layouts.app')

@section('content')
<div class="container">
    <nav class="card p-3 pb-0 mb-3 bg-white" aria-label="breadcrumb">
        <ol class="breadcrumb" >
            <li class="breadcrumb-item"> <a href="/">Start</a></li> 
            <li class="breadcrumb-item"> <a href="/drobne/">Drobne</a></li>  
            <li class="breadcrumb-item"> <a href="/drobne/{{ $category->link }}">{{ $category->name }} </a></li>  
        </ol>
    </nav> 
    <div class="row">
        <div class="col-md-3">
            <div class="accordion bg-white" id="menu_boczne">
                <div class="accordion-item">                    
                    <button class="list-group-item list-group-item-action active" type="button"  >
                        <a href="/drobne/" class="text-white"><strong>KATEGORIA</strong></a>
                    </button>                        
                </div> 
                
                @foreach($categories as $category)   
                
                    <div class="accordion-item">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#podkategorie_{{ $category->id }}" aria-expanded="true" aria-controls="podkategorie_{{ $category->id }}">
                            <div class="me-auto">
                                <div class="fw-bold"> {{ $category->name }}</div>
                                    {{ $category->description }}
                            </div>
                        </button>                        
                        
                        <div id="podkategorie_{{ $category->id }}" class="accordion-collapse collapse show" aria-labelledby="nazwa_kategori_{{ $category->id }}" data-bs-parent="#menu_boczne" >
                            <div class="accordion-item">
                                <div class="accordion-body">
                                    <ul class="list-group  list-group-flush ">
                                        @foreach($category->SmallAdsSubCategories as $subcategory)
                                       
                                            <li class=" list-group-item mb-2">
                                                <a href="{{$category->link}}/{{$subcategory->link}}">{{ $subcategory->name }} </a> 
                                            </li>
                                        @endforeach    
                                    </ul>    
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach  

            </div>
        </div>

        <div class="col-md-7 p-0"> 
            @foreach($contents as $content)
                <div class="card m-1">
                    @php $highlighted = 'style=background-color:'.$content->highlighted.';' @endphp
                    <div class="card-body pt-1" {{ $highlighted }}>              
                        <div class="col-xl-12 pt-0 ">                 
                            <p class="text-end mb-0"> <small class="text-muted">{{  $content->date_start  }}</small></p>            
                        </div>
                        <div class="col-xl-12">
                            <h5 class="card-title"><strong><a href="{{ route('SmallAdsContentsById', ['categories'=> $content->SmallAdsCategories->link,'subcategories'=> $content->SmallAdsSubCategories->link,'id' => $content->id ]) }}">{{ $content->name }} </a></strong></h5>
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
                                <div class="col-9">
                                        <!--Excerpt-->                        
                                        <h4 class="text-right">Cena: <strong>{{ $content->price }} </strong> pln</h4>
                                        <p class="lead"><strong>{{ $content->lead }}.</strong></p>                            
                                </div>
                            </div>
                        
                            <div class="row text-end"> 
                                <form action="{{ route('SmallAdsContentsById', ['categories'=> $content->SmallAdsCategories->link,'subcategories'=> $content->SmallAdsSubCategories->link,'id' => $content->id ]) }}" method="get" enctype="text/plain"><div>
                                    <button type="submit" class="btn btn-primary">{{ __('więcej informacji') }}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        
            <div class="row p-0"> 
                {{ $contents->links() }}
            </div>
        </div>



  
        <div class="col-md-2">

        @include('addons.2col')  
        
        </div>
</div>
</div>
@endsection 


