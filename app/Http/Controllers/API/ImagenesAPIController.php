<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use Mitul\Controller\AppBaseController;
use Mitul\Generator\Utils\ResponseManager;
use App\Models\Imagenes;
use Illuminate\Http\Request;
use App\Libraries\Repositories\ImagenesRepository;
use Response;
use Schema;

class ImagenesAPIController extends AppBaseController
{

	/** @var  ImagenesRepository */
	private $imagenesRepository;

	function __construct(ImagenesRepository $imagenesRepo)
	{
		$this->imagenesRepository = $imagenesRepo;
	}

	/**
	 * Display a listing of the Imagenes.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
	    $input = $request->all();

		$result = $this->imagenesRepository->search($input);

		$imagenes = $result[0];

		return Response::json(ResponseManager::makeResult($imagenes->toArray(), "Imagenes retrieved successfully."));
	}

	public function search($input)
    {
        $query = Imagenes::query();

        $columns = Schema::getColumnListing('$TABLE_NAME$');
        $attributes = array();

        foreach($columns as $attribute)
        {
            if(isset($input[$attribute]))
            {
                $query->where($attribute, $input[$attribute]);
            }
        }

        return $query->get();
    }

	/**
	 * Show the form for creating a new Imagenes.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created Imagenes in storage.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(Imagenes::$rules) > 0)
            $this->validateRequest($request, Imagenes::$rules);

        $input = $request->all();

		$imagenes = $this->imagenesRepository->store($input);

		return Response::json(ResponseManager::makeResult($imagenes->toArray(), "Imagenes saved successfully."));
	}

	/**
	 * Display the specified Imagenes.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$imagenes = $this->imagenesRepository->findImagenesById($id);

		if(empty($imagenes))
			$this->throwRecordNotFoundException("Imagenes not found", ERROR_CODE_RECORD_NOT_FOUND);

		return Response::json(ResponseManager::makeResult($imagenes->toArray(), "Imagenes retrieved successfully."));
	}

	/**
	 * Show the form for editing the specified Imagenes.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified Imagenes in storage.
	 *
	 * @param  int    $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$imagenes = $this->imagenesRepository->findImagenesById($id);

		if(empty($imagenes))
			$this->throwRecordNotFoundException("Imagenes not found", ERROR_CODE_RECORD_NOT_FOUND);

		$input = $request->all();

		$imagenes = $this->imagenesRepository->update($imagenes, $input);

		return Response::json(ResponseManager::makeResult($imagenes->toArray(), "Imagenes updated successfully."));
	}

	/**
	 * Remove the specified Imagenes from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$imagenes = $this->imagenesRepository->findImagenesById($id);

		if(empty($imagenes))
			$this->throwRecordNotFoundException("Imagenes not found", ERROR_CODE_RECORD_NOT_FOUND);

		$imagenes->delete();

		return Response::json(ResponseManager::makeResult($id, "Imagenes deleted successfully."));
	}
	
	
	public function tipo_imagen($tipoImagen, Request $request)
	{

		//$contratos= \DB::table('contratos')->where('estado','=', $estado);
		$query = Imagenes::query();
		$query->where('tipo_imagen', '=', $tipoImagen);
		$imagenes = $query->get();
		return Response::json(ResponseManager::makeResult($imagenes->toArray(), "Imagenes por tipo."));
	}
}
