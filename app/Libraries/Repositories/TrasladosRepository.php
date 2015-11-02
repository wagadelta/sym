<?php

namespace App\Libraries\Repositories;


use App\Models\Traslados;
use Illuminate\Support\Facades\Schema;

class TrasladosRepository
{

	/**
	 * Returns all Traslados
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function all()
	{
		return Traslados::all();
	}

	public function search($input)
    {
        $query = Traslados::query();

        $columns = Schema::getColumnListing('traslados');
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
	 * Stores Traslados into database
	 *
	 * @param array $input
	 *
	 * @return Traslados
	 */
	public function store($input)
	{
		return Traslados::create($input);
	}

	/**
	 * Find Traslados by given id
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Support\Collection|null|static|Traslados
	 */
	public function findTrasladosById($id)
	{
		return Traslados::find($id);
	}

	/**
	 * Updates Traslados into database
	 *
	 * @param Traslados $traslados
	 * @param array $input
	 *
	 * @return Traslados
	 */
	public function update($traslados, $input)
	{
		$traslados->fill($input);
		$traslados->save();

		return $traslados;
	}
}