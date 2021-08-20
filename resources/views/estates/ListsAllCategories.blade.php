
@extends('layouts.app')

@section('content')


<div class="container">
    <nav class="card p-3 pb-0 mb-3 bg-white" aria-label="breadcrumb">
        <ol class="breadcrumb" >
            <li class="breadcrumb-item"> <a href="/">Start</a></li> 
            <li class="breadcrumb-item"> <a href="/nieruchomosci/">Nieruchomości</a></li>  
        </ol>
    </nav> 
    <div class="row">
        <div class="col-3">
            <ul class="list-group bg-white" id="menu_boczne">
                <li class="list-group-item active" aria-current="true">KATEGORIA</li> 

                @php 
                    $show='show'; 
                    $trufalse = 'true';
                @endphp
            

                @foreach($categories as $category)   

                    @if ($show=='show') 
                    @php                 
                        $show=' ';                  
                        $trufalse = 'false';
                    @endphp

                    @endif
                    
                    <li class="list-group-item">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">  <a href="/nieruchomosci/{{ $category->link }}/">{{ $category->name }}</a></div>
                                   <small>{{ $category->description }}</small>
                            </div>
                        </li>
                             
                @endforeach  

                    </ul>
        </div>

    <div class="col-7 p-0">

    @foreach($contents as $content)

            
    <div class="card mb-2">
        @php $highlighted = 'style=background-color:'.$content->highlighted.';' @endphp
        <div class="card-body pt-1" {{ $highlighted }}>  
        
        <div class="col-xl-12 pt-0 ">                 
            <p class="text-end mb-0"> <small class="text-muted">{{  $content->date_start  }}</small></p>            
        </div>
        <div class="col-xl-12">
            <h5 class="card-title">
                 <a href="{{ route('EstatesContentsById', ['categories'=>$content->EstatesCategories->link,'id' => $content->id ]) }}"><strong>{{ $content->name }} </a></strong></h5></div> 
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
                                    
                                    <div class="carousel-item {{ $active }} ">
                                            <img class="d-block w-100 "  src="{{ $storage->url('public/estates/'.$photo->name.'_kw.jpg') or 'path/to/default.jpg' }}" alt=" {{ $content->name }} " >
                                        </div>
                                @endforeach    

                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carousel_{{ $content->id }}"  data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Poprzedni</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carousel_{{ $content->id }}"  data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Następny</span>
                            </button>
                        </div>
                    </div>
            <!--/.Carousel Wrapper--> 
                    <!--/.Slides-->
                    <!--Grid column-->
                    <div class="col-9">
                            <!--Excerpt-->                        
                            <h4 class="text-right">Cena: <strong>{{ $content->price }} </strong> pln</h4>
                                                      
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-12">
                        <label ><strong>informacje</strong></label>
                        <p class="lead"><strong>{{ $content->lead }}.</strong></p>     
                    </div>
                </div>
                <div class="row">  
                    <div class="col-9 mb-3">
                    </div>
                    <div class="mb-3">
                        <div class="offset-lg-9 offset-sm-4">
                            <form action="{{ route('EstatesContentsById', ['categories'=>'link_do_kategori','id' => '1' ]) }}" method="get" enctype="text/plain"><div>
                            
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


