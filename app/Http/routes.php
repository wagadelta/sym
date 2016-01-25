<?php
use Illuminate\Database\Eloquent\Model;
use App\Models\Ubicaciones;
use App\Models\Corredores;
use App\Models\Imagenes;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

\Event::subscribe('App\Subscriber\Auth');

Route::get('/', 'InicioController@index');
Route::get('carrera/{id}','InicioController@locationRunner');
Route::get('/carrera/location/{id}', 'InicioController@runnerImgs');

// usage inside a laravel route
// Route::get('/intervention', function()
// {
//     $img = Image::make('foo.jpg')->resize(300, 200);

//     return $img->response('jpg');
// });

// Rout se comenta por seguridad activar si es necesario
/*route::get('/phpinfo', function(){
        if(extension_loaded('gd')) {
            echo '<pre>';
            print_r(gd_info());
            echo '</pre>';
        }
        else {
            echo 'GD is not available.';
        }

        if(extension_loaded('imagick')) {
            $imagick = new Imagick();
            echo '<pre>';
            print_r($imagick->queryFormats());
            echo '</pre>';
        }
        else {
            echo 'ImageMagick is not available.';
        }
    echo phpinfo();
});*/

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::group(['middleware' => 'auth'], function() {


    Route::resource('roles', 'RolesController');

    Route::get('roles/{id}/delete', [
        'as' => 'roles.delete',
        'uses' => 'RolesController@destroy',
    ]);


    Route::resource('users', 'UsersController');

    Route::get('users/{id}/delete', [
        'as' => 'users.delete',
        'uses' => 'UsersController@destroy',
    ]);

    Route::resource('bitacoras', 'BitacoraController');

    Route::get('bitacoras/{id}/delete', [
        'as' => 'bitacoras.delete',
        'uses' => 'BitacoraController@destroy',
    ]);
}); //middleware auth



Route::resource('api/carreras', 'API\CarrerasAPIController');

Route::resource('carreras', 'CarrerasController');

Route::get('carreras/{id}/delete', [
    'as' => 'carreras.delete',
    'uses' => 'CarrerasController@destroy',
]);


Route::resource('corredores', 'CorredoresController');


// Route Searchs by runners in races
Route::get('corredores/id/{qry?}', 'CorredoresController@searchByName');
Route::get('corredores-imagenes/{id?}/{qry?}', 'InicioController@searchByTag');
Route::get('corredores/{id?}/{id_run?}/images', 'ImagenesController@searchById');


Route::resource('api/corredores', 'API\CorredoresAPIController');



Route::get('corredores/{id}/delete', [
    'as' => 'corredores.delete',
    'uses' => 'CorredoresController@destroy',
]);


Route::resource('api/ubicaciones', 'API\UbicacionesAPIController');

Route::resource('ubicaciones', 'UbicacionesController');

Route::get('ubicaciones/{id}/delete', [
    'as' => 'ubicaciones.delete',
    'uses' => 'UbicacionesController@destroy',
]);

Route::post('/imagen/upload', 'ImagenesController@upload');
Route::get('/imagenes/upload', 'ImagenesController@uploadImages');


Route::resource('api/imagenes', 'API\ImagenesAPIController');
Route::get('api/imagenes/tipo_imagen/{tipo_imagen}', 'API\ImagenesAPIController@tipo_imagen');
Route::post('imagenes/etiquetar/{id}', 'ImagenesController@updateEtiquetar');
Route::get('imagenes/etiquetar', 'ImagenesController@getCarrera');
Route::get('imagenes/etiquetar/carrera/{idCarrera}', 'ImagenesController@etiquetar');
Route::resource('imagenes', 'ImagenesController');

Route::get('imagenes/{id}/delete', [
    'as' => 'imagenes.delete',
    'uses' => 'ImagenesController@destroy',
]);

Route::post('/image-upload', 'ImagenesController@upload');
Route::get('login', 'WelcomeController@index');
Route::get('getUbicaciones/{id}','UbicacionesController@byCarrera');

// upload csv in table Corredores
/*Route::get('csv',function(){
  if(($handle = fopen(public_path().'/images/files-up/corredores-actual.csv','r')) !== FALSE)
  {
    while(($data = fgetcsv($handle, 1000, ',')) !== FALSE)
    {
      $corredores = new Corredores();
      $corredores->nombres = $data[0];
      $corredores->apellidos = $data[1];
      $corredores->slug = $data[2];
  		$corredores->bib_number = $data[3];
  		$corredores->id_carrera = $data[4];
			$corredores->etiqueta_count = $data[5];
      $corredores->created_at = $data[6];
			$corredores->updated_at = $data[7];
      $corredores->save();
    }
    fclose($handle);
  }
  return Corredores::all();
});*/

/* Upload images old - races
Route::get('csv-imgs',function(){
  if(($handle = fopen(public_path().'/images/files-up/tbl_imagenes.csv','r')) !== FALSE)
  {
    while(($data = fgetcsv($handle, 1000, ',')) !== FALSE)
    {
			$imagenes = new Imagenes();
			$imagenes->id_fotografo = $data[0];
			$imagenes->id_etiquetador = $data[1];
			$imagenes->path = $data[2];
			$imagenes->archivo = $data[3];
			$imagenes->slug = $data[4];
			$imagenes->tipo_imagen = $data[5];
			$imagenes->etiquetas = $data[6];
			$imagenes->fecha_etiqueta = $data[7];
			$imagenes->id_ubicacion = $data[8];
			$imagenes->estado = $data[9];
			$imagenes->is_blocked = $data[10];
			$imagenes->created_at = $data[11];
			$imagenes->created_at = $data[12];
			$imagenes->save();
    }
    fclose($handle);
  }
  return Imagenes::all();
});

// Upload Locate no register
Route::get('csv-ubicate',function(){

	if(($handle = fopen(public_path().'/images/files-up/ubicaciones.csv','r')) !== FALSE)
	{
		while(($data = fgetcsv($handle, 1000, ',')) !== FALSE)
		{
			$locate = new Ubicaciones();
			$locate->id_carrera = $data[0];
			$locate->nombre = $data[1];
			$locate->slug = $data[2];
			$locate->direccion = $data[3];
			$locate->created_at = $data[4];
			$locate->updated_at = $data[5];
			$locate->save();
		}
		fclose($handle);
	}
	return Ubicaciones::all();

});*/
