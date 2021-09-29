
<div class="container p-3 " style="background-color: rgb(255, 207, 168)">
  <h4 class="text-white mb-0"><strong>OGŁOSZENIA DROBNE</strong></h4>
  <div class="row  ">

  <div class="col-3">
    <div class="card mb-3">
        <img class="card-img-top" src="{{ $storage->url('addons/sredni_prostokat_300x_250.jpg') }}" >
    </div>
    <div class="card">
        <img class="card-img-top" src="{{ $storage->url('addons/baner_mobilny_300x50.jpg') }}">
    </div>
</div>
      <div class="col-9">
          
          <div id="SmallAdsCarousel" class="carousel slide " data-bs-ride="carousel">     
        
          @php 
              $active = 'active'; 		
              $pom =0;
          @endphp
      
          <div class="carousel-inner">
          @foreach ($smal_ads_slider->chunk(4) as $chunkContent)	
          @php $pom++; @endphp
              <div class="carousel-item {{ $active }}" data-bs-interval="6000">			
              <div class="row">	
            
                  @foreach($chunkContent as $content)
              
                  <div class="col-md-3 {{ $clearfix ?? ''  }}">
                      <div class="card mb-2">
                          @php
                          $active='';
                          $clearfix='clearfix d-none d-md-block';
                          $imagefile =  'public/brak_kw.jpg';
                          @endphp
                          @foreach ($content->topPhotos as $photo)
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
  
</div>
<h6 class="text-white text-center mb-0"><strong><a href="/drobne/">ZOBACZ WIĘCEJ OGŁOSZEŃ DROBNYCH</a></strong></h6>
</div>
          
          