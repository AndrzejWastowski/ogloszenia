<!-- Footer -->
<footer class="footer mt-auto pt-5 pb-4 bg-dark text-white">

  <!-- Footer Links -->
  <div class="container text-center text-md-left">

    <!-- Grid row -->
    <div class="row text-center text-md-left" >
      
      <div class="col-md-3 col-lg-3 mx-auto mt-3">        
        <h5 class="text-uppercase font-weight-bold  text-warning">Ogłoszenia KCI</h5>
        <p>Lokalny portal ogłoszeniowy Kutna, Gostynina Żychlina i Łęczycy </p>
      </div>
      <!-- Grid column -->

      <hr class="clearfix w-100 d-md-none">

      <!-- Grid column -->
      <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">

        <!-- Links -->
        <h5 class="text-uppercase mb-4 font-weight-bold text-warning">Links</h5>

   
        <ul class="list-unstyled">
          <li>
            <a href="#!" style="text-decoration: none;">Link 1</a>
          </li>
          <li>
            <a href="#!" style="text-decoration: none;">Link 2</a>
          </li>
          <li>
            <a href="#!" style="text-decoration: none;">Link 3</a>
          </li>
          <li>
            <a href="#!" style="text-decoration: none;">Link 4</a>
          </li>
        </ul>

      </div>
      <!-- Grid column -->

      <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
        
        <h5 class="text-uppercase mb-4 font-weight-bold text-warning">Links</h5>

 
        <ul class="list-unstyled">
          <li>
            <a href="#!" style="text-decoration: none;">Link 1</a>
          </li>
          <li>
            <a href="#!" style="text-decoration: none;">Link 2</a>
          </li>
          <li>
            <a href="#!" style="text-decoration: none;">Link 3</a>
          </li>
          <li>
            <a href="#!" style="text-decoration: none;">Link 4</a>
          </li>
        </ul>

    </div>

      <!-- Grid column -->
      <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">

        <!-- Links -->
        <h5 class="text-uppercase mb-4 font-weight-bold text-warning">Kontakt</h5>


        <ul class="list-unstyled">
          <li>
            <i class="fas fa-home mr-3"></i><a href="#!" style="text-decoration: none;"> 99-300 Kutno</a>
          </li>
          <li>
          <i class="fas fa-envelope mr-3"></i><a href="#!" style="text-decoration: none;"> ogloszenia@kutno.net.pl</a>
          </li>
          <li>
          <i class="fas fa-phone mr-3"></i><a href="#!" style="text-decoration: none;"> +48 501 753 973</a>
          </li>
          <li>
          <i class="fas fa-print mr-3"></i><a href="#!" style="text-decoration: none;" >+24 123 123 123 </a>
          </li>
        </ul>

      </div>
      <!-- Grid column -->


    </div>
    <!-- Grid row -->
  <hr class="mb-4">
  <div class="row align-items-center">
      <div class="col-md-7 col-lg-8">
        <p> Copyright @2020 All right resserverd by <a href="#" style="text-decoration:none;">
          <strong class="text-warning">Code Core</strong></a></p>
      </div>
      <div class="col-md-5 col-lg-4">
     
  <!-- Social buttons -->
  <ul class="list-unstyled list-inline text-center">
    <li class="list-inline-item">
      <a class="btn-floating btn-fb mx-1">
        <i class="fab fa-facebook-f"> </i>
      </a>
    </li>
    <li class="list-inline-item">
      <a class="btn-floating btn-tw mx-1">
        <i class="fab fa-twitter"> </i>
      </a>
    </li>
    <li class="list-inline-item">
      <a class="btn-floating btn-gplus mx-1">
        <i class="fab fa-google-plus-g"> </i>
      </a>
    </li>
    <li class="list-inline-item">
      <a class="btn-floating btn-li mx-1">
        <i class="fab fa-linkedin-in"> </i>
      </a>
    </li>
    <li class="list-inline-item">
      <a class="btn-floating btn-dribbble mx-1">
        <i class="fab fa-dribbble"> </i>
      </a>
    </li>
  </ul>
  <!-- Social buttons -->



  </div>
  

  </div>
  <!-- Footer Links -->

  <hr>

  <!-- Call to action -->
  <ul class="list-unstyled list-inline text-center py-2">
  @guest

  <li class="list-inline-item">
      <h5 class="mb-1">Zarejestruj się żeby  w pełni korzystać z portalu  </h5>
          <a href="{{ route('register') }}" class="btn btn-primary btn-rounded">{{ __('Rejestracja') }}</a>
       
    </li>
    <li class="list-inline-item">
    <h5 class="mb-1">lub zaloguj, jeśli masz konto: </h5>
        <a href="{{ route('login') }}" class="btn btn-primary btn-rounded">{{ __('Logowanie') }}</a>
      
    </li>

    @else
        <li class="list-inline-item">
            <h5 class="mb-1">{{ __('Jesteś zalogowany jako:') }} </h5>
        </li>
        <li class="list-inline-item">
            <strong> {{ Auth::user()->name }}</strong></a>
        </li>
    @endguest


  

  </ul>
  <!-- Call to action -->

  <hr>


</footer>
<!-- Footer -->