<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Casa Italiana - Mobila la comanda pentru tine si familia ta! | Home</title>

    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/casaitaliana.jpg">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <!-- Search Wrapper Area Start -->
    <div class="search-wrapper section-padding-100">
        <div class="search-close">
            <i class="fa fa-close" aria-hidden="true"></i>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="search-content">
                        <form action="#" method="get">
                            <input type="search" name="search" id="search" placeholder="Type your keyword...">
                            <button type="submit"><img src="img/core-img/search.png" alt=""></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Search Wrapper Area End -->

    <!-- ##### Main Content Wrapper Start ##### -->
    <div class="main-content-wrapper d-flex clearfix">

        <!-- Mobile Nav (max width 767px)-->
        <div class="mobile-nav">
            <!-- Navbar Brand -->
            <div class="amado-navbar-brand">
                <a href="/"><img src="img/core-img/casaitaliana.png" alt=""></a>
            </div>
            <!-- Navbar Toggler -->
            <div class="amado-navbar-toggler">
                <span></span><span></span><span></span>
            </div>
        </div>

        <!-- Header Area Start -->
        @include('partials._header')
        <!-- Header Area End -->

        <!-- Product Catagories Area Start -->
        <div class="products-catagories-area clearfix">
            <div class="amado-pro-catagory clearfix">
                @foreach ($categories as $category)
                    <!-- Single Catagory -->
                    <div class="single-products-catagory clearfix">
                        <a href="/shop?categories_id={{ $category->id }}">
                            <img src="/uploads/{{ $category->picture }}" alt="">
                            <div class="hover-content">
                                <div class="line"></div>
                                <h4>{{ $category->name }}</h4>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- Product Catagories Area End -->
    </div>
    <!-- ##### Main Content Wrapper End ##### -->

    <!-- ##### Newsletter Area Start ##### -->
    <section class="newsletter-area section-padding-100-0">
        <div class="container">
            <div class="row align-items-center">
			
			
                <!-- Newsletter Text -->
                <div class="col-12 col-lg-6 col-xl-7">
                    <div class="newsletter-text mb-100">
					
					<!-- Partenerii de adaugta --> 
                        <h2><span>Contacte</span></h2>
                        <p> Adresa: Str. Nicolaie Iorga 10/A, or. Balti, Moldova</p>
						<p> E-mail: casaitalianabalti@gmail.com </p>
						<p> Telefon: 079 079 618</p>
						<p> Fax: +373 023 193 990 </p>

                    </div>
                </div>
                <!-- Newsletter Form -->
                <div class="col-12 col-lg-6 col-xl-5">
				
				<div class="w3-container w3-border w3-round-xlarge w3-card-8">
	<h3 class="w3-xlarge w3-text-green w3-text-shadow"></h3>
	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2681.82585031789!2d27.939010215159072!3d47.76543218498632!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40cb60d6c0eda81b%3A0x809498d208a5b12b!2zc3RyLiBOaWNvbGFlIElvcmdhIDEwYSwgQsSDbMibaSAzMTAwLCDQnNC-0LvQtNCw0LLQuNGP!5e0!3m2!1sru!2s!4v1556086765489!5m2!1sru!2s" frameborder="0" style="border:0; width:100%; height:300px;" allowfullscreen></iframe>
	</iframe>
</div>


                    <!--<div class="newsletter-form mb-100">
                        <form action="#" method="post">
                            <input type="email" name="email" class="nl-email" placeholder="Your E-mail">
                            <input type="submit" value="Subscribe">
                        </form>
                    </div>-->
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Newsletter Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    @include('partials._footer')
    <!-- ##### Footer Area End ##### -->

    <!-- ##### jQuery (Necessary for All JavaScript Plugins) ##### -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="js/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>

</body>

</html>