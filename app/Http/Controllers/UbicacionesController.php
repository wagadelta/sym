<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateUbicacionesRequest;
use Illuminate\Http\Request;
use App\Libraries\Repositories\UbicacionesRepository;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;

class UbicacionesController extends AppBaseController
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

		$ubicaciones = \DB::table('ubicaciones')->orderBy('id', 'desc')->paginate(15);
		$ubicaciones->setPath($request->url());

		return view('ubicaciones.index')
		    ->with('ubicaciones', $ubicaciones);
	}

	/**
	 * Show the form for creating a new Ubicaciones.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('ubicaciones.create');
	}

	/**
	 * Store a newly created Ubicaciones in storage.
	 *
	 * @param CreateUbicacionesRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateUbicacionesRequest $request)
	{
        $input = $request->all();

		$ubicaciones = $this->ubicacionesRepository->store($input);

		Flash::message('Ubicaciones saved successfully.');

		return redirect(route('ubicaciones.index'));
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
		{
			Flash::error('Ubicaciones not found');
			return redirect(route('ubicaciones.index'));
		}

		return view('ubicaciones.show')->with('ubicaciones', $ubicaciones);
	}

	/**
	 * Show the form for editing the specified Ubicaciones.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$ubicaciones = $this->ubicacionesRepository->findUbicacionesById($id);

		if(empty($ubicaciones))
		{
			Flash::error('Ubicaciones not found');
			return redirect(route('ubicaciones.index'));
		}

		return view('ubicaciones.edit')->with('ubicaciones', $ubicaciones);
	}

	/**
	 * Update the specified Ubicaciones in storage.
	 *
	 * @param  int    $id
	 * @param CreateUbicacionesRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateUbicacionesRequest $request)
	{
		$ubicaciones = $this->ubicacionesRepository->findUbicacionesById($id);

		if(empty($ubicaciones))
		{
			Flash::error('Ubicaciones not found');
			return redirect(route('ubicaciones.index'));
		}

		$ubicaciones = $this->ubicacionesRepository->update($ubicaciones, $request->all());

		Flash::message('Ubicaciones updated successfully.');

		return redirect(route('ubicaciones.index'));
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
		{
			Flash::error('Ubicaciones not found');
			return redirect(route('ubicaciones.index'));
		}

		$ubicaciones->delete();

		Flash::message('Ubicaciones deleted successfully.');

		return redirect(route('ubicaciones.index'));
	}

}
