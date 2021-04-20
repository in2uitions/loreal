<!doctype html>
<html lang="en">
    <head>
        
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
  
      <style>
      
         #canvas {
         display: block;
         width: 100%;
         height: 100%;
         }
         body.o-start #canvas {
         cursor: none;
         }
         .dg.main .close-button.close-bottom{
           display:none;
         }
      </style>
      <script>
         window.console = window.console || function(t) {};
      </script>
      <script>
         if (document.location.search.match(/type=embed/gi)) {
           window.parent.postMessage("resize", "*");
         }
      </script>
    </head>
    <body>
    <canvas id="canvas" ></canvas>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-6 col-md-5 py-4">
                    <img src="{{ asset('img/flip.png') }}" class="img-fluid"/>
            </div>
          </div>
          <!-- <div class="row justify-content-center">
            <div class="col-10 col-md-5 py-4">
              <img src="{{ asset('img/shimmer.svg') }}" class="img-fluid"/>
            </div>
          </div> -->
          <div class="row justify-content-center">
            <div id="cardsFlip"> 
                  <div class="row justify-content-center ">
                    <div class="col-10 col-md-5 ">
                      <div class="row justify-content-center bg-img">
                        @php $index = rand(0,1);$spotArr = array(); @endphp
                        @for($i =0 ;$i < 16;$i++) 
            
                        @php
                        
                        if($win_per != 0)
                        {
                          if($win_per != 100)
                          {
                            $index = rand(0,1);
                          }
                            
                          
                  
                          $counts = array_count_values($spotArr);
                          if(!isset($counts[$index]))
                          {
                            $counts[$index] = 0;
                          }
                          if($win_per == 50)
                          {
                            $div=2;
                          }
                          if($win_per == 75)
                          {
                            $div= 3;
                          }
                          if($win_per == 100)
                          {
                            $div=1;
                          }
                          
                          if($counts[$index]+1 <= 16/$div)
                          {
                            
                            array_push($spotArr,$index);
                          }
                          else{
                            $index = ($index == 1)?0:1;
                            array_push($spotArr,$index);
                          }
                        }
                        @endphp
                        
                          <div class="col-md-3 col-3 px-0 px-md-3"> 
                            
                              <div class="flipContainer">
                                <div class="cardImage">
                                    <div class="front face">
                                          <img src="{{ asset('img/regular-lantern.svg') }}" id="imgCard"  style="height: 100%; width: 100%;" />
                                          <div class="light"></div>
                                    </div>
                                    <div class="back center">  <img class="image" oppened="0" index="{{$index}}" src="{{ asset('img/'.$cards[$index].'.svg') }}"   style="height: 100%; width: 100%;" /></div>
                                </div>
                            </div>
                          </div>
                      
                      @endfor
                    </div>
                  </div>
                <input type="hidden" class="other_image" value="{{ asset('img/'.$cards[($index ==0 )?1:0].'.svg') }}" />
           
           </div>
           <div class="row justify-content-center">
            <div class=" col-md-4 py-2">
              <img src="{{ asset('img/logos.svg') }}"/>
            </div>
          </div>

        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
   
        <script>
       
            var ClickCount =0;
            var index = 0;
            var clickedArr = new Array();
        //     function preventBack() {
        //     window.history.forward(); 
        // }
          
        // setTimeout("preventBack()", 0);
          
        window.onunload = function () { null };
            
                       $('.flipContainer').click(function() {

                        if($(this).find( ".image" ).attr('oppened') == '0')
                        {
                          var clickLimit = 2; //Max number of clicks
                          ClickCount++;

                          if(ClickCount <= clickLimit) {

                                $(this).addClass('active');
                                index = $(this).find( ".image" ).attr('index');
                                $(this).find( ".image" ).attr('oppened','1');
                                clickedArr.push(index)

                              if(ClickCount == clickLimit) {
                                console.log(clickedArr);

                                const allEqual = arr => arr.every( v => v === arr[0] )
                                var won = allEqual(clickedArr)
                              //  alert("You can not click "+clickLimit+" times.");
                              
                              $.post("/sendResult",
                                    {
                                      won: won,
                                      location: "{{ $location->id }}",
                                      _token: "{{ csrf_token() }}",
                                      user: "{{ $user->id }}"
                                    },
                                    function(data, status){
                                   
                                      if(won)
                                      {
                                        window.location.href = "/promoCode?barcode="+data.barcode_code+"&url="+data.url+"&type="+data.type+"&reward="+data.reward;
                                      }
                                      else{
                                        window.location.href = "/loser";
                                      }
                                     // alert("Data: " + data + "\nStatus: " + status);
                                    });
                              }
                              else
                              {
                                
                                if('{{$win_per}}' == '0')
                                {
                                  
                                  index = (index == 1)?0:1;
                                  console.log(index);
                                  
                                  $( ".image" ).each(function() {
                                        if($(this).attr('oppened') == '0')
                                        {
                                          $( this ).attr("index",index);
                                          
                                          $( this ).attr("src",$('.other_image').attr('value') );
                                        }
                                    
                                    });
                                }

                                

                              }
                            }
                        }

                         });  
        
                </script>
   
      <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/101/three.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/dat-gui/0.7.5/dat.gui.min.js"></script>
      <script src="{{ asset('js/star.js')}}"></script>
   
   
   
   
    </body>
</html>