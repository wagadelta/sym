@extends('layout.publicalayout')

@section('content')
       
        <div  class="col-lg-2 col-md-2 col-xs-0 hidden-xs">
        		<img src="/uploads/ad2.jpg" class="img-responsive"/> </img>
        	</div>
        	<div class="col-md-8 div-center">
            	<div class="row">
                	<div id="logo" class="col-md-10">
                    	<a href="#" >
                        	<img src="/images/logo.png">
                        </a> 
                    </div>
                    <div id="logo" class="col-md-2">
                    	<a href="#" >
                        	Registro
                        </a> 
                        |
                        <a href="#" >
                        	Ingresar
                        </a> 
                        
                    </div>
                    
                    <div class="row">
                      <div class="col-md-12 banner">
                         <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="10000">
                                    <!-- Indicators -->
                                  <!-- Indicators -->
                                  <ol class="carousel-indicators">
                                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="4"></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="5"></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="6"></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="7"></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="8"></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="9"></li>
                                    
                                  </ol>
                                 
                                  <!-- Wrapper for slides -->
                                  <div class="carousel-inner">
                                      <?php  
                                        $Counter = 1;
                                      ?>
                                    @foreach($imagenes as $slide)
                                    <div class="item <?php echo ($Counter == 1 )? 'active' : '';   ?>">
                                        
                                          <img src="uploads/{{$slide->archivo}}" alt="..." class="image-size-slide">
                                          <div class="carousel-caption">
                                              <h3>S&M</h3>
                                          </div>
                                      
                                    </div>
                                    <?php  
                                        $Counter++;
                                      ?>
                                    @endforeach
                                  </div>
                                 
                                  <!-- Controls -->
                                  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                  </a>
                                  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                  </a>
                              
                        </div>
                          <div class="col-md-8 search-internal-slide">
                            
                              <input type="text" class="searchinput vertical form-control" id="qry" placeholder="Busca un corredor" >
                              <button class="searchbutton vertical form-control" id="goSearch" type="submit"> </button>
                              
                          </div>
                      </div>
                    </div>
                    <div class="row">
                    <div class="row center col-md-12">
                      <h1>Carreras Recientes</h1>
                        @foreach($runners as $runn)    
                            	<div class="col-lg-3 col-md-4 col-xs-6"> 
                            	    <a href="carrera/{{$runn->id}}" class="thumbnail"> <img src="{{ $runn->imagen}}"> </img></a>
                            	    <p class="text-justify images-caption">{{ $runn->nombre }}</p>
                                </div>
                        @endforeach
                    </div>
                    
                    <div class="row center col-md-12">
                      <h1>Favoritas</h1>
                        
                            	<div class="col-lg-3 col-md-4 col-xs-6"> 
                            	    <!--<a href="carrera/{{$runn->id}}" class="thumbnail"> <img src="/images/placeholder.jpg"> </img></a>
                            	    <p class="text-justify images-caption">{{ $runn->nombre }}</p>-->
                                </div>
                        
                    </div>
                    </div>
                </div>
        	</div>
       	 	<div class="col-lg-2 col-md-2 col-xs-0 hidden-xs">
        		<img src="/uploads/ad2.jpg"/> </img>
        	</div>


@endsection

@section('script')
<script>
     jQuery(document).ready(function($) {
         
        
        $('#goSearch').on('click', function(e){
            var searchUrl = 'http://' + document.location.hostname + "/corredores/id/"+$('#qry').val();
            //alert(searchUrl);
            window.location.href = searchUrl;
        });// onchange
    });// jQuery
</script>
@endsection