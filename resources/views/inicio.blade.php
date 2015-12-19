@extends('layout.publicalayout')

@section('content')

        <div  class="hidden-xs col-xs-2 hidden-sm col-sm-2  col-md-2 col-lg-2  ">
        		<img src="{{asset('images')}}/ad2.jpg" class="img-responsive ads-cls"/> </img>
        	</div>
        	<div class="col-md-8 div-center">
            	<div class="row">
                	<div id="logo" class="col-md-10">
                    	<a href="{{asset('/')}}" >
                        	<img src="{{ asset('images/logo.png') }}">
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
                                  <!-- Indicators
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

                                  </ol>-->

                                  <!-- Wrapper for slides -->
                                  <div class="carousel-inner">
                                      <?php
                                        $Counter = 1;
                                      ?>
                                    @foreach($imagenes as $slide)
                                    <div class="item <?php echo ($Counter == 1 )? 'active' : '';   ?>">

                                          <img src="{{ asset('uploads') }}/{{$slide->archivo}}" alt="..." class="image-size-slide">
                                          <div class="carousel-caption">
                                              <h3>Sports & Marketing</h3>
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

                              <div class="input-group searchinput">
                                <input type="text" class=" vertical form-control color-text-g" id="qry" placeholder="Introduzca nombre de corredor" onkeypress="return runScript(submit)">
                                <span class="input-group-btn goSearch">
                                 <button class="btn btn-primary vertical-correc"  id="goSearch" type="submit"><i class="fa fa-search fa-x5"></i> Buscar</button>
                               </span>
                            </div>



                          </div>
                      </div>
                    </div>
                    <div class="row">
                    <div class="row center col-md-12">
                      <h1>Carreras Recientes</h1>
                        @foreach($runners as $runn)
                            	<div class="col-lg-3 col-md-4 col-xs-6">
                            	    <a href="{{ asset('carrera') }}/{{$runn->id}}" class="thumbnail"> <img src="{{ $runn->imagen}}"> </img></a>
                            	    <!--<p class="text-justify images-caption">{{-- $runn->nombre --}}</p>-->
                                </div>
                        @endforeach
                    </div>



                    <div class="row center col-md-12">
                      <h1>Favoritas</h1>

                            	<div class="col-lg-3 col-md-4 col-xs-6">
                            	    <!--<a href="carrera/{{-- $runn->id --}}" class="thumbnail"> <img src="/images/placeholder.jpg"> </img></a>
                            	    <p class="text-justify images-caption">{{-- $runn->nombre --}}</p>-->
                                </div>

                    </div>
                    </div>
                </div>
        	</div>
       	 	<div class="hidden-xs col-xs-2 hidden-sm col-sm-2  col-md-2 col-lg-2 ">
        		<img src="{{ asset('images') }}/ad2.jpg" class="img-responsive  ads-cls"/> </img>
        	</div>


@endsection

@section('script')
<script type="text/javascript">
     jQuery(document).ready(function($) {


        $('#goSearch').on('click', function(e){
            var searchUrl = 'http://' + document.location.hostname + "/corredores/id/"+$('#qry').val();
            //alert(searchUrl);
            window.location.href = searchUrl;
        });// onchange
    });// jQuery
</script>

<script type="text/javascript">
function runScript(e) {
  if (e.keyCode == 13) {
      var tb = document.getElementById("qry");
      eval(tb.value);
      return false;
  }
}
</script>
@endsection
