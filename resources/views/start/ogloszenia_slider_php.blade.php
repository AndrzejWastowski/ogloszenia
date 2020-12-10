<!-- Section: Products v.5 -->
<section class="text-center">


        <!-- Carousel Wrapper -->
        <div id="ads-slider" class="carousel slide carousel-multi-item" data-ride="carousel">
          
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li class="primary-color active" data-target="#ads-slider" data-slide-to="0"></li>
            <li class="primary-color" data-target="#ads-slider" data-slide-to="1"></li>
            <li class="primary-color" data-target="#ads-slider" data-slide-to="2"></li>
          </ol>
          <!-- Indicators -->
          <!-- Slides -->
          <div class="carousel-inner" role="listbox">
          
            @php $active=null; @endphp
            @for ($i=1;$i<4;$i++)
            
            @if ($active==null) 
              @php($active = 'active')
              @php($next_card = ' ');
            @else 
              @php($active = ' ') 
              @php($next_card = 'clearfix d-none d-md-block');
            @endif
         
            <div class="carousel-item {{ $active }}">
               
              @foreach ($adsContents1 as $adsContent)   
                 <!-- Card -->
                  <div class="col-md-4 mb-2 {{ $next_card}}">
                         <div class="card card-cascade narrower card-ecommerce">
                           <!-- Card image -->
                           <div class="view view-cascade overlay">
                             <img src="{{ $storage->url('resources/drobne/'.$adsContent->ads_photos_id.'.jpg') }}" class="card-img-top" alt="sample photo">
                             <a>
                               <div class="mask rgba-white-slight"></div>
                             </a>
                           </div>
                           <!-- Card image -->
                           <!-- Card content -->
                           <div class="card-body card-body-cascade text-center">
                             <!-- Category & Title -->
                             <a href="" class="text-muted">
                               <h5>{{ $adsContent->ads_contents_name }}</h5>
                             </a>
                             <h4 class="card-title my-4">
                               <strong>
                                 <a href="">{{ $adsContent->ads_contents_name }}</a>
                               </strong>
                             </h4>
                             <!-- Description -->
                             <p class="card-text">{{ $adsContent->ads_contents_lead }}</p>
                             <!-- Card footer -->
                             <div class="card-footer px-1">
                               <span class="float-left">{{ $adsContent->ads_contents_price }}</span>
                               <span class="float-right">
                                
                                 <a class="" data-toggle="tooltip" data-placement="top" title="" data-original-title="Dodaj do obserwowanych">
                                   <i class="fas fa-eye ml-3"></i>
                                 </a>
                               </span>
                             </div>
                           </div>
                           <!-- Card content -->
                         </div>
                         <!-- Card -->';
                 </div>
              @endforeach
              @endfor
                
      
            <!-- Second slide -->
            <div class="carousel-item">
              <div class="col-md-4 mb-2">
                <!-- Card -->
                <div class="card card-cascade narrower card-ecommerce">
                  <!-- Card image -->
                  <div class="view view-cascade overlay">
                    <img src="{{ $storage->url('resources/drobne/30.jpg') }}" class="card-img-top" alt="sample photo">
                    <a>
                      <div class="mask rgba-white-slight"></div>
                    </a>
                  </div>
                  <!-- Card image -->
                  <!-- Card content -->
                  <div class="card-body card-body-cascade text-center">
                    <!-- Category & Title -->
                    <a href="" class="text-muted">
                      <h5>Accessories</h5>
                    </a>
                    <h4 class="card-title my-4">
                      <strong>
                        <a href="">Summer hat</a>
                      </strong>
                    </h4>
                    <!-- Description -->
                    <p class="card-text">Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet,
                      consectetur, adipisci.
                    </p>
                    <!-- Card footer -->
                    <div class="card-footer px-1">
                      <span class="float-left">39 PLN</span>
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
              <div class="col-md-4 mb-2 clearfix d-none d-md-block">
                <!-- Card -->
                <div class="card card-cascade narrower card-ecommerce">
                  <!-- Card image -->
                  <div class="view view-cascade overlay">
                    <img src="/storage/resources/drobne/24.jpg" class="card-img-top"
                      alt="sample photo">
                    <a>
                      <div class="mask rgba-white-slight"></div>
                    </a>
                  </div>
                  <!-- Card image -->
                  <!-- Card content -->
                  <div class="card-body card-body-cascade text-center">
                    <!-- Category & Title -->
                    <a href="" class="text-muted">
                      <h5>Shoes</h5>
                    </a>
                    <h4 class="card-title my-4">
                      <strong>
                        <a href="">Black heels</a>
                      </strong>
                    </h4>
                    <!-- Description -->
                    <p class="card-text">Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet,
                      consectetur, adipisci.
                    </p>
                    <!-- Card footer -->
                    <div class="card-footer px-1">
                      <span class="float-left">79 PLN</span>
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
              <div class="col-md-4 mb-2 clearfix d-none d-md-block">
                <!-- Card -->
                <div class="card card-cascade narrower card-ecommerce">
                  <!-- Card image -->
                  <div class="view view-cascade overlay">
                    <img src="/storage/resources/drobne/25.jpg" class="card-img-top"
                      alt="sample photo">
                    <a>
                      <div class="mask rgba-white-slight"></div>
                    </a>
                  </div>
                  <!-- Card image -->
                  <!-- Card content -->
                  <div class="card-body card-body-cascade text-center">
                    <!-- Category & Title -->
                    <a href="" class="text-muted">
                      <h5>Outerwear</h5>
                    </a>
                    <h4 class="card-title my-4">
                      <strong>
                        <a href="">Black jacket</a>
                      </strong>
                    </h4>
                    <!-- Description -->
                    <p class="card-text">Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet,
                      consectetur, adipisci.
                    </p>
                    <!-- Card footer -->
                    <div class="card-footer px-1">
                      <span class="float-left">149 PLN</span>
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
            </div>
            <!-- Second slide -->
            <!--Third slide -->
            <div class="carousel-item">
              <div class="col-md-4 mb-2">
                <!-- Card -->
                <div class="card card-cascade narrower card-ecommerce">
                  <!-- Card image -->
                  <div class="view view-cascade overlay">
                    <img src="/storage/resources/drobne/26.jpg" class="card-img-top"
                      alt="sample photo">
                    <a>
                      <div class="mask rgba-white-slight"></div>
                    </a>
                  </div>
                  <!-- Card image -->
                  <!-- Card content -->
                  <div class="card-body card-body-cascade text-center">
                    <!-- Category & Title -->
                    <a href="" class="text-muted">
                      <h5>Accessories</h5>
                    </a>
                    <h4 class="card-title my-4">
                      <strong>
                        <a href="">Leather bag</a>
                      </strong>
                    </h4>
                    <!-- Description -->
                    <p class="card-text">Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet,
                      consectetur, adipisci.
                    </p>
                    <!-- Card footer -->
                    <div class="card-footer px-1">
                      <span class="float-left">29 PLN</span>
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
              <div class="col-md-4 mb-2 clearfix d-none d-md-block">
                <!-- Card -->
                <div class="card card-cascade narrower card-ecommerce">
                  <!-- Card image -->
                  <div class="view view-cascade overlay">
                    <img src="/storage/resources/drobne/27.jpg" class="card-img-top"
                      alt="sample photo">
                    <a>
                      <div class="mask rgba-white-slight"></div>
                    </a>
                  </div>
                  <!-- Card image -->
                  <!-- Card content -->
                  <div class="card-body card-body-cascade text-center">
                    <!-- Category & Title -->
                    <a href="" class="text-muted">
                      <h5>Accessories</h5>
                    </a>
                    <h4 class="card-title my-4">
                      <strong>
                        <a href="">Leather belt</a>
                      </strong>
                    </h4>
                    <!-- Description -->
                    <p class="card-text">Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet,
                      consectetur, adipisci.
                    </p>
                    <!-- Card footer -->
                    <div class="card-footer px-1">
                      <span class="float-left">89 PLN</span>
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
              <div class="col-md-4 mb-2 clearfix d-none d-md-block">
                <!-- Card -->
                <div class="card card-cascade narrower card-ecommerce">
                  <!-- Card image -->
                  <div class="view view-cascade overlay">
                    <img src="/storage/resources/drobne/28.jpg" class="card-img-top"
                      alt="sample photo">
                    <a>
                      <div class="mask rgba-white-slight"></div>
                    </a>
                  </div>
                  <!-- Card image -->
                  <!-- Card content -->
                  <div class="card-body card-body-cascade text-center">
                    <!-- Category & Title -->
                    <a href="" class="text-muted">
                      <h5>Shoes</h5>
                    </a>
                    <h4 class="card-title my-4">
                      <strong>
                        <a href="">Sneakers</a>
                      </strong>
                    </h4>
                    <!-- Description -->
                    <p class="card-text">Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet,
                      consectetur, adipisci.
                    </p>
                    <!-- Card footer -->
                    <div class="card-footer px-1">
                      <span class="float-left">129 PLN</span>
                      <span class="float-right">
                        <a class="" data-toggle="tooltip" data-placement="top" title="" data-original-title="Quick Look">
                          <i class="fas fa-eye ml-3"></i>
                        </a>
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
            </div>
            <!--Third slide -->
          </div>
          <!-- Slides -->
        </div>
        <!-- Carousel Wrapper -->
      
      </section>
      <!-- Section: Products v.5 -->