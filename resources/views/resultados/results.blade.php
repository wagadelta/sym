@extends('layout.publicalayout')

@section('content')
       
        <div  class="col-xs-2 hidden-xs">
        		CONTENT 1
        	</div>
        	<div class="col-md-8 div-center">
            	<div class="row">
                	<div id="logo" class="col-md-12">
                    	<a href="/" >
                        	<img src="/images/logo.png">
                        </a> 
                    </div>
                    
                    <div class="row">
                      <div class="col-md-12 banner">
                         <img src="/images/banner.jpg" class="img-responsive internal-hiegth"/>
                      </div>
                    </div>
                    <div class="row">
                        <div class="row center col-md-12">
                              @include('flash::message')
        
                                <div class="row">
                                    <h1 class="pull-left"> <i class="fa fa-child"></i> Resultado de búsqueda {{ $qry }}</h1>
                                    <!--<a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('corredores.create') !!}">Add New</a>-->
                                </div>
                                
                                 <div class="row">
                                    @if($corredores->isEmpty())
                                        <div class="well text-center color-text-b"> <h5> No hay corredores para esta busqueda. </h5></div>
                                    @else
                                    
                                        <table class="table table-striped table-condensed color-text-b">
                                            <thead>
                                            <th>Nombres</th>
                        			<th>Apellidos</th>
                        			<th>Imagenes</th>
                                            </thead>
                                            <tbody>
                                             
                                            @foreach($corredores as $corredor)
                                                <tr>
                                                    <td>{!! $corredor->nombres !!}</td>
                                					<td>{!! $corredor->apellidos !!}</td>
                                					<td><a href ="/corredores/{!! $corredor->id !!}/images">Ver Fotos</a></td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        
                                    @endif
                                </div>
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