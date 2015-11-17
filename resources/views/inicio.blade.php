@extends('layout.publicalayout')

@section('content')
        @include('flash::message')
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
                                  <ol class="carousel-indicators">
                                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="1" ></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                                  </ol>
                                 
                                  <!-- Wrapper for slides -->
                                  <div class="carousel-inner">
                                    <div class="item active">
                                      <img src="/images/banner.jpg" alt="...">
                                      <div class="carousel-caption">
                                          <h3>Caption Text</h3>
                                      </div>
                                    </div>
                                    <div class="item">
                                      <img src="/images/banner.jpg" alt="...">
                                      <div class="carousel-caption">
                                          <h3>Caption Text</h3>
                                      </div>
                                    </div>
                                    <div class="item">
                                      <img src="/images/banner.jpg" alt="...">
                                      <div class="carousel-caption">
                                          <h3>Caption Text</h3>
                                      </div>
                                    </div>
                                  </div>
                                 
                                  <!-- Controls -->
                                  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                  </a>
                                  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                  </a>
                                </div> <!-- Carousel -->
                        	
                       		<div class="col-md-8 search ">
                            	<input type="text" class="searchinput vertical" placeholder="Busca un corredor">
                                <button class="searchbutton vertical"> </button> 				               	
                        	</div>
                        </div>
                        
                    </div>
                    <h1>Últimas Carreras</h1>
                    <div class="row center col-md-12">
                        @foreach($images as $imagenes)    
                            	<div class="col-lg-3 col-md-4 col-xs-6"> 
                            	    <a href="#" class="thumbnail"> <img src="/uploads/{{ $imagenes->archivo }}"> </img></a>
                                </div>
                                
                        @endforeach
                    </div>
                </div>
        	</div>
       	 	<div class="col-xs-2 hidden-xs">
        		CONTENT 3
        	</div>


@endsection
