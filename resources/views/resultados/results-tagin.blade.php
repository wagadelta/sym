@extends('layout.publicalayout')

@section('content')
       
        <div  class="hidden-xs col-xs-2 hidden-sm col-sm-2  col-md-2 col-lg-2">
        		<img src="{{asset('/uploads')}}/ad2.jpg" class="img-responsive"/>
        	</div>
        	<div class="col-lg-8 col-md-8 col-xs-12 div-center">
            	<div class="row">
                	<div id="logo" class="col-xs-6 col-sm-8 col-md-8 col-lg-8 ">
                    	<a href="/" >
                        	<img src="/images/logo.png">
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
                      
                         
                      </div>
                    
                    <div class="row">
                        <div class="row center col-lg-12 col-md-12 col-xs-12">
                              @include('flash::message')
        
                                <div class="row col-lg-12 col-md-12 col-xs-12">
                                    <h1 class="pull-left"> <i class="fa fa-child"></i> Resultado de búsqueda {{ $qry }}</h1>
                                    <!--<a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('corredores.create') !!}">Add New</a>-->
                                </div>
                                
                                 <div class="row col-lg-12 col-md-12 col-xs-12 centerT">
                                    @if($allImgsRun->isEmpty())
                                        <div class="well text-center color-text-b"> <h5> No hay corredores para esta busqueda. </h5></div>
                                    @else
                                    
                                        <table class="well table table-striped tablb-condensed color-text-b ">
                                            <thead>
                                            <th>Nombres</th>
                        			<th>Apellidos</th>
                        			<th>Imagenes</th>
                                            </thead>
                                            <tbody>
                                             
                                            @foreach($allImgsRun as $corredor)
                                                <tr>
                                                    <td>{!! $corredor->nombres !!}</td>
                                					<td>{!! $corredor->apellidos !!}</td>
                                					<td>
                                					    <a href ="/corredores/{!! $corredor->id !!}/images" title="Ver imágenes relacionadas">
                                					    <i class="fa fa-camera fa-2x"></i>
                                					    </a>
                                					</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        
                                    @endif
                                </div>
                                
                                <div class="row center">
                                    <div class="hidden-xs col-xs-1 hidden-sm col-sm-2 col-md-2 col-lg-2">
                                        
                                    </div>
                                    
                                    <div class="col-xs-10 col-sm-8 col-md-8 col-lg-8 text-center">
                                        <?php echo $allImgsRun->render(); ?>
                                    </div>
                                    
                                    <div class="hidden-xs col-xs-1 hidden-sm col-sm-2 col-md-2 col-lg-2">
                                
                                    </div>
                               </div>
                        </div>
                    </div>
                </div>
        	</div>
       	 	<div  class="hidden-xs col-xs-2 hidden-sm col-sm-2  col-md-2 col-lg-2">
        		<img src="{{asset('/uploads')}}/ad2.jpg" class="img-responsive"/>
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