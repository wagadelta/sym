<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateTrasladosRequest;
use Illuminate\Http\Request;
use App\Libraries\Repositories\TrasladosRepository;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;

class TrasladosController extends AppBaseController
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

		$attributes = $result[1];

		return view('traslados.index')
		    ->with('traslados', $traslados)
		    ->with('attributes', $attributes);;
	}

	/**
	 * Show the form for creating a new Traslados.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('traslados.create');
	}

	/**
	 * Store a newly created Traslados in storage.
	 *
	 * @param CreateTrasladosRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateTrasladosRequest $request)
	{
        $input = $request->all();

		$traslados = $this->trasladosRepository->store($input);

		Flash::message('Traslados saved successfully.');

		return redirect(route('traslados.index'));
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
		{
			Flash::error('Traslados not found');
			return redirect(route('traslados.index'));
		}

		return view('traslados.show')->with('traslados', $traslados);
	}

	/**
	 * Show the form for editing the specified Traslados.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$traslados = $this->trasladosRepository->findTrasladosById($id);

		if(empty($traslados))
		{
			Flash::error('Traslados not found');
			return redirect(route('traslados.index'));
		}

		return view('traslados.edit')->with('traslados', $traslados);
	}

	/**
	 * Update the specified Traslados in storage.
	 *
	 * @param  int    $id
	 * @param CreateTrasladosRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateTrasladosRequest $request)
	{
		$traslados = $this->trasladosRepository->findTrasladosById($id);

		if(empty($traslados))
		{
			Flash::error('Traslados not found');
			return redirect(route('traslados.index'));
		}

		$traslados = $this->trasladosRepository->update($traslados, $request->all());

		Flash::message('Traslados updated successfully.');

		return redirect(route('traslados.index'));
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
		{
			Flash::error('Traslados not found');
			return redirect(route('traslados.index'));
		}

		$traslados->delete();

		Flash::message('Traslados deleted successfully.');

		return redirect(route('traslados.index'));
	}

}
