@extends('layout.publicalayout')

@section('content')
       
        <div  class="col-lg-2 col-md-2 hidden-xs">
        		PUBLICIDAD
        	</div>
        	<div class="col-lg-8 col-md-8 col-xs-8 div-center">
            	<div class="row">
                	<div id="logo" class="col-lg-12 col-md-12 col-xs-12">
                    	<a href="/" >
                        	<img src="/images/logo.png">
                        </a> 
                    </div>
                    <div class="row">
                        
                        <div class="col-lg-12 col-md-12 col-xs-12 banner">
                        	
                            <img src="/images/banner.jpg" class="img-responsive internal-hiegth"></img>                        	
                        	
                       		<div class="col-lg-8 col-md-8 col-xs-8 search-internal ">
                            	<input type="text" class="searchinput vertical" placeholder="Busca un corredor">
                                <button class="searchbutton vertical"> </button> 				               	
                        	</div>
                        </div>
                    </div>
                    
                        <h1>Carrera: {{ $name }} </h1>
                    
                    <div class="row center col-lg-12 col-md-12 col-xs-12">
                        @foreach($allImgsRun as $immage)    
                            <div class="col-lg-3 col-md-4 col-xs-6">
                            	    <div> 
                            	    <a href="/uploads/{{$immage->archivo}}" class="thumbnail color-text-b" 
                            	            data-toggle="lightbox" 
                            	             data-footer="<a href='/uploads/{{$immage->archivo}}' 
                            	                    download='{{$immage->archivo}}'>
                            	                        <i class='fa fa-download fa-2x' title='Descargar imagen {{$immage->archivo}}'>
                            	                           </i></a> "  > 
                            	    
                            	         <img src="/uploads/{{$immage->archivo}}"/>
                            	      </a>
                            	    
                                    </div>
                                </div>
                        @endforeach
                        
                    </div>
                </div>
        	</div>
       	 	<div class="col-lg-2 col-md-2 hidden-xs">
        		PUBLCIDAD
        	</div>


@endsection


@section('script')
        <script type="text/javascript">
            
            $(document).delegate('*[data-toggle="lightbox"]', 'click', function(event) {
                event.preventDefault();
                
                $(this).ekkoLightbox();
                
                
            }); 
        </script>
@endsection 
