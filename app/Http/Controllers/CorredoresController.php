<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateCorredoresRequest;
use Illuminate\Http\Request;
use App\Libraries\Repositories\CorredoresRepository;
use App\Libraries\Repositories\CarrerasRepository;
use App\Models\Corredores;
use App\Models\Carreras;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;
use DB;

class CorredoresController extends AppBaseController
{

	/** @var  CorredoresRepository */
	private $corredoresRepository;
	private $carrerasRepository;

	function __construct(CorredoresRepository $corredoresRepo, CarrerasRepository $carrerasRepo)
	{
		$this->corredoresRepository = $corredoresRepo;
		$this->carrerasRepository = $carrerasRepo;
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
		//$carreras_options = $this->carrerasRepository->optionList();
		//dd($carreras_options);

		return view('corredores.index')
		->with('corredores', $corredores);
		//->with('carreras_options', $carreras_options);
	}

	/**
	* Show the form for creating a new Corredores.
	*
	* @return Response
	*/
	public function create()
	{
		$carreras_options = $this->carrerasRepository->optionList();
		//dd(	$carreras_options);
		return view('corredores.create')
		->with('carreras_options' , $carreras_options);
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
		$carreras_options = $this->carrerasRepository->optionList();
		if(empty($corredores))
		{
			Flash::error('Corredores not found');
			return redirect(route('corredores.index'));
		}

		return view('corredores.edit')
		->with('corredores', $corredores)
		->with('carreras_options', $carreras_options);
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

		// DB::conection()->enableQueryLog();  To debug
		$corredores= Corredores::whereRaw("(nombres like ? OR apellidos like ? )", array('%'.$qry.'%', '%'.$qry.'%'))
		->where('etiqueta_count', '>=', 1)
		// ->get();    in this case to debug
		->paginate(25);
		// dd($corredores);  to debug
		// dd(DB::getQueryLog($corredores)); to debug
		$corredores->setPath($request->url());
		return view('resultados.results')
		->with('corredores', $corredores)
		->with('qry',$qry);
	}

}
