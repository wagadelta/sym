<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use Mitul\Controller\AppBaseController;
use Mitul\Generator\Utils\ResponseManager;
use App\Models\Carreras;
use Illuminate\Http\Request;
use App\Libraries\Repositories\CarrerasRepository;
use Response;
use Schema;

class CarrerasAPIController extends AppBaseController
{

	/** @var  CarrerasRepository */
	private $carrerasRepository;

	function __construct(CarrerasRepository $carrerasRepo)
	{
		$this->carrerasRepository = $carrerasRepo;
	}

	/**
	 * Display a listing of the Carreras.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
	    $input = $request->all();

		$result = $this->carrerasRepository->search($input);

		$carreras = $result[0];

		return Response::json(ResponseManager::makeResult($carreras->toArray(), "Carreras retrieved successfully."));
	}

	public function search($input)
    {
        $query = Carreras::query();

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
	 * Show the form for creating a new Carreras.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created Carreras in storage.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(Carreras::$rules) > 0)
            $this->validateRequest($request, Carreras::$rules);

        $input = $request->all();

		$carreras = $this->carrerasRepository->store($input);

		return Response::json(ResponseManager::makeResult($carreras->toArray(), "Carreras saved successfully."));
	}

	/**
	 * Display the specified Carreras.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$carreras = $this->carrerasRepository->findCarrerasById($id);

		if(empty($carreras))
			$this->throwRecordNotFoundException("Carreras not found", ERROR_CODE_RECORD_NOT_FOUND);

		return Response::json(ResponseManager::makeResult($carreras->toArray(), "Carreras retrieved successfully."));
	}

	/**
	 * Show the form for editing the specified Carreras.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified Carreras in storage.
	 *
	 * @param  int    $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$carreras = $this->carrerasRepository->findCarrerasById($id);

		if(empty($carreras))
			$this->throwRecordNotFoundException("Carreras not found", ERROR_CODE_RECORD_NOT_FOUND);

		$input = $request->all();

		$carreras = $this->carrerasRepository->update($carreras, $input);

		return Response::json(ResponseManager::makeResult($carreras->toArray(), "Carreras updated successfully."));
	}

	/**
	 * Remove the specified Carreras from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$carreras = $this->carrerasRepository->findCarrerasById($id);

		if(empty($carreras))
			$this->throwRecordNotFoundException("Carreras not found", ERROR_CODE_RECORD_NOT_FOUND);

		$carreras->delete();

		return Response::json(ResponseManager::makeResult($id, "Carreras deleted successfully."));
	}
}
