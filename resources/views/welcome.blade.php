<!doctype html>
<html lang="en">
    <head>
        
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">


    </head>
    <body>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-10 col-md-5 py-4">
              <img src="{{ asset('img/revive.svg') }}" class="img-fluid"/>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-12 col-md-6">
              <img src="{{ asset('img/discount-donate_2.svg') }}"/>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-5 col-md-3">
              <!-- <div class="light"></div> -->
              <img src="{{ asset('img/enter-name.svg') }}"/>
            </div>
          </div>
          <form action="/createUser" method="POST">
            @csrf
            <input type="hidden" name="ref" value="{{ (isset($_GET['ref']))?$_GET['ref']:'' }}" />
            <div class="row justify-content-center">
                <div class="col-10 col-md-4 py-2">
                <input type="text" placeholder="Enter your email" class="form-control lor-text-input"/>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-10 col-md-4 py-2">
                <input type="text" placeholder="Enter your name" class="form-control lor-text-input"/>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-10 col-md-4 py-2 d-grid">
                <button type="submit" class="btn btn-primary lor-button-white">LET'S PLAY</button>
                </div>
            </div>
         </form>
          <div class="row justify-content-center">
            <div class="col-6 col-md-4">
              <img src="{{ asset('img/lanterns.svg') }}"/>
            </div>
          </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    </body>
</html>