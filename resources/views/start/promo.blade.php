<ul class="nav nav-tabs" id="OgloszeniaPromowane" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="small_ads-tab" data-bs-toggle="tab" data-bs-target="#small_ads" type="button" role="tab" aria-controls="small_ads" aria-selected="true">Ogłoszenia drobne</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="estates-tab" data-bs-toggle="tab" data-bs-target="#estates" type="button" role="tab" aria-controls="estates" aria-selected="false">Nieruchomości</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="car-tab" data-bs-toggle="tab" data-bs-target="#car" type="button" role="tab" aria-controls="car" aria-selected="false">Motoryzacja</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="job-tab" data-bs-toggle="tab" data-bs-target="#job" type="button" role="tab" aria-controls="job" aria-selected="false">Praca</button>
  </li>
</ul>
<div class="tab-content" id="myTabContent">

    <div class="tab-pane fade show active" id="small_ads" role="tabpanel" aria-labelledby="small_ads-tab">
    <div class="row">
		
    @foreach($smal_ads_promo as $content)
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
										//$imagefile = $storage->url('small_ads/'.$photo->name.'_kw.jpg'); 
										break;
									@endphp
								@endforeach
								<a href="drobne/{{$content->SmallAdsCategories->link}}/{{$content->SmallAdsSubCategories->link}}/{{$content->id}}"><img class="card-img-top" src="{{ $storage->url($imagefile) }}" alt="{{ $content->name }}"></a>

							<div class="card-body">
								<h5 class="card-title" style=" display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;"><strong><a href="drobne/{{$content->SmallAdsCategories->link}}/{{$content->SmallAdsSubCategories->link}}/{{$content->id}}">{{ $content->name }}</a></strong></h5>								
								<p class="card-text " style=" display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">{{ $content->lead }}</p>							
							</div>
						</div>
					</div>						
			
			@endforeach
            
    </div>
    </div>

    <div class="tab-pane fade"  id="estates" role="tabpanel" aria-labelledby="estates-tab">
    <div class="row">   
    @foreach($estates_promo as $content)

	<div class="col-md-3 {{ $clearfix ?? ''  }}">
		<div class="card mb-2">
				@php
					$active='';
					$clearfix='clearfix d-none d-md-block';
					$imagefile =  'public/brak_kw.jpg';
				@endphp
				@foreach ($content->topPhotos as $photo)
					@php 
						$imagefile = 'public/estates/'.$photo->name.'_kw.jpg'; 
						//$imagefile = $storage->url('small_ads/'.$photo->name.'_kw.jpg'); 
						break;
					@endphp
				@endforeach
				<a href="nieruchomosci/{{$content->EstatesCategories->link}}/{{$content->id}}"><img class="card-img-top" src="{{ $storage->url($imagefile) }}" alt="{{ $content->name }}"></a>

			<div class="card-body">
				<h5 class="card-title" style=" display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;"><strong><a href="/nieruchomosci/{{$content->EstatesCategories->link}}/{{$content->id}}">{{ $content->name }}</a></strong></h5>
				<p class="card-text " style=" display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">{{ $content->lead }}</p>				
			</div>
		</div>
	</div>						
			
			@endforeach
    </div>
    
    </div>
    <div class="tab-pane fade" id="car" role="tabpanel" aria-labelledby="car-tab">
    <div class="row">   
    @foreach($cars_promo as $content)

					<div class="col-md-3 {{ $clearfix ?? ''  }}">
						<div class="card mb-2">
								@php
									$active='';
									$clearfix='clearfix d-none d-md-block';
									$imagefile =  'public/brak_kw.jpg';
								@endphp
								@foreach ($content->TopPhotos as $photo)
									@php 
										$imagefile = 'public/cars/'.$photo->name.'_kw.jpg';  
									//	$imagefile = $storage->url('cars/'.$photo->name.'_kw.jpg'); 
										break;
									@endphp
								@endforeach
								<a href="/motoryzacja/{{$content->CarsBrands->link}}/{{$content->CarsModels->link}}/{{$content->id}}"><img class="card-img-top" src="{{ $storage->url($imagefile) }}" alt="{{ $content->name }}"></a>

							<div class="card-body">
								<h4 class="card-title" style=" display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">{{ $content->name }}</h4>
								<p class="card-text " style=" display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">{{ $content->lead }}</p>
								
							</div>
						</div>
					</div>						
			
			@endforeach
    </div>
    
    </div>
    <div class="tab-pane fade" id="job" role="tabpanel" aria-labelledby="car-job">
    
    
    </div>
</div>