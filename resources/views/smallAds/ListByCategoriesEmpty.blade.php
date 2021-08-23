
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
                    $categoryName = $category[0]->name;
                    $categoryLink = $category[0]->link;
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

   
   

    nie znaleziono aktywnych  ogłoszeń w tej kategorii <strong>{{ $categoryName }}</strong>
    
    
       
        </div>
        <div class="col-2">

        @include('addons.2col')  
        
        </div>
</div>
</div>
@endsection 


