<div class="container my-4">
<h4 class="text-center"><strong>Promowane Ogłoszenia</strong></h4>
	<hr class="mb-5"/>
	<!--Carousel Wrapper-->
	<div id="SmallAdsCarousel" class="carousel slide" data-bs-ride="carousel">
		<div class="carousel-indicators">
			<button type="button" data-bs-target="#SmallAdsCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
			<button type="button" data-bs-target="#SmallAdsCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
			<button type="button" data-bs-target="#SmallAdsCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
		</div>
	@php 
		$active = 'active'; 		
	@endphp

	<div class="carousel-inner">
	@foreach ($smal_ads_promoted->chunk(4) as $chunkContent)		
			<div class="carousel-item {{ $active }}">			
			<div class="row">	
		
				@foreach($chunkContent as $content)
					<div class="col-md-3 {{ $clearfix ?? ''  }}">
						<div class="card mb-2">
								@php
									$active='';
									$clearfix='clearfix d-none d-md-block';
									$imagefile =  'public/brak_kw.jpg';
								@endphp
								@foreach ($content->top_photos as $photo)
									@php 
										$imagefile = $storage->url('small_ads/'.$photo->name.'_kw.jpg') }};  
										break;
									@endphp
								@endforeach
								<a href="nieruchomosci/{{$content->SmallAdsCategorie}}{{$content->id}}"><img class="card-img-top" src="{{ $storage->url($imagefile) }}" alt="{{ $content->name }}"></a>

							<div class="card-body">
								<h4 class="card-title" style=" display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">{{ $content->name }}</h4>
								<p class="card-text " style=" display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">{{ $content->lead }}</p>
								<a href="/nieruchomosci/{{$content->SmallAdsCategorie}}/{{$content->id}}" class="btn btn-primary">Szczegóły</a>
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
	

