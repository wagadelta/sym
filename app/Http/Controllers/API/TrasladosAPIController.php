<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use Mitul\Controller\AppBaseController;
use Mitul\Generator\Utils\ResponseManager;
use App\Models\Traslados;
use Illuminate\Http\Request;
use App\Libraries\Repositories\TrasladosRepository;
use Response;
use Schema;

class TrasladosAPIController extends AppBaseController
{

	/** @var  TrasladosRepository */
	private $trasladosRepository;

	function __construct(TrasladosRepository $trasladosRepo)
	{
		$this->trasladosRepository = $trasladosRepo;
	}

	/**
	 * Display a listing of the Traslados.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
	    $input = $request->all();

		$result = $this->trasladosRepository->search($input);

		$traslados = $result[0];

		return Response::json(ResponseManager::makeResult($traslados->toArray(), "Traslados retrieved successfully."));
	}

	public function search($input)
    {
        $query = Traslados::query();

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
	 * Show the form for creating a new Traslados.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created Traslados in storage.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(Traslados::$rules) > 0)
            $this->validateRequest($request, Traslados::$rules);

        $input = $request->all();

		$traslados = $this->trasladosRepository->store($input);

		return Response::json(ResponseManager::makeResult($traslados->toArray(), "Traslados saved successfully."));
	}

	/**
	 * Display the specified Traslados.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$traslados = $this->trasladosRepository->findTrasladosById($id);

		if(empty($traslados))
			$this->throwRecordNotFoundException("Traslados not found", ERROR_CODE_RECORD_NOT_FOUND);

		return Response::json(ResponseManager::makeResult($traslados->toArray(), "Traslados retrieved successfully."));
	}

	/**
	 * Show the form for editing the specified Traslados.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified Traslados in storage.
	 *
	 * @param  int    $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$traslados = $this->trasladosRepository->findTrasladosById($id);

		if(empty($traslados))
			$this->throwRecordNotFoundException("Traslados not found", ERROR_CODE_RECORD_NOT_FOUND);

		$input = $request->all();

		$traslados = $this->trasladosRepository->update($traslados, $input);

		return Response::json(ResponseManager::makeResult($traslados->toArray(), "Traslados updated successfully."));
	}

	/**
	 * Remove the specified Traslados from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$traslados = $this->trasladosRepository->findTrasladosById($id);

		if(empty($traslados))
			$this->throwRecordNotFoundException("Traslados not found", ERROR_CODE_RECORD_NOT_FOUND);

		$traslados->delete();

		return Response::json(ResponseManager::makeResult($id, "Traslados deleted successfully."));
	}
}
