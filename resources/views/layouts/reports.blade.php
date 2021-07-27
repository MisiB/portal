<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Fiance Reports</title>
   
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    

    <div class="wrapper">
        
        <div id="content">

           
      
             <div>
             @yield('content')
             </div>
         </div>
    </div>

    <script src="{{ mix('js/app.js') }}" defer></script>
</body>

</html>