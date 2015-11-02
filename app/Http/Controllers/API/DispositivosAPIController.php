<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use Mitul\Controller\AppBaseController;
use Mitul\Generator\Utils\ResponseManager;
use App\Models\Dispositivos;
use Illuminate\Http\Request;
use App\Libraries\Repositories\DispositivosRepository;
use Response;
use Schema;

class DispositivosAPIController extends AppBaseController
{

	/** @var  DispositivosRepository */
	private $dispositivosRepository;

	function __construct(DispositivosRepository $dispositivosRepo)
	{
		$this->dispositivosRepository = $dispositivosRepo;
	}

	/**
	 * Display a listing of the Dispositivos.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
	    $input = $request->all();

		$result = $this->dispositivosRepository->search($input);

		$dispositivos = $result[0];

		return Response::json(ResponseManager::makeResult($dispositivos->toArray(), "Dispositivos retrieved successfully."));
	}

	public function search($input)
    {
        $query = Dispositivos::query();

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
	 * Show the form for creating a new Dispositivos.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created Dispositivos in storage.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(Dispositivos::$rules) > 0)
            $this->validateRequest($request, Dispositivos::$rules);

        $input = $request->all();

		$dispositivos = $this->dispositivosRepository->store($input);

		return Response::json(ResponseManager::makeResult($dispositivos->toArray(), "Dispositivos saved successfully."));
	}

	/**
	 * Display the specified Dispositivos.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$dispositivos = $this->dispositivosRepository->findDispositivosById($id);

		if(empty($dispositivos))
			$this->throwRecordNotFoundException("Dispositivos not found", ERROR_CODE_RECORD_NOT_FOUND);

		return Response::json(ResponseManager::makeResult($dispositivos->toArray(), "Dispositivos retrieved successfully."));
	}

	/**
	 * Show the form for editing the specified Dispositivos.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified Dispositivos in storage.
	 *
	 * @param  int    $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$dispositivos = $this->dispositivosRepository->findDispositivosById($id);

		if(empty($dispositivos))
			$this->throwRecordNotFoundException("Dispositivos not found", ERROR_CODE_RECORD_NOT_FOUND);

		$input = $request->all();

		$dispositivos = $this->dispositivosRepository->update($dispositivos, $input);

		return Response::json(ResponseManager::makeResult($dispositivos->toArray(), "Dispositivos updated successfully."));
	}

	/**
	 * Remove the specified Dispositivos from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$dispositivos = $this->dispositivosRepository->findDispositivosById($id);

		if(empty($dispositivos))
			$this->throwRecordNotFoundException("Dispositivos not found", ERROR_CODE_RECORD_NOT_FOUND);

		$dispositivos->delete();

		return Response::json(ResponseManager::makeResult($id, "Dispositivos deleted successfully."));
	}
}
