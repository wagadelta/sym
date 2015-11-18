@extends('layout.publicalayout')

@section('content')
       
        <div  class="col-xs-2 hidden-xs">
        		CONTENT 1
        	</div>
        	<div class="col-md-8 div-center">
            	<div class="row">
                	<div id="logo" class="col-md-12">
                    	<a href="#" >
                        	<img src="/images/logo.png">
                        </a> 
                    </div>
                    
                    <div class="row">
                      <div class="col-md-12 banner">
                         <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="3000">
                                    <!-- Indicators -->
                                                	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="3000">
                                  <!-- Indicators -->
                                  <ol class="carousel-indicators">
                                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                                  </ol>
                                 
                                  <!-- Wrapper for slides -->
                                  <div class="carousel-inner">
                                      <?php  
                                        $Counter = 1;
                                      ?>
                                    @foreach($imagenes as $slide)
                                    <div class="item <?php echo ($Counter == 1 )? 'active' : '';   ?>">
                                        
                                          <img src="uploads/{{$slide->archivo}}" alt="..." style="width:auto;height:auto">
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
                        
                              <div class="col-md-8 search ">
                              <input type="text" class="searchinput vertical" id="qry" placeholder="Busca un corredor">
                              <button class="searchbutton vertical" id="goSearch"> </button> 				               	
                              </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                    <div class="row center col-md-12">
                      <h1>Carreras Recientes</h1>
                        @foreach($runners as $runn)    
                            	<div class="col-lg-3 col-md-4 col-xs-6"> 
                            	    <a href="carrera/{{$runn->id}}" class="thumbnail"> <img src="/images/placeholder.jpg"> </img></a>
                            	    <p class="text-justify images-caption">{{ $runn->nombre }}</p>
                                </div>
                        @endforeach
                    </div>
                    </div>
                </div>
        	</div>
       	 	<div class="col-xs-2 hidden-xs">
        		CONTENT 3
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