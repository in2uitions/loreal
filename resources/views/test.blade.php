<html lang="en">
   <head>
      <meta charset="UTF-8">
      <link rel="apple-touch-icon" type="image/png" href="https://cpwebassets.codepen.io/assets/favicon/apple-touch-icon-5ae1a0698dcc2402e9712f7d01ed509a57814f994c660df9f7a952f3060705ee.png">
      <meta name="apple-mobile-web-app-title" content="CodePen">
      <link rel="shortcut icon" type="image/x-icon" href="https://cpwebassets.codepen.io/assets/favicon/favicon-aec34940fbc1a6e787974dcd360f2c6b63348d4b1f4e06c77743096d55480f33.ico">
      <link rel="mask-icon" type="" href="https://cpwebassets.codepen.io/assets/favicon/logo-pin-8f3771b1072e3c38bd662872f6b673a722f4b3ca2421637d5596661b4e2132cc.svg" color="#111">
      <title>CodePen - Shooting Star</title>
      <style>
         html,
         body {
         height: 100%;
         }
         body {
         margin: 0;
         background-color: #000;
         }
         #canvas {
         display: block;
         width: 100%;
         height: 100%;
         }
         body.o-start #canvas {
         cursor: none;
         }
         #message {
         position: absolute;
         right: 0;
         bottom: 0;
         left: 0;
         color: rgba(255, 255, 255, 0.7);
         font-family: Georgia, serif;
         font-size: 0.9rem;
         text-align: center;
         letter-spacing: 0.1em;
         pointer-events: none;
         opacity: 0;
         transition: opacity 500ms;
         }
         body.o-start #message {
         opacity: 1;
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
   <body translate="no" class="o-start">
      <canvas id="canvas" width="375" height="315" style="width: 375px; height: 315px;"></canvas>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/101/three.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/dat-gui/0.7.5/dat.gui.min.js"></script>
      <script src="{{ asset('js/star.js')}}"></script>
    
     
   </body>
</html>