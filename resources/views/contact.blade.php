@extends('layouts.app')

@section('content')
<div class="container">
    <h1>¿En dónde nos ubicamos?</h1>
    <div class="row content-equal-height">
        <div class="col-xs-12 col-sm-6">
            <iframe width="100%" height="300" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDKA_nHMIS7wDCGXC4X8oSNbHQ72fSskIY&q=Space+Needle,Seattle+WA" allowfullscreen></iframe>
        </div>
        <div class="col-xs-12 col-sm-6 transport text-center">
            <p>Laborum officia anim esse aute mollit.</p>
            <div>
                <h2>¿Cómo llegar?</h2>
                <a href="#"><img src="https://d30y9cdsu7xlg0.cloudfront.net/png/6214-200.png"></a>
                <a href="#"><img src="http://www.hotelvillafrancarome.com/images/car-icon.png"></a>
            </div>
        </div>
    </div>
    <h2 class="text-center">Síguenos en nuestras redes sociales:</h2>
    <div class="social-icons text-center">
        <a href="#"><img src="https://facebookbrand.com/wp-content/themes/fb-branding/prj-fb-branding/assets/images/fb-art.png"></a>
        <a href="#"><img src="https://thebookspyblog.files.wordpress.com/2016/07/twitter-logo.png"></a>
    </div>
</div>
@endsection