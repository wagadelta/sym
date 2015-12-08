<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <title>T4M SPORTS</title>
    <link href="{{ asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('bootstrap/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('bootstrap/css/bootstrap-ligthbox.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('bootstrap/ekko-ligthbox.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('bootstrap/css/style.css')}}" rel="stylesheet" type="text/css">
    


</head>

<body>
	<div class="container-fluid" id="contenedor">
    	<div class="row">
        
            @yield('content')
    		
         </div>
    </div>
    
    <footer>
        <div class="container">
            <p class="text-center">Todos los derechos reservados 
                <a href="http://www.sportsandmarketing.com/site/index.php" 
                    class="linkCopy" target="_blank">Sports & Marketing</a>
                    , Guatemala Centro América &copy;</p>    
        </div>
    </footer>
       
    <!-- jQuery -->
    <script src="{{ asset('bootstrap/js/jquery.js')}}" type="text/javascript"></script>
    <script src="{{ asset('bootstrap/js/jquery-1.11.3.min.js')}}" type="text/javascript"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('bootstrap/js/ekko-lightbox.min.js')}}" type="text/javascript"></script>
     @yield('script')
</body>

</html>