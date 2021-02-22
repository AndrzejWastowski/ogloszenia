@extends('home.dashboard')
@section('step')


<div class="row justify-content-center">
    <div class="col-md-12">
        <h3><strong>Ogłoszenia Drobne - Promowanie</strong></h3>
            <ul class="stepper stepper-horizontal">
                <li >
                    <a class="p-1 m-1" href="{{ route('small_ads_content') }}">
                        <span class="circle">1</span> 
                            Treść
                    </a>
                </li>
                <li>
                    <a class="p-1 m-1" href="{{ route('small_ads_photo') }} ">
                        <span class="circle">2</span> 
                            Zdjęcia
                    </a>
                </li>
                <li >                        
                    <a class="p-1 m-1" href="{{ route('small_ads_promotion') }} ">
                        <span class="circle">3</span> 
                            Promowanie
                    </a>
                </li>
                <li class="active">                         
                    <a class="p-1 m-1" href="#">
                        <span class="circle">4</span>
                            Podsumowanie
                    </a>
                </li>
            </ul>
    </div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">{{ $categories['0']->name }}</li>
            <li class="breadcrumb-item ">{{ $subcategories['0']->name }}</li>
            <li class="breadcrumb-item active">{{ $content->name }}</li>                   
        </ol>
    </nav>  
    <div class="card m-1">
        <div class="card-body" style="background-color:{{   $content->highlighted  }}">    
            <p class="text-right mb-0 pb-0"> <small>wystawiono: <strong>{{  $content->date_start  }}</strong></small>
            dodał: {{ $user->author }}</p>
            kontakt: {{ $content->phone }}</p>
            kontakt: {{ $content->mail }}</p>
            <h5 class="card-title"> <strong>{{ $content->name }} </strong></h5>            
            
            <div class="card-text black-text">                
                <div class="row">
                    <div class="col-3">
                        <!--Carousel Wrapper-->     
                        @php
                            $active = null;
                            $count = 0;
                            $HTML_PHOTO ='';
                            $HTML_THUMBS ='';
                        @endphp
                                    
                        @foreach ($photos as $photo)

                            @if ($active==null) @php($active = 'active') @else @php($active = ' ') @endif                            
                                
                            @php ($HTML_PHOTO .= '<div class="carousel-item '.$active.'"><img class="d-block w-100 "  src="'.$storage->url('public/small_ads/'.$photo->name.'_kw.jpg').'" alt="'.$content->name.'" width="200"></div>')
                                    
                        @endforeach                            
                        
                        <div id="carousel-thumb" class="carousel slide carousel-fade carousel-thumbnails" data-ride="carousel">
                            <div class="carousel-inner" role="listbox" name="karuzela_fotek">
                                {!! $HTML_PHOTO !!}
                            </div>                
                                <!--Controls-->
                            <a class="carousel-control-prev" href="#carousel-thumb" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Poprzednie</span>
                            </a>
                            <a class="carousel-control-next" href="#carousel-thumb" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">następne</span>
                            </a>
                            <!--/.Controls-->
                                    
                            <ol class="carousel-indicators">
                                    <?php echo $HTML_THUMBS; ?>
                            </ol> 
                        </div>
                        <!--/.Carousel Wrapper--> 
                    </div>
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
</div>
    <div class="row mt-2">
        <div class="col-12">
            <label ><strong>PODSUMOWANIE</strong></label>
            <p>Sprzedawca: <a><strong>{{ $content->User->name }} </strong></a>,
            <p> Wystawiono od: <strong>{{  $content->date_start  }}</strong> do <strong>{{  $content->date_end  }}</strong></p>

            <label ><strong>OPCJE PROMOWANE</strong></label>
            <ul class="list-unstyled"> 
                <li>Napis przy ogłoszeniu: <strong>{{ $content->recomended }}</strong></li>
                <li>Podświetlenie: <div class="color-block" style="background-color: {{ $content->highlighted }}"> TŁO</div></li>
                <li>Ogłoszenie będzie wyświetlane od: <strong>{{ $content->date_start }}</strong> do <strong>{{ $content->date_end }}</strong></li>
                <li>kwota do zapłaty: <strong>{{ $payments }}</strong> pln</li>
            </ul>
        </div>
    </div>

                @if ($payments > 0)
                <form action="{{  route('AddPayments') }}"  class="border border-light p-5" method="POST" role="form" >
                    @csrf                    
                    <input type="hidden" name="section" value="{{ $section }}">
                    <input type="hidden" name="payment_id" value="{{ $payments->id }}">
                    <div class="row">  
                            <div class="col-9"></div>
                            <div class="col-3">                                       
                                <div class="form-check">
                                    <button class="btn btn-info btn-block my-4 text-white" type="submit"><strong>Dalej</strong></button>
                                </div>
                            </div>                                      
                                                    </div>   
                </form>
                @else

                <form action="{{ route('small_ads_success_post') }}"  class="border border-light p-5" method="POST" role="form" >
                    @csrf
                    
                    <input type="hidden" name="payment_id" value="{{ $payments }}">
                    <input type="hidden" name="section" value="{{ $section }}">
                    <div class="row">  
                                <div class="col-12 col-lg-3"></div>
                                <div class="col-12 col-lg-3">                                       
                                    
                                    <button class="btn btn-info btn-block text-white" type="submit"><strong>Dalej</strong></button>
                                    
                                </div>                                   
                            </div>  
                </form>
                    
                @endif
            </div>
    </div>
   </div>


     
@endsection    

@section('scripts')
   
@endsection
