<!doctype html>
<html lang="en">
    <head>
        
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Libre+Barcode+128+Text&family=Montserrat:wght@100;700&display=swap" rel="stylesheet">

    </head>
    <body>
        <div class="container ">
          <div class="row justify-content-center ">
            <div class="col-5 col-md-3 pt-3">
              <img src="{{ asset('img/gift-boxes.png') }}" class="img-fluid"/>
            </div>
          </div>
    
         <div class="row justify-content-center px-5">
            <div class="col-12 col-md-4 winner pt-3">
            <p class="promoHeader">YOU JUST WON</p>
               <p class="promoReward">{{ $_GET['reward'] }}</p>
            <p class="promoHeader">ON L'OREAL PRODUCTS</p>
             <!-- <img src="{{ asset('img/won1.png') }}" class="justify-content-center"/> -->
            </div>
          </div>
          <div class="row justify-content-center px-5">
          @if($_GET['type'] == "Online")
            <div class="col-12 col-md-4 winner pt-5 ">
             <p class="promoTitle">DISCOUNT CODE:</p>
             <p class="promoCode">{{ $_GET['barcode'] }}</p>
            </div>
            @else
            <div class="col-12 col-md-4 winner pt-5 ">
             <p class="promoTitle">DISCOUNT BARCODE:</p>
             <p class="barcodeCode">{{ $_GET['barcode'] }}</p>
            </div>
            @endif

          </div>
          @if($_GET['type'] == "Online")
            <div class="row justify-content-center px-5">
              <div class="col-12 col-md-4 feel22 py-4 ">
                  <a href="https://{{ $_GET['url'] }}" target="_blank"> <p class="promoUrl">{{ $_GET['url'] }}</p> </a>
              </div>
            </div>
          @endif
          <div class="row justify-content-center ">
            <div class="col-12 col-md-4 pt-2 winner">
            <p class="promoText">{{ $_GET['type'] == "Online" ?'Online':'Offline' }}</p>
            </div>
          </div>

    
          <div class="row justify-content-center">
            <div class="col-10 col-md-4">
              <img src="{{ asset('img/lanterns.svg') }}"/>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class=" col-md-4">
              <img src="{{ asset('img/logos.svg') }}"/>
            </div>
          </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    </body>
</html>