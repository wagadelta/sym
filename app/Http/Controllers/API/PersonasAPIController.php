<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use Mitul\Controller\AppBaseController;
use Mitul\Generator\Utils\ResponseManager;
use App\Models\Personas;
use Illuminate\Http\Request;
use App\Libraries\Repositories\PersonasRepository;
use Response;
use Schema;

class PersonasAPIController extends AppBaseController
{

	/** @var  PersonasRepository */
	private $personasRepository;

	function __construct(PersonasRepository $personasRepo)
	{
		$this->personasRepository = $personasRepo;
	}

	/**
	 * Display a listing of the Personas.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
	    $input = $request->all();

		$result = $this->personasRepository->search($input);

		$personas = $result[0];

		return Response::json(ResponseManager::makeResult($personas->toArray(), "Personas retrieved successfully."));
	}

	public function search($input)
    {
        $query = Personas::query();

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
	 * Show the form for creating a new Personas.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created Personas in storage.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(Personas::$rules) > 0)
            $this->validateRequest($request, Personas::$rules);

        $input = $request->all();

		$personas = $this->personasRepository->store($input);

		return Response::json(ResponseManager::makeResult($personas->toArray(), "Personas saved successfully."));
	}

	/**
	 * Display the specified Personas.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$personas = $this->personasRepository->findPersonasById($id);

		if(empty($personas))
			$this->throwRecordNotFoundException("Personas not found", ERROR_CODE_RECORD_NOT_FOUND);

		return Response::json(ResponseManager::makeResult($personas->toArray(), "Personas retrieved successfully."));
	}

	/**
	 * Show the form for editing the specified Personas.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified Personas in storage.
	 *
	 * @param  int    $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$personas = $this->personasRepository->findPersonasById($id);

		if(empty($personas))
			$this->throwRecordNotFoundException("Personas not found", ERROR_CODE_RECORD_NOT_FOUND);

		$input = $request->all();

		$personas = $this->personasRepository->update($personas, $input);

		return Response::json(ResponseManager::makeResult($personas->toArray(), "Personas updated successfully."));
	}

	/**
	 * Remove the specified Personas from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$personas = $this->personasRepository->findPersonasById($id);

		if(empty($personas))
			$this->throwRecordNotFoundException("Personas not found", ERROR_CODE_RECORD_NOT_FOUND);

		$personas->delete();

		return Response::json(ResponseManager::makeResult($id, "Personas deleted successfully."));
	}
}
