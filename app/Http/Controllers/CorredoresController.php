<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateCorredoresRequest;
use Illuminate\Http\Request;
use App\Libraries\Repositories\CorredoresRepository;
use App\Models\Corredores;
use App\Models\Carreras;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;

class CorredoresController extends AppBaseController
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

		$corredores = \DB::table('corredores')->orderBy('id_carrera', 'desc')->paginate(20);
		$corredores->setPath($request->url());

		return view('corredores.index')
		    ->with('corredores', $corredores);
	}

	/**
	 * Show the form for creating a new Corredores.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('corredores.create');
	}

	/**
	 * Store a newly created Corredores in storage.
	 *
	 * @param CreateCorredoresRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateCorredoresRequest $request)
	{
        $input = $request->all();

		$corredores = $this->corredoresRepository->store($input);

		Flash::message('Corredores saved successfully.');

		return redirect(route('corredores.index'));
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
		{
			Flash::error('Corredores not found');
			return redirect(route('corredores.index'));
		}

		return view('corredores.show')->with('corredores', $corredores);
	}

	/**
	 * Show the form for editing the specified Corredores.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$corredores = $this->corredoresRepository->findCorredoresById($id);

		if(empty($corredores))
		{
			Flash::error('Corredores not found');
			return redirect(route('corredores.index'));
		}

		return view('corredores.edit')->with('corredores', $corredores);
	}

	/**
	 * Update the specified Corredores in storage.
	 *
	 * @param  int    $id
	 * @param CreateCorredoresRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateCorredoresRequest $request)
	{
		$corredores = $this->corredoresRepository->findCorredoresById($id);

		if(empty($corredores))
		{
			Flash::error('Corredores not found');
			return redirect(route('corredores.index'));
		}

		$corredores = $this->corredoresRepository->update($corredores, $request->all());

		Flash::message('Corredores updated successfully.');

		return redirect(route('corredores.index'));
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
		{
			Flash::error('Corredores not found');
			return redirect(route('corredores.index'));
		}

		$corredores->delete();

		Flash::message('Corredores deleted successfully.');

		return redirect(route('corredores.index'));
	}


	public function searchByName($qry = null, Request $request)
	{
		$corredores= Corredores::where('nombres', 'LIKE', "%$qry%")
							->orWhere('apellidos', 'LIKE', "%$qry%")
							->get();

							//dd($corredores);
							//->paginate(10);
		//$corredores->setPath($request->url());
		//$cobros->setPath($request->url());
		 return view('resultados.results')
		    ->with('corredores', $corredores)
		    ->with('qry',$qry);


	}


}
