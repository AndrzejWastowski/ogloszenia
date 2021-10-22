@extends('home.dashboard')
@section('step')


<div class="row justify-content-center">
    
    <h3><strong>Nieruchomości - Dodaj Treść</strong></h3>

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
    
    <form class="row g-3" action="{{ route('estates_content_post') }}"  method="POST" role="form" >
        <input type="hidden" name="id" value="{{ $content->id==null ? 0  : $content->id  }}">   
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
            <strong>{{ session('komunikat') }}</strong> 
            <div class="col-6">
                <label class="category"><strong>Rynek</strong></label>      
                <div class="row">     
                    <div class="col-md-6">                
                        <label class="form-check-label" for="market">Pierwotny</label>
                        <input type="radio" class="form-check-input" id="market" name="market" value="pierwotny" checked>
                        
                    </div>
                    <div class="col-md-6">
                        <label class="form-check-label" for="market">Wtórny</label>
                        <input type="radio" class="form-check-input" id="market" name="market" value="wtórny" >
                    </div>
                </div>
            </div>
            <div class="col-6">


     

            
                <label class="category"><strong>Rodzaj ogłoszenia:</strong></label>
          
            <div class="row">
                <div class="col-md-6">
                    <label class="form-label" for="sprzedam">Sprzedaż</label>
                    <input type="radio" class="form-check-input" id="estates_type" name="estates_type" value="Sprzedam" checked>
                </div>
                
                <div class="col-md-6">
                    <label class="form-label" for="oddam">Wynajem</label>
                    <input type="radio" class="form-check-input"  id="estates_type" name="estates_type" value="Wynajmę" >
                </div>
            </div>
            
        </div>
            <div class="col-md-6">
                <label class="form-label" for="estates_categories_id"><strong>Kategoria</strong></label>
                <select class="form-select" name="estates_categories_id" id="estates_categories_id" required>
                    <option value="" diabled selected="">Wybierz kategorię</option>  
                        @foreach($categories as $category)
                            <option value="{{$category->id}}" {{ ($category->id == $content->estates_categories_id ? 'selected' : '') }} >{{$category->name}}</option>
                        @endforeach                            
                    </select>
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
                    <label class="form-label" for="name"><strong>Nazwa</strong></label>
                    <input type="text" id="name" name="name" class="form-control rounded " placeholder="Nazwa towaru / produktu" value="{{ $content->name ?? '' }}" required >
            </div>                            

            <div class="col-md-12 mb-4">
                <label class="form-label"  for="lead"><strong>Lid - krótki opis wyświetlany przy ogłoszeniu</strong></label><br>
                <textarea class="form-control rounded-2 p-2" id="lead" name="lead" rows="3" placeholder="Opis skrócony (od 10 do 250znaków)" required>{{ $content->lead ?? '' }}</textarea>                
            </div>

            <div class="col-md-12 mb-4">
                <label class="form-label"  for="description"><strong>Treść - pełny opis wyświetlany w  rozwinięciu ogłoszenia</strong></label><br>
                <textarea class="form-control rounded-2 p-2" id="description" name="description" rows="10" placeholder="Treść ogłoszenia (od 30 do 3000 znaków)" required>{{ $content->description ?? ''}}</textarea>
            </div>

            <div class="col-md-3 mb-4">
                <label class="form-label" for="price"><strong>Cena</strong></label>
                <input type="text" id="price" name="price" class="form-control" placeholder="Cena" value="{{ $content->price ?? ''}}" required>
            </div>
            
            <div class="col-md-3 mb-4">
                <label class="form-label" for="area"><strong>Powierzchnia</strong></label>
                <input type="text" id="area" name="area" class="form-control" placeholder="powierzchnia" value="{{ $content->area ?? '' }}" required>
            </div>   
            <div class="col-md-6 mb-4">
                <label class="form-label"  for="unit"><strong>Jednostka</strong></label>
                <select class="form-select" name="unit" id="unit" required>
                    <option value="0" diabled selected="">Wybierz jednostkę!</option>
                    <option value="mkw" >Metr kwadratowy</option>
                    <option value="ar">Ar</option>
                    <option value="hektar">Hektar</option>
                    
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

   
    $(document).on('change', '#estates_categories_id', function (e) {    
        //  console.log(e);    
        var cat_id = e.target.value;
        $.get('/internal-api/add/subcat/' + cat_id,function(data){
            $('#estates_sub_categories_id').empty();
            $.each(data,function(index,subCatObj){ $('#estates_sub_categories_id').append('<option value="'+subCatObj.id+'">'+subCatObj.name+'</option>'); }); 
        });
    });     
});

</script>
   
@endsection
