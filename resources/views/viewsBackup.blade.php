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
                    <img src="{{ asset('img/flip.svg') }}" class="img-fluid"/>
            </div>
          </div>
          <div class="row justify-content-center">
            <div id="cardsFlip"> 
                <div class="container"> 
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
                    <div class="col-md-3"> 
                      
                      <div class="flipContainer">
                        <div class="cardImage">
                            <div class="front face">
                                  <img src="{{ asset('img/regular-lantern.svg') }}" id="imgCard"  style="height: 30%; width: 30%;" />
                            </div>
                            <div class="back center">  <img class="image" oppened="0" index="{{$index}}" src="{{ asset('img/'.$cards[$index].'.svg') }}"   style="height: 30%; width: 30%;" /></div>
                        </div>
                    </div>
                  </div>
                
                @endfor
      
                <input type="hidden" class="other_image" value="{{ asset('img/'.$cards[($index ==0 )?1:0].'.svg') }}" />
             </div>      
           </div>

        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
   
        <script>
       
            var ClickCount =0;
            var index = 0;
            var clickedArr = new Array();
            
                       $('.flipContainer').click(function() {

                        if($(this).find( ".image" ).attr('oppened') == '0')
                        {
                          var clickLimit = 16; //Max number of clicks
                          ClickCount++;

                          if(ClickCount <= clickLimit) {

                                $(this).addClass('active');
                                index = $(this).find( ".image" ).attr('index');
                                $(this).find( ".image" ).attr('oppened','1');
                                clickedArr.push(index)

                              if(ClickCount == clickLimit) {
                                console.log(clickedArr);
                              //  alert("You can not click "+clickLimit+" times.");
                              
                              // $.post("/sendResult",
                              //       {
                              //         won: "Donald Duck",
                              //         city: "Duckburg"
                              //       },
                              //       function(data, status){
                              //         alert("Data: " + data + "\nStatus: " + status);
                              //       });
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
   
   
   
   
   
    </body>
</html>