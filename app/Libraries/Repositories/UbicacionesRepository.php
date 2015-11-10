<?php

namespace App\Libraries\Repositories;


use App\Models\Ubicaciones;
use Illuminate\Support\Facades\Schema;

class UbicacionesRepository
{

	/**
	 * Returns all Ubicaciones
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function all()
	{
		return Ubicaciones::all();
	}

	public function search($input)
    {
        $query = Ubicaciones::query();

        $columns = Schema::getColumnListing('ubicaciones');
        $attributes = array();

        foreach($columns as $attribute){
            if(isset($input[$attribute]))
            {
                $query->where($attribute, $input[$attribute]);
                $attributes[$attribute] =  $input[$attribute];
            }else{
                $attributes[$attribute] =  null;
            }
        };

        return [$query->get(), $attributes];

    }

	/**
	 * Stores Ubicaciones into database
	 *
	 * @param array $input
	 *
	 * @return Ubicaciones
	 */
	public function store($input)
	{
		return Ubicaciones::create($input);
	}

	/**
	 * Find Ubicaciones by given id
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Support\Collection|null|static|Ubicaciones
	 */
	public function findUbicacionesById($id)
	{
		return Ubicaciones::find($id);
	}

	/**
	 * Updates Ubicaciones into database
	 *
	 * @param Ubicaciones $ubicaciones
	 * @param array $input
	 *
	 * @return Ubicaciones
	 */
	public function update($ubicaciones, $input)
	{
		$ubicaciones->fill($input);
		$ubicaciones->save();

		return $ubicaciones;
	}
}