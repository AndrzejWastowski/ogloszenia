<section id="logowanie" class="container-fluid pb-3">
    <!-- Grid row -->
    <div class="row">
    <!-- Grid row -->
    <!--Grid column-->
        <div class="col-xl-9 col-md-12">
                <!--Image -->            
                <div class="view zoom z-depth-1">
                    <img src="{{ $storage->url('resources/reklama/baner_970x250.jpg') }}" class="img-fluid" alt="Baner reklamowy 970x250">               
                </div>
                <!--Image -->            
        </div>
        <!--Grid column-->       
        <div class="col-xl-3 col-md-12">    
            <!-- Section: Categories -->               
            <form class="mb-4 mt-5" name="add_adwers" action={{ route('AddSelect') }}  metchod="POST">
                @csrf
                <button type="sender" class="btn btn-primary">Dodaj ogłoszenie</button>                    
            </form> 
            <form class="mb-4" name="add_adwers" action='/register' metchod="POST">
                @csrf
                <button type="sender" class="btn btn-primary">Załóż konto</button>                                
            </form> 
            <!-- Section: Categories -->    
         </div>    
        </div>
    <!--Grid row-->
</section>