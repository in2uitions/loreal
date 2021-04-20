<!doctype html>
<html lang="en">
    <head>
        
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">

    </head>
    <body>
        <div class="container">
    
          <div id="notice" class="row justify-content-center align-items-end vh-100">
            <div class="col-10 col-md-5 pt-4 terms">
             <div class="description p-2"> 
                    <p>Your data is requested and it will be collected in order for us to be able to deliver your gift to you. It will be deleted once the competition comes to and end.
                    </p>
                    <div class="row justify-content-center">
                        <div class="col-10 py-2 d-grid">
                        <a href="/terms?ref={{$_GET['ref']}}" ><button type="submit" class="btn btn-primary lor-button-white-answer px-4 py-1">OKAY</button></a> </div>
                        </div>
                
                    </div>
                </div>
                <div class="col-md-12"></div>
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

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    </body>
</html>