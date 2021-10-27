@extends('home.dashboard')
@section('step')


<div class="row justify-content-center">
    
    <h3><strong>Samochody Osobowe - dodaj zdjęcia</strong></h3>

    <div class="bs-stepper">
        <div class="bs-stepper-header" role="tablist">
        <!-- your steps here -->
            <div class="step active" data-target="#tresc-part">
                <button type="button" class="step-trigger" role="tab" aria-controls="tresc-part" id="tresc-part-trigger">
                    <span class="bs-stepper-circle">1</span>
                    <span class="bs-stepper-label active"> Treść</span>
                </button>
            </div>
            <div class="line "></div>
            <div class="step active" data-target="#foto-part">
                <button type="button" class="step-trigger" role="tab" aria-controls="foto-part" id="foto-part-trigger">
                    <span class="bs-stepper-circle">2</span>
                    <span class="bs-stepper-label active">Zdjęcia</span>
                </button>
            </div>
            <div class="line"></div>
            <div class="step" data-target="#promocja-part">
                <button type="button" class="step-trigger" role="tab" aria-controls="promocja-part" id="promocja-part-trigger">
                    <span class="bs-stepper-circle">3</span>
                    <span class="bs-stepper-label">Promowanie</span>
                </button>
            </div>
            <div class="line"></div>
            <div class="step" data-target="#podsumowanie-part">
                <button type="button" class="step-trigger" role="tab" aria-controls="podsumowanie-part" id="podsumowanie-part-trigger">
                    <span class="bs-stepper-circle">4</span>
                    <span class="bs-stepper-label">Podsumowanie</span>
                </button>
            </div>
        </div>
    </div>
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
                                    <iframe class="embed-responsive-item"  class="image-fluid" src="{{ $storage->url('public/cars/'.$photo->name.'_d.jpg') }}" allowfullscreen></iframe>
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
                        <a><img class="img-fluid z-depth-1" src="{{ $storage->url('public/cars/'.$photo->name.'_kw.jpg') }}" alt="images" data-toggle="modal" data-target="#modal{{ $photo->id }}"></a>
                    </div>
                    <!-- Grid column -->       
                    @endforeach 
                </div>       

                <form action="{{ route('cars_photo_post') }}"  method="POST" enctype="multipart/form-data" role="form" >                           
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

                    <input type="file" multiple name="photos[]" accept="image/jpeg,image/gif,image/png">                        
                    
                    <button type="submit" class="btn btn-success">Wgraj zdjęcia na serwer</button>                            
                    
                    </form>

                    <div class="row mb-3">      
                        <div class="offset-lg-8 offset-sm-4">
                            <a href="{{ route('cars_promotion') }}">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Dalej') }}
                                </button>
                            </a>
                        </div>
                    </div>
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

   
    
});

</script>
   
@endsection
