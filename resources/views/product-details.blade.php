<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title> Casa Italiana - Mobila la comanda pentru tine si familia ta!| Product Details</title>

    <!-- Favicon  -->
    <link rel="icon" href="/img/core-img/casaitaliana.png">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="/css/core-style.css">
    <link rel="stylesheet" href="/style.css">

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
                            <button type="submit"><img src="/img/core-img/search.png" alt=""></button>
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
                <a href="index.html"><img src="/img/core-img/casaitaliana.png" alt=""></a>
            </div>
            <!-- Navbar Toggler -->
            <div class="amado-navbar-toggler">
                <span></span><span></span><span></span>
            </div>
        </div>

        <!-- Header Area Start -->
        @include('partials._header')
        <!-- Header Area End -->

        <!-- Product Details Area Start -->
        <div class="single-product-area section-padding-100 clearfix">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mt-50">
                                <li class="breadcrumb-item"><a href="/">Acasa</a></li>
                                <li class="breadcrumb-item"><a href="/shop?categories_id={{$listing->categories_id}}">{{$listing->categories_name}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $listing->name }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-lg-7">
                        <div class="single_product_thumb">
                            <div id="product_details_slider" class="carousel slide" data-ride="carousel">   <!-- de schimbat imaginile -->
                                <ol class="carousel-indicators">
                                    @if ($listing->picture_1)
                                        <li class="active" data-target="#product_details_slider" data-slide-to="0" style="background-image: url(/uploads/{{ $listing->picture_1 }});">
                                        </li>
                                    @endif
                                    @if ($listing->picture_2)
                                        <li data-target="#product_details_slider" data-slide-to="1" style="background-image: url(/uploads/{{ $listing->picture_2 }});">
                                        </li>
                                    @endif
                                    @if ($listing->picture_3)
                                        <li data-target="#product_details_slider" data-slide-to="2" style="background-image: url(/uploads/{{ $listing->picture_3 }});">
                                        </li>
                                    @endif
                                    @if ($listing->picture_4)
                                        <li data-target="#product_details_slider" data-slide-to="3" style="background-image: url(/uploads/{{ $listing->picture_4 }});">
                                        </li>
                                    @endif
                                </ol>
                                <div class="carousel-inner">
                                    @if ($listing->picture_1) 
                                        <div class="carousel-item active">
                                            <a class="gallery_img" href="/uploads/{{ $listing->picture_1 }}">
                                                <img class="d-block w-100" src="/uploads/{{ $listing->picture_1 }}" alt="First slide">
                                            </a>
                                        </div>
                                    @endif
                                    @if ($listing->picture_2)
                                        <div class="carousel-item">
                                            <a class="gallery_img" href="/uploads/{{ $listing->picture_2 }}">
                                                <img class="d-block w-100" src="/uploads/{{ $listing->picture_2 }}" alt="Second slide">
                                            </a>
                                        </div>
                                    @endif
                                    @if ($listing->picture_3)
                                        <div class="carousel-item">
                                            <a class="gallery_img" href="/uploads/{{ $listing->picture_3 }}">
                                                <img class="d-block w-100" src="/uploads/{{ $listing->picture_3 }}" alt="Third slide">
                                            </a>
                                        </div>
                                    @endif
                                    @if ($listing->picture_4)
                                        <div class="carousel-item">
                                            <a class="gallery_img" href="/uploads/{{ $listing->picture_4 }}">
                                                <img class="d-block w-100" src="/uploads/{{ $listing->picture_4 }}" alt="Fourth slide">
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-5">
                        <div class="single_product_desc">
                            <!-- Product Meta Data -->
                            <div class="product-meta-data">
                                <div class="line"></div>
                                <p class="product-price">${{$listing->price}}</p>
                                <a href="/product-details/{{$listing->id}}">
                                    <h6>{{$listing->name}}</h6>
                                </a>
                                <!-- Ratings & Review -->
                                <div class="ratings-review mb-15 d-flex align-items-center justify-content-between">
                                    <div class="ratings">
                                        @for ($i = 0; $i < $listing->rate; $i++)
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        @endfor
                                    </div>
                                    <div class="review">
                                        <a href="recenzie.html">Scrie o recenzie</a>                          
                                    </div>
                                </div>
                                <!-- Avaiable -->
                                <p class="unavaibility"><i class="fa fa-circle"></i> In Stoc</p>
                            </div>

                            <div class="short_overview my-5">
                                <p>Descriere</p>
                                <p>{{$listing->description}}</p>
                            </div>

                            <!-- Add to Cart Form -->
                            <form class="cart clearfix" method="post">
                                <div class="cart-btn d-flex mb-50">
                                    <p>Cantitate</p>
                                    <div class="quantity">
                                        <span class="qty-minus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i class="fa fa-caret-down" aria-hidden="true"></i></span>
                                        <input type="number" class="qty-text" id="qty" step="1" min="1" max="300" name="quantity" value="1">
                                        <span class="qty-plus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-caret-up" aria-hidden="true"></i></span>
                                    </div>
                                </div>
                                <button type="submit" name="addtofavorite" value="5" class="btn amado-btn">Adauga la Favorite</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Product Details Area End -->
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
	<h3 class="w3-xlarge w3-text-green w3-text-shadow"><span>Locatia ...</span></h3>
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
    <script src="/js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="/js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="/js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="/js/plugins.js"></script>
    <!-- Active js -->
    <script src="/js/active.js"></script>

</body>

</html>