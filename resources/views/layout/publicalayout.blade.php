<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <title>T4M SPORTS</title>
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/bootstrap/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="/bootstrap/css/bootstrap-ligthbox.min.css" rel="stylesheet" type="text/css">
    <link href="/bootstrap/ekko-ligthbox.min.css" rel="stylesheet" type="text/css" />
    <link href="/bootstrap/css/style.css" rel="stylesheet" type="text/css">
    


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
    <script src="/bootstrap/js/jquery.js"></script>
    <script src="/bootstrap/js/jquery-1.11.3.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/bootstrap/js/bootstrap.min.js"></script>
    <script src="/bootstrap/js/ekko-lightbox.min.js"></script>
     @yield('script')
</body>

</html>