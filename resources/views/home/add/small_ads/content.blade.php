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
                            <div class="row">                                     
                                <div class="col-12">
                                    <label class="category"><strong>Rodzaj ogłoszenia:</strong></label>
                                </div> 
                            </div>
                            <div class="row mb-2">                                                    
                                <div class="col-13 col-lg-3">                                                    
                                <div class="form-check">
                                        <input type="radio" class="form-check-input" id="sprzedam" name="small_ads_classified_enum" value="sprzedam" checked>
                                        <label class="form-check-label" for="sprzedam">Sprzedam</label>
                                    </div>                                                                              
                                </div> 
                                <div class="col-12 col-lg-2"> 
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="kupie" name="small_ads_classified_enum" value="kupię" >
                                        <label class="form-check-label" for="kupie">Kupię</label>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-2"> 
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="oddam" name="small_ads_classified_enum" value="oddam" >
                                        <label class="form-check-label" for="oddam">Oddam</label>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-2"> 
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="zamienie" name="small_ads_classified_enum" value="zamienie" >
                                        <label class="form-check-label" for="zamienie">Zamienię</label>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-2"> 
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="wypozycze" name="small_ads_classified_enum" value="wypozycze" >
                                        <label class="form-check-label" for="wypozycze">Wypożyczę</label>
                                    </div>
                                </div>
                            </div>  
                            
                            <div class="row">                                
                                    <div class="col-12 col-lg-6">
                                    <label for="small_ads_categories_id"><strong>Kategoria</strong></label>
                                        <select class=" custom-select mb-4 " name="small_ads_categories_id" id="small_ads_categories_id" required>
                                                <option value="" diabled selected="">Wybierz kategorię</option>  
                                                @foreach($categories as $category)
                                                <option value="{{$category->id}}" {{ ($category->id == $content->small_ads_categories_id ? 'selected' : '') }} >{{$category->name}}</option>
                                                @endforeach
                                            
                                        </select>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <label for="small_ads_sub_categories_id"><strong>Podkategoria</strong></label>
                                        <select class="custom-select mb-4" name="small_ads_sub_categories_id" id="small_ads_sub_categories_id" required>
                                            <option value="" diabled selected="">Wybierz najpierw kategorię</option>                                                 
                                            
                                                @foreach($subcategories as $subcategory)
                                                
                                                <option value="{{$subcategory->id}}" {{ ($subcategory->id == $content->small_ads_sub_categories_id ? 'selected' : '') }} >{{$subcategory->name}}</option>
                                                @endforeach                                           
                                        </select>
                                    </div>
                            </div>



                            <div class="row">
                            
                                <div class="col-12 col-lg-6">
                                    
                                            <label for="date_start"><strong>Start ogłoszenia</strong></label>                                                                               
                                            <input placeholder="Data publikacji" type="text" id="date_start" name="date_start" value='{{ $content->date_start ?? ''}}' class="form-control datepicker" data-provide="datepicker" required>
                                            </div>
                                    
                                <div class="col-12 col-lg-6"> 
                                
                                <label for="date_end"><strong>Na ile czasu</strong></label>                          
                                        
                                            <select  class="custom-select mb-4" id="date_end" name="date_end" >
                                                <option value="7" selected="">Tydzien</option>
                                                <option value="14">Dwa tygodnie</option>
                                                <option value="30">Miesiąc</option>                                        
                                            </select>
                                            
                                </div>                                    
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <label for="name"><strong>Nazwa</strong></label>
                                    <input type="text" id="name" name="name" class="form-control rounded mb-4" placeholder="Nazwa towaru / produktu" value="{{ $content->name ?? '' }}" required >
                                </div>
                            </div>                            

                            <div class="row">
                                <div class="col-12">
                                    <label for="lead"><strong>Lid - krótki opis wyświetlany przy ogłoszeniu</strong></label><br>
                                    <textarea class="form-control rounded-0 p-2" id="lead" name="lead" rows="3" placeholder="Opis skrócony (od 10 do 250znaków)" required>{{ $content->lead ?? '' }}</textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <label for="description"><strong>Treść - pełny opis wyświetlany w  rozwinięciu ogłoszenia</strong></label><br>
                                    <textarea class="form-control rounded-0 p-2" id="description" name="description" rows="10" placeholder="Treść ogłoszenia (od 30 do 3000 znaków)" required>{{ $content->description ?? ''}}</textarea>
                                </div>
                            </div>

                            <div class="row mt-12">
                                <div class="col-3 col-lg-3">
                                    
                                        <label for="price"><strong>Cena</strong></label>
                                        <input type="text" id="price" name="price" class="form-control mb-4" placeholder="Cena" value="{{ $content->price ?? ''}}" required>
                                    
                                </div>
                                <div class="col-12 col-lg-2">
                                    
                                        <label for="items"><strong>ile sztuk</strong></label>
                                        <input type="text" id="items" name="items" class="form-control mb-4" placeholder="sztuk" value="{{ $content->items ?? '' }}" required>
                                    
                                </div>   
                                <div class="col-12 col-lg-5">
                                    <label class="mb-2" for="invoice"><strong>Rodzaj wystawianego rachunku</strong></label>
                                    <select class="browser-default custom-select mb-4" name="invoice" id="invoice" required>
                                        <option value="0" diabled selected="">Wybierz rodzaj rachunku</option>
                                        <option value="Nie wystawiam faktury" >Nie wystawiam faktury</option>
                                        <option value="Faktura VAT">Faktura z VAT</option>
                                        <option value="Faktura Vat-marża">Faktura Vat-marża</option>
                                        <option value="Faktura bez VAT">Faktura bez VAT</option>                                              
                                    </select>                                                 
                                </div>
                            </div>
                            
                            <div class="row ">                       
                                <div class="col-12">                                 
                                        <label class=""><strong>Rodzaj oferty</strong></label>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-12 col-lg-3 pl-5">
                                    <input type="radio" class="form-check-input" id="conditionNew" name="condition" value="nowe" checked>
                                    <label class="form-check-label" for="condition_new">Produkt nowy</label>
                                    
                                </div> 
                                <div class="col-12 col-lg-4 pl-5"> 
                                    <input type="radio" class="form-check-input" id="conditionUsed" name="condition" value="używane" >
                                    <label class="form-check-label" for="conditionUsed">Produkt używany</label>
                                </div>
                            </div>
                            <div class="row mb-2"">                       
                                <div class="col-12 col-lg-6">                                 
                                        <label for="contact_phone" value=""><strong>Telefon kontaktowy</strong></label>
                                        <input name="contact_phone" id="contact_phone"  value="{{ $user->phone ?? '' }}">
                                </div>
                                <div class="col-12 col-lg-6">                                 
                                        <label for="contact_email" ><strong>Adres e-mail</strong></label><br>
                                        <input name="contact_email" id="contact_email" value="{{ $user->email ?? '' }}">
                                </div>
                            </div>

                            <div class="row">  
                                <div class="col-12 col-lg-9"></div>
                                <div class="col-12 col-lg-3">                                       
                                    
                                    <button class="btn btn-info btn-block text-white" type="submit"><strong>Dalej</strong></button>
                                    
                                </div>                                   
                            </div> 
                        </form>
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

   
    $(document).on('change', '#small_ads_categories_id', function (e) {    
        //  console.log(e);    
        var cat_id = e.target.value;
        $.get('/internal-api/add/subcat/' + cat_id,function(data){
            $('#small_ads_sub_categories_id').empty();
            $.each(data,function(index,subCatObj){ $('#small_ads_sub_categories_id').append('<option value="'+subCatObj.id+'">'+subCatObj.name+'</option>'); }); 
        });
    });     
});

</script>
   
@endsection
