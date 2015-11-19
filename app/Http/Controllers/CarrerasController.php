<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateCarrerasRequest;
use Illuminate\Http\Request;
use App\Libraries\Repositories\CarrerasRepository;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;

class CarrerasController extends AppBaseController
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

		//$result = $this->carrerasRepository->search($input)->paginate(20);

		$carreras = \DB::table('carreras')->orderBy('id','desc')->paginate(20);
		$carreras->setPath($request->url());

		return view('carreras.index')
		    ->with('carreras', $carreras);
	}

	/**
	 * Show the form for creating a new Carreras.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('carreras.create');
	}

	/**
	 * Store a newly created Carreras in storage.
	 *
	 * @param CreateCarrerasRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateCarrerasRequest $request)
	{
        $input = $request->all();

		$carreras = $this->carrerasRepository->store($input);

		Flash::message('Carreras saved successfully.');

		return redirect(route('carreras.index'));
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
		{
			Flash::error('Carreras not found');
			return redirect(route('carreras.index'));
		}

		return view('carreras.show')->with('carreras', $carreras);
	}

	/**
	 * Show the form for editing the specified Carreras.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$carreras = $this->carrerasRepository->findCarrerasById($id);

		if(empty($carreras))
		{
			Flash::error('Carreras not found');
			return redirect(route('carreras.index'));
		}

		return view('carreras.edit')->with('carreras', $carreras);
	}

	/**
	 * Update the specified Carreras in storage.
	 *
	 * @param  int    $id
	 * @param CreateCarrerasRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateCarrerasRequest $request)
	{
		$carreras = $this->carrerasRepository->findCarrerasById($id);

		if(empty($carreras))
		{
			Flash::error('Carreras not found');
			return redirect(route('carreras.index'));
		}

		$carreras = $this->carrerasRepository->update($carreras, $request->all());

		Flash::message('Carreras updated successfully.');

		return redirect(route('carreras.index'));
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
		{
			Flash::error('Carreras not found');
			return redirect(route('carreras.index'));
		}

		$carreras->delete();

		Flash::message('Carreras deleted successfully.');

		return redirect(route('carreras.index'));
	}

}
