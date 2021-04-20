<!doctype html>
<html lang="en">
    <head>
        
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">

    </head>
    <body>
        <div class="container">
                <div class="row justify-content-center align-items-end vh-100">
                  <div class="row justify-content-center ">
                    <div class="col-10 col-md-5 py-4">
                      <img src="{{ asset('img/revive.svg') }}" class="img-fluid"/>
                    </div>
                  </div>
                  <div class="row justify-content-center">
                    <div class="col-10 col-md-5 winner">
                      <img src="{{ asset('img/everybody-winner.png') }}"/>
                    </div>
                  </div>
                <div class="row justify-content-center">
                    <div class="col-12 col-md-6 moon">
                    
                      <img src="{{ asset('img/moon.png') }}"/>
                    </div>
                  </div>
                  <div class="row justify-content-center">
                    <div class="col-10 col-md-3 pt-4">
                      <!-- <div class="light"></div> -->
                      <img src="{{ asset('img/enter-name.svg') }}"/>
                    </div>
                  </div>
                  <form action="/createUser" method="POST">
                    @csrf
                    <input type="hidden" name="ref" value="{{ (isset($_GET['ref']))?$_GET['ref']:'' }}" />
                    <div class="row justify-content-center">
                        <div class="col-10 col-md-4 py-2">
                        <input type="text" name="email" placeholder="Enter your email" class="form-control lor-text-input" required/>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-10 col-md-4 py-2">
                        <input type="text" name="name" placeholder="Enter your name" class="form-control lor-text-input" required/>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                  
                        <div class="col-10 col-md-4 py-2 d-grid">
                          <a href="/play">
                        <button type="submit" class="btn btn-primary lor-button-white">LET'S PLAY</button> 
                      </a>
                        </div>
                      </a>
                    </div>
                </form>
                <div class="col-md-12"></div>
                  <div class="row justify-content-center">
                    <div class="col-10 col-md-5">
                      <img src="{{ asset('img/lanterns.svg') }}"/>
                    </div>
                  </div>
                  <div class="row justify-content-center">
                    <div class=" col-md-4">
                      <img src="{{ asset('img/logos.svg') }}"/>
                    </div>
                  </div>
                </div>
            
          </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    </body>
</html>