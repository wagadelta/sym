<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateDispositivosRequest;
use Illuminate\Http\Request;
use App\Libraries\Repositories\DispositivosRepository;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;

class DispositivosController extends AppBaseController
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

		$attributes = $result[1];

		return view('dispositivos.index')
		    ->with('dispositivos', $dispositivos)
		    ->with('attributes', $attributes);;
	}

	/**
	 * Show the form for creating a new Dispositivos.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('dispositivos.create');
	}

	/**
	 * Store a newly created Dispositivos in storage.
	 *
	 * @param CreateDispositivosRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateDispositivosRequest $request)
	{
        $input = $request->all();

		$dispositivos = $this->dispositivosRepository->store($input);

		Flash::message('Dispositivos saved successfully.');

		return redirect(route('dispositivos.index'));
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
		{
			Flash::error('Dispositivos not found');
			return redirect(route('dispositivos.index'));
		}

		return view('dispositivos.show')->with('dispositivos', $dispositivos);
	}

	/**
	 * Show the form for editing the specified Dispositivos.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$dispositivos = $this->dispositivosRepository->findDispositivosById($id);

		if(empty($dispositivos))
		{
			Flash::error('Dispositivos not found');
			return redirect(route('dispositivos.index'));
		}

		return view('dispositivos.edit')->with('dispositivos', $dispositivos);
	}

	/**
	 * Update the specified Dispositivos in storage.
	 *
	 * @param  int    $id
	 * @param CreateDispositivosRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateDispositivosRequest $request)
	{
		$dispositivos = $this->dispositivosRepository->findDispositivosById($id);

		if(empty($dispositivos))
		{
			Flash::error('Dispositivos not found');
			return redirect(route('dispositivos.index'));
		}

		$dispositivos = $this->dispositivosRepository->update($dispositivos, $request->all());

		Flash::message('Dispositivos updated successfully.');

		return redirect(route('dispositivos.index'));
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
		{
			Flash::error('Dispositivos not found');
			return redirect(route('dispositivos.index'));
		}

		$dispositivos->delete();

		Flash::message('Dispositivos deleted successfully.');

		return redirect(route('dispositivos.index'));
	}

}
