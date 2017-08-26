<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>{{$titulo}}</title>
    
    <link rel="icon" type="image/png" href="{{$favicon}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900'>
    <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Montserrat:400,700'>
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
    <link href="{{asset('css/toastr.min.css')}}" rel="stylesheet" />
    
</head> 
<body>
   
<div class="form">
  <div class="thumbnail">
      <img src="{{asset('img/log.png')}}"style="
    width: 300px;
    margin: -120px;
"/>
  </div>
 
  <div class="login-form">
  {{ csrf_field() }}
    <input type="text" placeholder="Usuario" id="username"/>
    <input type="password" placeholder="Clave" id="password"/>
    <button id="acceder">Acceder</button> 
</div>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  
<script src="../node_modules/toastr/build/toastr.min.js"></script>
     
  <script src="{{asset('js/login/index.js')}}"></script>
  <script>
         var BASE_URL = '{{url('/')}}/';
    </script>

</body>
</html>
