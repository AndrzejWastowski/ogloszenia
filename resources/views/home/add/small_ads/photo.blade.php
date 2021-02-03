@extends('home.dashboard')
@section('step')


   <div class="row justify-content-center">
        <div class="col-md-12">
        <h3><strong>Ogłoszenia Drobne - Dodaj Zdjęcia</strong></h3>
               
                <ul class="stepper stepper-horizontal">
                        <li >
                            <a class="p-1 m-1" href="#">
                                <span class="circle">1</span> 
                                Treść
                            </a>
                        </li>
                        <li class="active">
                            <a class="p-1 m-1" href="#">
                                <span class="circle">2</span> 
                                    Zdjęcia
                            </a>
                        </li>
                        <li>                        
                            <a class="p-1 m-1" href="#">
                                <span class="circle">3</span> 
                                    Promowanie
                            </a>
                        </li>
                        <li>                        
                            <a class="p-1 m-1" href="#">
                                <span class="circle">4</span>
                                Podsumowanie
                            </a>
                        </li>
                    </ul>
                
                <div class="row">
                    @foreach ($photos as $photo)     
                    <div class="col-lg-4 col-md-12 mb-4">                    
                    <!--Modal: Name-->
                        <div class="modal fade" id="modal{{ $photo->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">                  
                            <!--Content-->
                            <div class="modal-content">  
                            <!--Body-->
                                <div class="modal-body mb-0 p-0">  
                                <div class="embed-responsive embed-responsive-16by9 z-depth-1-half">
                                    <iframe class="embed-responsive-item"  class="image-fluid" src="{{ $storage->url('public/small_ads/'.$photo->name.'_d.jpg') }}" allowfullscreen></iframe>
                                </div>  
                                </div>  
                            <!--Footer-->
                            <div class="modal-footer justify-content-center">
                                <span class="mr-4">{{ $request->name }}</span>
                                <button type="button" class="btn btn-outline-primary btn-rounded btn-md ml-4" data-dismiss="modal">Zamknij podgląd</button>
                            </div>
                            </div>
                            <!--/.Content-->                  
                        </div>
                        </div>
                        <!--Modal: Name-->                  
                        <a><img class="img-fluid z-depth-1" src="{{ $storage->url('public/small_ads/'.$photo->name.'_kw.jpg') }}" alt="images" data-toggle="modal" data-target="#modal{{ $photo->id }}"></a>
                    </div>
                    <!-- Grid column -->       
                    @endforeach 
                </div>       

                <form action="{{ route('small_ads_photo_post') }}"  method="POST" enctype="multipart/form-data" role="form" >                           
              
                    @if ($errors->any())
                            <label for="category"><strong>Uwaga - błędy w formularzu</strong></label>
                            <ul class="alert alert-danger">                                
                                @foreach ($errors->all() as $error)
                                    <li> {!! $error !!} </li>
                                @endforeach
                            </ul>                            
                        Jeśli nie wiesz jak dodać ogłoszenie skorzystaj z <a href="{{ route('help') }}"><strong>pomocy<strong></a>
                    @endif

                    <input type="file" multiple name="photos[]" accept="image/jpeg,image/gif,image/png">                        
                    
                    <button type="submit" class="btn btn-success">Wgraj zdjęcia na serwer</button>                            
                    
                    </form>

                    <form action="{{ route('small_ads_promotion') }}"  method="POST" enctype="multipart/form-data" role="form" >
                    @csrf

                    @if ($errors->any())
                        <label for="category"><strong>Uwaga - błędy w formularzu</strong></label>
                        <ul class="alert alert-danger">                                
                            @foreach ($errors->all() as $error)
                                <li> {!! $error !!} </li>
                            @endforeach
                        </ul>                            
                        Jeśli nie wiesz jak dodać ogłoszenie skorzystaj z <a href="{{ route('help') }}"><strong>pomocy<strong></a>
                    @endif
                            <div class="row">
                            <div class="col-8"></div>
                            <div class="col-4"><button class="btn btn-info btn-block my-4 text-white" type="submit">
                                <strong>Dalej</strong></button>
                            </div>
                            </div>
                        </form>
            
    </div>

@endsection

@section('java_script')

<script type="text/javascript">

$( document ).ready(function() {
    const date = new Date();

    $( "#dateStart" ).datepicker({
      
      dayNamesShort: [ "Pn", "Wt", "Śr", "Czw", "Pt", "So", "Nd" ],
      dateFormat: 'yy-mm-dd',
      
      setDate: date
      
    });

    $(document).on('change', '#price', function (e) {    
        
        value = e.target.value;
           
        var strReg = "^([0-9\.\-])";
        var regex = new RegExp(strReg);
        console.log(value);

        console.log(regex.test(value));
        return(regex.test(value));
     
    });  

   
    $(document).on('change', '#smallAdsCategoriesId', function (e) {    
        //  console.log(e);    
        var cat_id = e.target.value;
        $.get('/internal-api/add/subcat/' + cat_id,function(data){
            $('#smallAdsSubCategoriesId').empty();
            $.each(data,function(index,subCatObj){ $('#smallAdsSubCategoriesId').append('<option value="'+subCatObj.id+'">'+subCatObj.name+'</option>'); }); 
        });
    });     
});

</script>
   
@endsection
