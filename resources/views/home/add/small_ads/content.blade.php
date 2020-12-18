@extends('home.dashboard')
@section('step')


   <div class="row justify-content-center">
        <div class="col-md-12">
        <h3><strong>Ogłoszenia Drobne - Dodaj Treść</strong></h3>
               
                <ul class="stepper stepper-horizontal">
                        <li class="active">
                            <a class="p-1 m-1" href="#">
                                <span class="circle">1</span> 
                                Treść
                            </a>
                        </li>
                        <li>
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
                
                    <form action="{{ route('small_ads_content_post') }}"  method="POST" role="form" >

                        <input type="hidden" name="id" value=0>   
                        <input type="hidden" name="adressId" value=0>
                        <input type="hidden" name="portalId" value=0>                      
                        <input type="hidden" name="recomended" value="#ffffff">

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
                            <div class="row">                                     
                                <div class="col-12">
                                    <label class="category"><strong>Rodzaj ogłoszenia:</strong></label>
                                </div> 
                            </div>
                            <div class="row">  
                                                    
                                <div class="col-2">
                                    <div class="form-check">                    
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="form-check-input" id="sprzedam" name="adsClassifiedEnum" value="sprzedam" checked>
                                            <label class="form-check-label" for="sprzedam">Sprzedam</label>
                                        </div>
                                    </div>                                            
                                </div> 
                                <div class="col-2"> 
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="kupie" name="adsClassifiedEnum" value="kupię" >
                                        <label class="form-check-label" for="kupie">Kupię</label>
                                    </div>
                                </div>
                                <div class="col-2"> 
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="oddam" name="adsClassifiedEnum" value="oddam" >
                                        <label class="form-check-label" for="oddam">Oddam</label>
                                    </div>
                                </div>
                                <div class="col-2"> 
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="zamienie" name="adsClassifiedEnum" value="zamienie" >
                                        <label class="form-check-label" for="zamienie">Zamienię</label>
                                    </div>
                                </div>
                                <div class="col-2"> 
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="wypozycze" name="adsClassifiedEnum" value="wypozycze" >
                                        <label class="form-check-label" for="wypozycze">Wypożyczę</label>
                                    </div>
                                </div>
                            </div>  
                            
                            <div class="row">                                
                                    <div class="col-6">
                                    <label for="category"><strong>Kategoria</strong></label>
                                        <select class="browser-default custom-select mb-4 title" name="adsCategoriesId" id="adsCategoriesId" required>
                                                <option value="" diabled selected="">Wybierz kategorię</option>  
                                            
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label for="select">Podkategoria</label>
                                        <select class="browser-default custom-select mb-4" name="adsSubCategoriesId" id="adsSubCategoriesId" required>
                                            <option value="" diabled selected="">Wybierz Najpierw kategorię</option>                                
                                        </select>
                                    </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <label for="select">Start ogłoszenia</label>                                                                               
                                        <input placeholder="Data publikacji" type="text" id="dateStart" name="dateStart" class="form-control datepicker" required>
                                </div>
                                <div class="col-6">
                                    <label for="select">Na ile czasu</label>
                                    <select class="browser-default custom-select mb-4" id="dateEnd" name="dateEnd" >
                                        <option value="7" selected="">Tydzien</option>
                                        <option value="14">Dwa tygonie</option>
                                        <option value="30">Miesiąc</option>                                        
                                    </select>
                                </div>
                            </div>

                            <div class="md-form">
                            <input type="text" id="name" name="name" class="form-control rounded mb-4" placeholder="Nazwa towaru / produktu" value="{{ session()->get('small_ads.name') }}" required >
                            </div>

                            <div class="md-form">
                                <textarea class="form-control rounded-0 p-2" id="lead" name="lead" rows="2" placeholder="Opis skrócony (do 250znaków)" required>{{ session()->get('small_ads.lead') }}</textarea>
                            </div>

                            <div class="md-form">
                                <textarea class="form-control rounded-0 p-2" id="description" name="description" rows="5" placeholder="Treść ogłoszenia" required>{{ $content->description ?? ''}}</textarea>
                            </div>
                                <div class="row">
                                    <div class="col-3">
                                        <div class="md-form">
                                            <input type="text" id="price" name="price" class="form-control mb-4" placeholder="Cena" value="{{ $content->price ?? ''}}" required>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                            <div class="md-form">
                                                <input type="text" id="items" name="items" class="form-control mb-4" placeholder="sztuk" value="{{ $content->items ?? '' }}" required>
                                            </div>
                                    </div>   
                                    <div class="col-4">
                                        <div class="md-form">                                                  
                                                <select class="browser-default custom-select mb-4" name="invoice" id="invoice" required>
                                                    <option value="0" diabled selected="">wybierz rodzaj rachunku</option>
                                                    <option value="Nie wystawiam faktury" >Nie wystawiam faktury</option>
                                                    <option value="Faktura VAT">Faktura z VAT</option>
                                                    <option value="Faktura Vat-marża">Faktura Vat-marża</option>
                                                    <option value="Faktura bez VAT">Faktura bez VAT</option>                                              
                                                </select>                                                 
                                        </div>
                                    </div>
                                </div>
                                <div class="row">                       
                                    <div class="col-2">
                                        <div class="form-check">                                                   
                                            <label class="">Rodzaj oferty:</label>                                                    
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-check">                    
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="form-check-input" id="conditionNew" name="condition" value="nowe" checked>
                                                <label class="form-check-label" for="condition_new">Produkt nowy</label>
                                            </div>
                                        </div>                                            
                                    </div> 
                                    <div class="col-3"> 
                                        <div class="md-form">  
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="conditionUsed" name="condition" value="używane" >
                                                <label class="form-check-label" for="conditionUsed">Produkt używany</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>                                
                                <div class="row">  
                                    <div class="col-9"></div>
                                    <div class="col-3">                                       
                                        <div class="form-check">

                                            <button class="btn btn-info btn-block my-4 text-white" type="submit"><strong>Dalej</strong></button>
                                        </div>
                                    </div>                                   
                                </div>                         
                        </form>
            </div>
       
    </div>
 


@endsection

@section('scripts')

<script type="text/javascript">

$( document ).ready(function() {

    var today = new Date();

    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0');
    var yyyy = today.getFullYear();

    today = yyyy + "-" + mm + '-' + dd;
    
    $('.stepper').mdbStepper();

    $("#price").on('change', function(e) {
        value = formatCurrency(e.target.value) 
        $("#price").val(value);
        //console.log(value);
    });

    $( "#dateStart" ).datepicker({
      
      dayNamesShort: [ "Pn", "Wt", "Śr", "Czw", "Pt", "So", "Nd" ],
      dateFormat: 'yy-mm-dd'
}
).val(today);
 

    $(document).on('change', '#price', function (e) {    
        
        value = e.target.value;
           
        var strReg = "^([0-9\.\-])";
        var regex = new RegExp(strReg);
        console.log(value);

        console.log(regex.test(value));
        return(regex.test(value));
     
    });  

   
    $(document).on('change', '#adsCategoriesId', function (e) {    
        //  console.log(e);    
        var cat_id = e.target.value;
        $.get('/internal-api/ads_subcat/' + cat_id,function(data){
            $('#adsSubCategoriesId').empty();
            $.each(data,function(index,subCatObj){ $('#adsSubCategoriesId').append('<option value="'+subCatObj.id+'">'+subCatObj.name+'</option>'); }); 
        });
    });     
});

</script>
   
@endsection
