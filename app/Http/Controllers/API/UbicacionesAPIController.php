<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use Mitul\Controller\AppBaseController;
use Mitul\Generator\Utils\ResponseManager;
use App\Models\Ubicaciones;
use Illuminate\Http\Request;
use App\Libraries\Repositories\UbicacionesRepository;
use Response;
use Schema;

class UbicacionesAPIController extends AppBaseController
{

	/** @var  UbicacionesRepository */
	private $ubicacionesRepository;

	function __construct(UbicacionesRepository $ubicacionesRepo)
	{
		$this->ubicacionesRepository = $ubicacionesRepo;
	}

	/**
	 * Display a listing of the Ubicaciones.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
	    $input = $request->all();

		$result = $this->ubicacionesRepository->search($input);

		$ubicaciones = $result[0];

		return Response::json(ResponseManager::makeResult($ubicaciones->toArray(), "Ubicaciones retrieved successfully."));
	}

	public function search($input)
    {
        $query = Ubicaciones::query();

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
	 * Show the form for creating a new Ubicaciones.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created Ubicaciones in storage.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(Ubicaciones::$rules) > 0)
            $this->validateRequest($request, Ubicaciones::$rules);

        $input = $request->all();

		$ubicaciones = $this->ubicacionesRepository->store($input);

		return Response::json(ResponseManager::makeResult($ubicaciones->toArray(), "Ubicaciones saved successfully."));
	}

	/**
	 * Display the specified Ubicaciones.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$ubicaciones = $this->ubicacionesRepository->findUbicacionesById($id);

		if(empty($ubicaciones))
			$this->throwRecordNotFoundException("Ubicaciones not found", ERROR_CODE_RECORD_NOT_FOUND);

		return Response::json(ResponseManager::makeResult($ubicaciones->toArray(), "Ubicaciones retrieved successfully."));
	}

	/**
	 * Show the form for editing the specified Ubicaciones.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified Ubicaciones in storage.
	 *
	 * @param  int    $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$ubicaciones = $this->ubicacionesRepository->findUbicacionesById($id);

		if(empty($ubicaciones))
			$this->throwRecordNotFoundException("Ubicaciones not found", ERROR_CODE_RECORD_NOT_FOUND);

		$input = $request->all();

		$ubicaciones = $this->ubicacionesRepository->update($ubicaciones, $input);

		return Response::json(ResponseManager::makeResult($ubicaciones->toArray(), "Ubicaciones updated successfully."));
	}

	/**
	 * Remove the specified Ubicaciones from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$ubicaciones = $this->ubicacionesRepository->findUbicacionesById($id);

		if(empty($ubicaciones))
			$this->throwRecordNotFoundException("Ubicaciones not found", ERROR_CODE_RECORD_NOT_FOUND);

		$ubicaciones->delete();

		return Response::json(ResponseManager::makeResult($id, "Ubicaciones deleted successfully."));
	}
}
