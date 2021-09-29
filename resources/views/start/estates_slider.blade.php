<div class="container p-3 " style="background-color: rgb(203, 255, 168)">
	<h4 class="text-white text-center mb-0"><strong>PROMOMOWANE NIERUCHOMOŚCI</strong></h4>
<div id="EstatesCarousel" class="carousel slide pt-1" data-bs-ride="carousel">
		
	
	<!--Carousel Wrapper-->git push

	@php 
		$active = 'active'; 		
		$pom =0;
	@endphp
 
	<div class="carousel-inner">
	@foreach ($estates->chunk(4) as $chunkContent)	
	 @php $pom++; @endphp
			<div class="carousel-item {{ $active }}" data-bs-interval="3000">			
			<div class="row">	
			
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
										$imagefile = 'public/estates/'.$photo->name.'_kw.jpg'; 
										break;
									@endphp
								@endforeach
								
								<a href="nieruchomosci/{{$content->EstatesCategories->link}}/{{$content->id}}"><img class="card-img-top" src="{{ $storage->url($imagefile) }}" alt="{{ $content->name }}"></a>

							<div class="card-body">
								<h4 class="card-title" style=" display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical; overflow: hidden;"><a href="{{ route('EstatesContentsById', ['categories'=> $content->EstatesCategories->link,'subcategories'=> $content->EstatesCategories->link,'id' => $content->id ]) }}" title="{{ $content->name }}" >{{ $content->name }}</a></h4>
								<p class="card-text " style=" display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">{{ $content->lead }}</p>
								<a href="/nieruchomosci/{{$content->EstatesCategories->link}}/{{$content->id}}" class="btn btn-primary">Szczegóły</a>
							</div>
						</div>
					</div>						
			
			@endforeach
			</div>
			</div>	
    @endforeach
  
		</div>
		
	</div>
	<h6 class="text-white text-center mb-0"><strong><a href="/nieruchomosci/">ZOBACZ WIĘCEJ NIERUCHOMOŚCI</a></strong></h6>
</div>
	

