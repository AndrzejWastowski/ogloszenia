<!--Section: Bestsellers & offers-->
<section id="promotion" class="container-fluid pb-3">

    <!--Grid row-->
    <div class="row">

        <!--Grid column-->
        <div class="col-12">

            <!-- Nav tabs -->
            <ul class="nav md-tabs nav-justified grey lighten-3 mx-0" role="tablist">
                <li class="nav-item">
                    <a class="ml-3  nav-link active dark-grey-text font-weight-bold" data-toggle="tab" href="#panel1" role="tab">Ostatnia szansa!</a>
                </li>
                <li class="nav-item">
                    <a class="ml-3   nav-link dark-grey-text font-weight-bold" data-toggle="tab" href="#panel2" role="tab">Nowe oferty</a>
                </li>
                <li class="nav-item">
                    <a class="ml-3 nav-link dark-grey-text font-weight-bold" data-toggle="tab" href="#panel3" role="tab"></i>Najczęściej oglądane</a>
                </li>
            </ul>
            <!-- Tab panels -->

      


            <div class="tab-content px-0 pt-0 pb-0">
                <!--Panel 1-->
                <div class="tab-pane fade in show active" id="panel1" role="tabpanel">
                    <br>
                    <!-- Grid row -->
                    <div class="row">
                        @foreach ($adsLastChanse as $adsContent)   
                       
                        <!--Grid column-->
                        <div class="col-lg-3 col-md-12 ">

                            <!--Card-->
                            <div class="card card-ecommerce">

                                <!--Card image-->
                                <div class="view overlay">
                                    <img src="{{ $storage->url('resources/drobne/'.$adsContent->ads_photos_id.'.jpg') }}" class="card-img-top" alt="sample photo">
                                    <a>
                                        <div class="mask rgba-white-slight"></div>
                                    </a>
                                </div>
                                <!--Card image-->

                                <!--Card content-->
                                <div class="card-body">
                                    <!--Category & Title-->

                                    <h5 class="card-title mb-1">
                                        <strong>
                                            <a href="" class="dark-grey-text">{{ $adsContent->ads_contents_name }}</a>
                                        </strong>
                                    </h5>
                                    <span class="badge badge-danger mb-2">Ogłoszenie promowane</span>
                                    
                                    <!--Card footer-->
                                    <div class="card-footer pb-0">
                                        <div class="row mb-0">
                                            <span class="float-left">
                                                <strong>{{ $adsContent->ads_contents_price }}</strong>
                                            </span>                                          
                                        </div>
                                    </div>

                                </div>
                                <!--Card content-->
                            </div>
                            <!--Card-->
                        </div>
                        <!--Grid column-->
                        @endforeach

                   

                    </div>
                    <!--Grid row-->
                </div>

                <div class="tab-pane fade" id="panel2" role="tabpanel">
                    <br>

                    <!-- Grid row -->
                    <div class="row ">

                        @foreach ($adsNewOffer as $adsContent)   
                       
                        <!--Grid column-->
                        <div class="col-lg-3 col-md-12 ">

                            <!--Card-->
                            <div class="card card-ecommerce">

                                <!--Card image-->
                                <div class="view overlay">
                                    <img src="{{ $storage->url('resources/drobne/'.$adsContent->ads_photos_id.'.jpg') }}" class="card-img-top" alt="sample photo">
                                    <a>
                                        <div class="mask rgba-white-slight"></div>
                                    </a>
                                </div>
                                <!--Card image-->

                                <!--Card content-->
                                <div class="card-body">
                                    <!--Category & Title-->

                                    <h5 class="card-title mb-1">
                                        <strong>
                                            <a href="" class="dark-grey-text">{{ $adsContent->ads_contents_name }}</a>
                                        </strong>
                                    </h5>
                                    <span class="badge badge-danger mb-2">Ogłoszenie promowane</span>
                                    
                                    <!--Card footer-->
                                    <div class="card-footer pb-0">
                                        <div class="row mb-0">
                                            <span class="float-left">
                                                <strong>{{ $adsContent->ads_contents_price }}</strong>
                                            </span>                                          
                                        </div>
                                    </div>

                                </div>
                                <!--Card content-->
                            </div>
                            <!--Card-->
                        </div>
                        <!--Grid column-->
                        @endforeach

                    </div>
                    <!--Grid row-->
                </div>
                <!--/.Panel 2-->

                <!--/.Panel 2-->

                <!--Panel 3-->
                <div class="tab-pane fade" id="panel3" role="tabpanel">
                    <br>
                    <!-- Grid row -->
                    <div class="row">

                        @foreach ($adsTopView as $adsContent)   
                       
                        <!--Grid column-->
                        <div class="col-lg-3 col-md-12 ">

                            <!--Card-->
                            <div class="card card-ecommerce">

                                <!--Card image-->
                                <div class="view overlay">
                                    <img src="{{ $storage->url('resources/drobne/'.$adsContent->ads_photos_id.'.jpg') }}" class="card-img-top" alt="sample photo">
                                    <a>
                                        <div class="mask rgba-white-slight"></div>
                                    </a>
                                </div>
                                <!--Card image-->

                                <!--Card content-->
                                <div class="card-body">
                                    <!--Category & Title-->

                                    <h5 class="card-title mb-1">
                                        <strong>
                                            <a href="" class="dark-grey-text">{{ $adsContent->ads_contents_name }}</a>
                                        </strong>
                                    </h5>
                                    <span class="badge badge-danger mb-2">Ogłoszenie promowane</span>
                                    
                                    <!--Card footer-->
                                    <div class="card-footer pb-0">
                                        <div class="row mb-0">
                                            <span class="float-left">
                                                <strong>{{ $adsContent->ads_contents_price }}</strong>
                                            </span>                                          
                                        </div>
                                    </div>

                                </div>
                                <!--Card content-->
                            </div>
                            <!--Card-->
                        </div>
                        <!--Grid column-->
                        @endforeach

                </div>
                <!--/.Panel 3-->
            </div>

        </div>

    </div>
    <!--Grid row-->

</section>
<!--Section: Bestsellers & offers-->