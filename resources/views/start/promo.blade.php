<!--Section: Bestsellers & offers-->
<section id="promotion">

<div class="containter">
    <div class="row mb-3">
        @foreach ($smal_ads_promoted as $content)   
        <div class="col-3">
            <div class="card "  style="width: 18rem;">
            @php $imagefile =  'public/brak_kw.jpg'; @endphp
            @foreach ($content->top_photos as $photo)
                @php $imagefile = 'public/small_ads/'.$photo->name.'_kw.jpg'; @endphp

                
            @endforeach   
            <a href=""><img   src="{{ $storage->url($imagefile) }}"  class="card-img-top" alt="sample photo"></a>
            <div class="card-body">
                <h5 class="card-title">{{ $content->name }}</h5>
                <p class="card-text text-">{{ $content->lead }}</p>
                <a href="#" class="btn btn-primary right-align">Szczegóły</a>
            </div>
            
            </div>
        </div>
        @endforeach    
    </div>
</div>


</section>
<!--Section: Bestsellers & offers-->