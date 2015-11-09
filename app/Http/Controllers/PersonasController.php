<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatePersonasRequest;
use Illuminate\Http\Request;
use App\Libraries\Repositories\PersonasRepository;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;

class PersonasController extends AppBaseController
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
	    //dd($request->path());
		// $result = $this->personasRepository->search($input)->paginate(10);
		// $personas = $result[0];
		// $attributes = $result[1];
		$personas =  \DB::table('personas')->paginate(10);
		//$personas->setPath($request->url());

		return view('personas.index')
		    ->with('personas', $personas);
	}

	/**
	 * Show the form for creating a new Personas.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('personas.create');
	}

	/**
	 * Store a newly created Personas in storage.
	 *
	 * @param CreatePersonasRequest $request
	 *
	 * @return Response
	 */
	public function store(CreatePersonasRequest $request)
	{
        $input = $request->all();

		$personas = $this->personasRepository->store($input);

		Flash::message('Personas saved successfully.');

		return redirect(route('personas.index'));
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
		{
			Flash::error('Personas not found');
			return redirect(route('personas.index'));
		}

		return view('personas.show')->with('personas', $personas);
	}

	/**
	 * Show the form for editing the specified Personas.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$personas = $this->personasRepository->findPersonasById($id);

		if(empty($personas))
		{
			Flash::error('Personas not found');
			return redirect(route('personas.index'));
		}

		return view('personas.edit')->with('personas', $personas);
	}

	/**
	 * Update the specified Personas in storage.
	 *
	 * @param  int    $id
	 * @param CreatePersonasRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreatePersonasRequest $request)
	{
		$personas = $this->personasRepository->findPersonasById($id);

		if(empty($personas))
		{
			Flash::error('Personas not found');
			return redirect(route('personas.index'));
		}

		$personas = $this->personasRepository->update($personas, $request->all());

		Flash::message('Personas updated successfully.');

		return redirect(route('personas.index'));
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
		{
			Flash::error('Personas not found');
			return redirect(route('personas.index'));
		}

		$personas->delete();

		Flash::message('Personas deleted successfully.');

		return redirect(route('personas.index'));
	}

}
