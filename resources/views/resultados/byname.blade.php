@extends('layout.publicalayout')

@section('content')
        <div  class="col-xs-2 hidden-xs">
        		CONTENT 1
        	</div>
        	<div class="col-md-8 div-center">
            	<div class="row">
                	<div id="logo" class="col-md-12">
                    	<a href="/" >
                        	<img src="/images/logo.png"/>
                        </a> 
                    </div>
                    <div class="row">
                        
                        <div class="col-md-12 banner">
                        	
                            <img src="/images/banner.jpg" class="img-responsive internal-hiegth"/>
                        	
                       		<div class="col-md-8 search-internal ">
                            	<input type="text" class="searchinput vertical" placeholder="Busca un corredor">
                                <button class="searchbutton vertical"> </button> 				               	
                        	</div>
                        </div>
                    </div>
                    <h1>Corredores</h1>
                    <div class="row center col-md-12">
                        @foreach($images as $image)    
                            	<div class="col-lg-3 col-md-4 col-xs-6"> 
                            	    <a href="/uploads/{{$image->archivo}}" class="thumbnail" data-toggle="lightbox">
                            	         <img src="/uploads/{{$image->archivo}}"/>
                            	         
                            	         </a>
                            	    <p class="text-justify images-caption">{{ $image->etiquetas }}</p>
                                </div>
                        @endforeach
                    </div>
                </div>
        	</div>
       	 	<div class="col-xs-2 hidden-xs">
        		CONTENT 3
        	</div>

@endsection
