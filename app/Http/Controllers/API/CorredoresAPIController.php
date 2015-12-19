<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use Mitul\Controller\AppBaseController;
use Mitul\Generator\Utils\ResponseManager;
use App\Models\Corredores;
use Illuminate\Http\Request;
use App\Libraries\Repositories\CorredoresRepository;
use Response;
use Schema;

class CorredoresAPIController extends AppBaseController
{

	/** @var  CorredoresRepository */
	private $corredoresRepository;

	function __construct(CorredoresRepository $corredoresRepo)
	{
		$this->corredoresRepository = $corredoresRepo;
	}

	/**
	 * Display a listing of the Corredores.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
	    $input = $request->all();

		$result = $this->corredoresRepository->search($input);

		$corredores = $result[0];

		return Response::json(ResponseManager::makeResult($corredores->toArray(), "Corredores retrieved successfully."));
	}

	public function search($input)
    {
        $query = Corredores::query();

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
	 * Show the form for creating a new Corredores.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created Corredores in storage.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(Corredores::$rules) > 0)
            $this->validateRequest($request, Corredores::$rules);

        $input = $request->all();

		$corredores = $this->corredoresRepository->store($input);

		return Response::json(ResponseManager::makeResult($corredores->toArray(), "Corredores saved successfully."));
	}

	/**
	 * Display the specified Corredores.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$corredores = $this->corredoresRepository->findCorredoresById($id);

		if(empty($corredores))
			$this->throwRecordNotFoundException("Corredores not found", ERROR_CODE_RECORD_NOT_FOUND);

		return Response::json(ResponseManager::makeResult($corredores->toArray(), "Corredores retrieved successfully."));
	}

	/**
	 * Show the form for editing the specified Corredores.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified Corredores in storage.
	 *
	 * @param  int    $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$corredores = $this->corredoresRepository->findCorredoresById($id);

		if(empty($corredores))
			$this->throwRecordNotFoundException("Corredores not found", ERROR_CODE_RECORD_NOT_FOUND);

		$input = $request->all();

		$corredores = $this->corredoresRepository->update($corredores, $input);

		return Response::json(ResponseManager::makeResult($corredores->toArray(), "Corredores updated successfully."));
	}

	/**
	 * Remove the specified Corredores from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$corredores = $this->corredoresRepository->findCorredoresById($id);

		if(empty($corredores))
			$this->throwRecordNotFoundException("Corredores not found", ERROR_CODE_RECORD_NOT_FOUND);

		$corredores->delete();

		return Response::json(ResponseManager::makeResult($id, "Corredores deleted successfully."));
	}
}
