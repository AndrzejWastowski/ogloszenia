<section class="section pt-3">

        <!-- Grid row -->
        <div class="row">
    <!--Grid column-->
    <div class="col-lg-9 col-md-12 pb-lg-9 mb-4 p-3">
            <!--Image -->
            
            <div class="view zoom z-depth-1">
                <img src="{{ $storage->url('resources/reklama/reklama_poziom.jpg') }}" class="img-fluid" alt="sample image">
               
            </div>
        
            <!--Image -->            
        </div>
        <!--Grid column-->
            <!--Grid column-->
            <div class="col-lg-3col-md-12  p-3">
    
                <!-- Section: Categories -->
                <section class="section">
                <form name="add_adwers" action={{ route('AddSelect') }}  metchod="POST">
                        @csrf
                    <button type="sender" class="btn btn-primary">Dodaj ogłoszenie</button><br>
                    
                </form>
                   
                </section>
                <section class="section">
                 <form name="add_adwers" action='/register' metchod="POST">
                        @csrf
                            <button type="sender" class="btn btn-primary">Załóż konto</button><br>
                            
                  </form>
                           
                        </section>
                <!-- Section: Categories -->
    
            </div>
        
    
            
    
        </div>
        <!--Grid row-->
    
    </section>