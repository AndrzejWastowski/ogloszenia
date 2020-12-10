<!-- Section: Products v.5 -->
<section class="text-center">

  <!-- Carousel Wrapper -->
  <div id="ads-slider" class="carousel slide carousel-multi-item" data-ride="carousel">
    @php 
      $active='active'; 
      $next_card=' '; 
      $i = 1;
    @endphp
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li class="primary-color active" data-target="#ads-slider" data-slide-to="0"></li>
      <li class="primary-color" data-target="#ads-slider" data-slide-to="1"></li>
      <li class="primary-color" data-target="#ads-slider" data-slide-to="2"></li>
    </ol>
    <!-- Indicators -->
    <!-- Slides -->
    <div class="carousel-inner" role="listbox">
      <!-- First slide -->
    
      <div class="carousel-item active">
        <div class="col-md-3 mb-2">
      
      @foreach ($adsContents as $adsContent) 
    
          <!-- Card -->
          <div class="card card-cascade narrower card-ecommerce">
            <!-- Card image -->
            <div class="view view-cascade overlay">
              <img src="{{ $storage->url('resources/drobne/'.$adsContent->ads_photos_id.'.jpg') }}" class="card-img-top" alt="sample photo">
              <a><div class="mask rgba-white-slight"></div></a>
            </div>
            <!-- Card image -->
            <!-- Card content -->
            <div class="card-body card-body-cascade text-center">
              <!-- Category & Title -->
              <div class="text-muted max-two-line"><h6><a href="drobne/{{ $adsContent->ads_categories_link }}/">{{ $adsContent->ads_categories_name }}</a> / <a href="drobne/{{ $adsContent->ads_categories_link }}/{{ $adsContent->ads_sub_categories_link }}/">{{ $adsContent->ads_sub_categories_name }} </a></h6></div>
              <h4 class="card-title my-2 max-one-line"><strong><a href="drobne/{{ $adsContent->ads_categories_link }}/{{ $adsContent->ads_sub_categories_link }}/{{ $adsContent->ads_contents_id }}">{{ $adsContent->ads_contents_name }} </a></strong></h4>
              <!-- Description -->
              <p class="card-text max-two-line">{{ $adsContent->ads_contents_lead}} </p>
              <!-- Card footer -->
              <div class="card-footer px-1">
                <span class="float-left">{{ $adsContent->ads_contents_price }}PLN </span>
                <span class="float-right">
                 
                  <a class="" data-toggle="tooltip" data-placement="top" title="" data-original-title="Dodaj do obserwowanych">
                    <i class="fas fa-eye ml-3"></i>
                  </a>
                </span>
              </div>
            </div>
            <!-- Card content -->
          </div>
          <!-- Card -->
        </div>  
    
      @php 
        
       
        if (($i % 4)==0) {
          
          echo ' </div>
          <div class="carousel-item">';
        }
        $i++;
        @endphp
               
        <div class="col-md-3 mb-2 clearfix d-none d-md-block">
      @endforeach
      </div>
    </div>
    </div>
    <!-- Slides -->
  </div>
  <!-- Carousel Wrapper -->

</section>
<!-- Section: Products v.5 -->