@extends('layout.publicalayout')

@section('content')
       
        <div  class="col-lg-2 col-md-2 hidden-xs">
        		<img src="{{asset('/uploads')}}/ad2.jpg" class="img-responsive"/>
        	</div>
        	<div class="col-lg-8 col-md-8 col-xs-8 div-center">
            	<div class="row">
                	<div id="logo" class="col-lg-8 col-md-8 col-xs-6">
                    	<a href="/" >
                        	<img src="{{asset('/images/logo.png')}}">
                        </a> 
                    </div>
                    <div id="logo" class="col-lg-2 col-md-2 col-xs-6">
                    	<a href="#" >
                        	Registro
                        </a> 
                        |
                        <a href="#" >
                        	Ingresar
                        </a> 
                        
                    </div>
                    
                    <div class="row">
                        
                        <div class="col-md-8 search-internal-slide">
                        	 
                             <div class="input-group searchinput">
                                <input type="text" class=" vertical form-control color-text-g" id="qry" placeholder="Nombre/Número corredor" >
                                <input type="hidden" name="oculto" id="{{$id}}"/>
                                <span class="input-group-btn goSearch">
                                 <button class="btn btn-primary vertical-correc"  id="goSearch" type="submit"><i class="fa fa-search fa-x5"></i> Buscar</button>  
                               </span>
                            </div>
                                
                        	
                       		<!--div class="col-lg-8 col-md-8 col-xs-8 search-internal ">
                            					               	
                        	</div>-->
                        </div>
                    </div>
                    
                        <h1>Carrera: {{ $name }}</h1>
                    
                    <div class="row center col-lg-12 col-md-12 col-xs-12">
                        @foreach($allImgsRun as $image)    
                            <div class="col-lg-3 col-md-4 col-xs-6">
                            	    <div> 
                            	    <a href="/uploads/{{$image->archivo}}" class="thumbnail color-text-b" 
                            	            data-toggle="lightbox" 
                            	             data-footer="<a href='/uploads/{{$image->archivo}}' 
                            	                    download='{{$image->archivo}}'>
                            	                        <i class='fa fa-download fa-2x' title='Descargar imagen {{$image->archivo}}'>
                            	                           </i></a> " > 
                            	    
                            	         <img src="{{ asset('/uploads')}}/{{$image->archivo}}"/>
                            	      </a>
                                	      
                                    </div>
                                </div>
                        @endforeach
                        
                    </div>
                    <div>
                        <?php echo $allImgsRun->render(); ?>
                    </div>
                </div>
        	</div>
       	 	<div class="col-lg-2 col-md-2 hidden-xs">
        		<img src="{{asset('/uploads')}}/ad2.jpg" class="img-responsive"/>
        	</div>


@endsection


@section('script')

        <script type="text/javascript">
                
                jQuery(document).ready(function($) {
         
            if(isNaN($('#qry').val())){
                $('#goSearch').on('click', function(e){
                    var searchUrl = 'http://' + document.location.hostname + "/corredores/{{$id}}/"+$('#qry').val();
                    //alert(searchUrl);
                    window.location.href = searchUrl;
                    });// onchange
                
                }else{
                   $('#goSearch').on('click', function(e){
                    var searchUrl = 'http://' + document.location.hostname + "/corredores-nombre/{{$id}}/"+$('#qry').val();
                    //alert(searchUrl);
                    window.location.href = searchUrl;
                    });// onchange 
                    
                }     
                    
                });// jQuery
            
        
        
        
            
            $(document).delegate('*[data-toggle="lightbox"]', 'click', function(event) {
                event.preventDefault();
                
                $(this).ekkoLightbox();
                
                
            }); 
        </script>
@endsection 
