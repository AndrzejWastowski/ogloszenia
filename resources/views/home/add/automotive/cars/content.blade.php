@extends('home.dashboard')
@section('step')


<div class="row justify-content-center">
    
    <h4><strong>SAMOCHODY OSOBOWE - DODAJ TREŚĆ</strong></h4>

    <div class="bs-stepper">
        <div class="bs-stepper-header" role="tablist">
        <!-- your steps here -->
            <div class="step active" data-target="#tresc-part">
                <button type="button" class="step-trigger" role="tab" aria-controls="tresc-part" id="tresc-part-trigger">
                    <span class="bs-stepper-circle">1</span>
                    <span class="bs-stepper-label active"> Treść</span>
                </button>
            </div>
            <div class="line"></div>
            <div class="step" data-target="#foto-part">
                <button type="button" class="step-trigger" role="tab" aria-controls="foto-part" id="foto-part-trigger">
                    <span class="bs-stepper-circle">2</span>
                    <span class="bs-stepper-label">Zdjęcia</span>
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
    
    <form class="row g-3" action="{{ route('cars_content_post') }}"  method="POST" role="form" >
        <input type="hidden" name="id" value="{{ $content->id==null ? 0  : $content->id  }}">   
        @csrf
        @if ($errors->any())
            <label for="brand"><strong>Uwaga - błędy w formularzu</strong></label>
                <ul class="alert alert-danger">                
                    @foreach ($errors->all() as $error)
                        <li> {!! $error !!} </li>
                    @endforeach
                </ul>                            
            Jeśli nie wiesz jak dodać ogłoszenie skorzystaj z <a href="{{ route('help') }}"><strong>pomocy<strong></a>
        @endif
            <strong>{{ session('komunikat') }}</strong> 
                              
            

            <div class="row">                
                <label class="brand"><strong>Rodzaj pojazdu:</strong></label>
                <div class="col-md-4 mb-4">                
                    <input type="radio" class="form-check-input" id="condition_new" name="condition" value="nowy" checked>
                    <label class="form-check-label" for="condition_new">Pojazd nowy</label>
                </div>
                <div class="col-md-4 mb-4">
                    <input type="radio" class="form-check-input" id="condition_used" name="condition" value="używany" >
                    <label class="form-check-label" for="condition_used">Pojazd używany</label>
                </div>
            </div> 
                        
            <div class="row">                
      
                <div class="col-md-4 mb-4">    
                    <label class="brand"><strong>Stan techniczny:</strong></label>            
                    <select class="form-select" id="technical_condition">
                        <option value="1">Bezwypadkowy</option>
                        <option value="2">Po wypadku - sprawny</option>
                        <option value="3">Uszkodzony - do naprawy</option>
                    </select>
                        
                </div>
                        

                
                <div class="col-md-3 mb-4">                
                    <label class="brand"><strong>Typ nadwozia:</strong></label>
                    <select class="form-select" name="cars_body_id" id="cars_body_id" required>
                        <option value="0" diabled selected="">Wybierz nadwozie</option>  
                            @foreach($bodies as $body)
                                <option value="{{$body->id}}" {{ ($body->id == $content->cars_body_id ? 'selected' : '') }} >{{$body->name}}</option>
                            @endforeach                            
                    </select>                        
                </div>       

            </div> 
            <div class="row">   
                <div class="col-md-4 mb-4">    
                    <label class="brand"><strong>Rodzaj paliwa</strong></label>            
                    <select class="form-select" id="fuel_type" name="fuel_type">
                        <option value="Benzyna">Benzyna</option>
                        <option value="Olej napędowy">Olej napędowy</option>
                        <option value="Gaz LPG">Gaz LPG</option>
                        <option value="Gaz CNG">Gaz CNG</option>
                        <option value="Elektryczny">Elektryczny</option>
                        <option value="Hybryda">Hybryda</option>
                        <option value="Wodór">Wodór</option>
                    </select>                        
                </div>
                <div class="col-md-2 mb-4">  
                    <label class="form-label"   for="power"><strong>Moc w KM</strong></label>                                               
                    <input placeholder="Moc silnika w KM" type="number" id="power" name="power" value='{{ $content->power ?? '100'}}' class="form-control rounded" >
                </div>

                <div class="col-md-4 mb-4">  
                    <label class="form-label"   for="capacity"><strong>Pojemnosć silnika</strong></label>                                               
                    <input placeholder="Pojemnosć silnika / baterii" type="number" id="capacity" name="capacity" value='{{ $content->capacity ?? 0}}' class="form-control rounded" >
                </div>
            </div>


            <div class="row">
                <div class="col-md-2 mb-4">    
                    <label class="brand"><strong>Ilość drzwi:</strong></label>            
                    <input type="number" id ="doors_number" name="doors_number" class="form-control" value="4">
                        
                </div>
                <div class="col-md-2 mb-4">    
                    <label class="brand"><strong>Osób:</strong></label>            
                    <input type="number" id="seats" name="seats" class="form-control" value="5">
                        
                </div>
            </div>
                    
            

            <div class="col-md-6">
                <label class="form-label" for="cars_brands_id"><strong>Marka</strong></label>
                <select class="form-select" name="cars_brands_id" id="cars_brands_id" required>
                    <option value="" diabled selected="">Wybierz markę</option>  
                        @foreach($brands as $brand)

                            <option {{ old('cars_brands_id') == $brand->id ? "selected" : "" }} value="{{ $brand->id }}">{{ $brand->name }}</option>


                            {{-- <option value="{{$brand->id}}" {{ ($brand->id == $content->cars_brands_id ? 'selected' : '') }} >{{$brand->name}}</option> --}}
                        @endforeach                            
                </select>
            </div>
            <div class="col-md-6">
                <label class="form-label" for="cars_models_id"><strong>Model</strong></label>
                <select class="form-select" name="cars_models_id" id="cars_models_id" required>
                    <option value="" diabled selected="">Wybierz najpierw kategorię</option>
                    @foreach($models as $model)
                    
                    <option {{ old('cars_models_id') == $model->id ? "selected" : "" }} value="{{ $model->id }}">{{ $model->name }}</option>
                    
                    {{-- <option value="{{$model->id}}" {{ ($model->id == $content->cars_models_id ? 'selected' : '') }} >{{$model->name}}</option> --}}
                    @endforeach                           
                </select>
            </div>                 

            <div class="col-md-6">
                <label class="form-label"  for="date_production"><strong>Data produkcji</strong></label>                                               
                <input placeholder="Data produkcji" type="text" id="date_production" name="date_production" value='{{ $content->date_production ?? ''}}' class="form-control datepicker" data-provide="datepicker" required>
            </div>

            <div class="col-md-6">
                <label class="form-label"  for="date_registration"><strong>Data rejestracji</strong></label>                                               
                <input placeholder="Data rejestracji" type="text" id="date_registration" name="date_registration" value='{{ $content->date_registration ?? ''}}' class="form-control datepicker" data-provide="datepicker" required>
            </div>

            <div class="col-md-6">
                <label class="form-label"  for="country_registration"><strong>Kraj pierwszej rejestracji</strong></label>                                               
                <input placeholder="Kraj rejestracji" type="text" id="country_registration" name="country_registration" value='{{ $content->country_registration ?? ''}}' class="form-control" required>
            </div>

            <div class="col-md-6">
                <div class="form-check">
                    <label class="form-label" ><strong>Zarejestrowany w Polsce?</strong></label><br>
                    <input class="form-check-input" type="checkbox" value="1" id="poland_registration" checked>
                    <label class="form-check-label" for="poland_registration">
                      Tak
                    </label>
                  </div>
            </div>

            <div class="col-md-6">
                <label class="form-label"  for="date_start"><strong>Start ogłoszenia</strong></label>                                               
                <input placeholder="Data publikacji" type="text" id="date_start" name="date_start" value='{{ $content->date_start ?? ''}}' class="form-control datepicker" data-provide="datepicker" required>
            </div>
                    
            <div class="col-md-6">                
                <label class="form-label"  for="date_end"><strong>Na ile czasu</strong></label>                          
                    <select class="form-select" id="date_end" name="date_end" >
                        <option value="7" selected="">Tydzien</option>
                        <option value="14">Dwa tygodnie</option>
                        <option value="30">Miesiąc</option>                        
                    </select>                             
            </div>
                       

            <div class="col-md-12 mb-4">
                <label class="form-label"  for="lead"><strong>Lid - krótki opis wyświetlany przy ogłoszeniu</strong></label><br>
                <textarea class="form-control rounded-2 p-2" id="lead" minlength=30 maxlength=255 name="lead" rows="3" placeholder="Opis skrócony (od 10 do 250znaków)" required>{{ $content->lead ?? '' }}</textarea>                
            </div>

            <div class="col-md-12 mb-4">
                <label class="form-label"  for="description"><strong>Treść - pełny opis wyświetlany w  rozwinięciu ogłoszenia</strong></label><br>
                <textarea class="form-control rounded-2 p-2" id="description" minlength=30 maxlength=2500 name="description" rows="10" placeholder="Treść ogłoszenia (od 30 do 3000 znaków)" required>{{ $content->description ?? ''}}</textarea>
            </div>

            <div class="col-md-3 mb-4">
                <label class="form-label" for="price"><strong>Cena</strong></label>
                <input type="text" id="price" name="price" class="form-control" placeholder="Cena" value="{{ $content->price ?? ''}}" required>
            </div>
            
         
            <div class="col-md-6 mb-4">
                <label for="invoice"><strong>Rodzaj wystawianego rachunku</strong></label>
                <select class="form-select" name="invoice" id="invoice" required>
                    <option diabled selected="">Wybierz rodzaj rachunku</option>
                    <option value="Nie wystawiam faktury" >Nie wystawiam faktury</option>
                    <option value="Faktura VAT">Faktura z VAT</option>
                    <option value="Faktura Vat-marża">Faktura Vat-marża</option>
                    <option value="Faktura bez VAT">Faktura bez VAT</option>                              
                </select>                                 
            </div>
                            
        
            
            <div class="col-md-6">          
                <label for="contact_phone" value=""><strong>Telefon kontaktowy</strong></label>
                <input name="contact_phone" class="form-control"  id="contact_phone"  value="{{ $user->phone ?? '' }}">
            </div>
            
            <div class="col-md-6">                 
                <label for="contact_email" ><strong>Adres e-mail</strong></label><br>
                <input name="contact_email" class="form-control"  id="contact_email" value="{{ $user->email ?? '' }}">
            </div>
            <div class="mb-3">
                <div class="offset-lg-8 offset-sm-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Dalej') }}
                    </button>
                </div>
            </div>

</div> 

@endsection

@section('java_script')

<script type="text/javascript">

$( document ).ready(function() {
    const date = new Date();


    $( "#date_production" ).datepicker({
        dayNamesShort: [ "Pn", "Wt", "Śr", "Czw", "Pt", "So", "Nd" ],
        dateFormat: 'yy',
        setDate: date,
        value: date
    });


    $( "#date_registration" ).datepicker({
        dayNamesShort: [ "Pn", "Wt", "Śr", "Czw", "Pt", "So", "Nd" ],
        dateFormat: 'yy',
        setDate: date,
        value: date
    });

    $( "#date_start" ).datepicker({
        dayNamesShort: [ "Pn", "Wt", "Śr", "Czw", "Pt", "So", "Nd" ],
        dateFormat: 'yy-mm-dd',
        setDate: date,
        value: date
    });

    $(document).on('change', '#price', function (e) {    
        
        value = e.target.value;
        var strReg = "^([0-9\.\-])";
        var regex = new RegExp(strReg);
        console.log(value);

        console.log(regex.test(value));
        return(regex.test(value));
     
    });  

   
    $(document).on('change', '#cars_brands_id', function (e) {    
        //  console.log(e);    
        var cat_id = e.target.value;
        $.get('/internal-api/cars/' + cat_id,function(data){
            $('#cars_models_id').empty();
            $.each(data,function(index,subCatObj){ $('#cars_models_id').append('<option value="'+subCatObj.id+'">'+subCatObj.name+'</option>'); }); 
        });
    });     
});

</script>
   
@endsection
