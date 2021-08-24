<div class="container my-4">
  <div id="SmallAdsCarousel" class="carousel slide " data-bs-ride="carousel">      
    <hr class="mb-5"/>      
    @php 
      $active = 'active'; 		
      $pom =0;
    @endphp
   
    <div class="carousel-inner">
    @foreach ($smal_ads_promo->chunk(4) as $chunkContent)	
     @php $pom++; @endphp;
        <div class="carousel-item {{ $active }}" data-bs-interval="3000">			
        <div class="row">	
        <h4 class="text-center"><strong>Ogłoszenia drobne {{ $pom }}</strong></h4>
          @foreach($chunkContent as $content)
        
            <div class="col-md-3 {{ $clearfix ?? ''  }}">
              <div class="card mb-2">
                  @php
                    $active='';
                    $clearfix='clearfix d-none d-md-block';
                    $imagefile =  'public/brak_kw.jpg';
                  @endphp
                  @foreach ($content->TopPhotos as $photo)
                    @php 
                      $imagefile = 'public/small_ads/'.$photo->name.'_kw.jpg'; 
                      break;
                    @endphp
                  @endforeach
                  
                  <a href="{{ route('SmallAdsContentsById', ['categories'=> $content->SmallAdsCategories->link,'subcategories'=> $content->SmallAdsSubCategories->link,'id' => $content->id ]) }}">
                    <img class="card-img-top" src="{{ $storage->url($imagefile) }}" alt="{{ $content->name }}">
                  </a>
  
                <div class="card-body">
                  <h4 class="card-title" style=" display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical; overflow: hidden;"><a href="{{ route('SmallAdsContentsById', ['categories'=> $content->SmallAdsCategories->link,'subcategories'=> $content->SmallAdsSubCategories->link,'id' => $content->id ]) }}" title="{{ $content->name }}" >{{ $content->name }}</a></h4>
                  <p class="card-text " style=" display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">{{ $content->lead }}</p>
                  <a href="{{ route('SmallAdsContentsById', ['categories'=> $content->SmallAdsCategories->link,'subcategories'=> $content->SmallAdsSubCategories->link,'id' => $content->id ]) }}" class="btn btn-primary">Zobacz więcej</a>
                </div>
              </div>
            </div>						
        
        @endforeach
        </div>
        </div>	
      @endforeach    
      </div>      
    </div>    
  </div>    
  
  