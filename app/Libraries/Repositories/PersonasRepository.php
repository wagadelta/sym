<?php

namespace App\Libraries\Repositories;


use App\Models\Personas;
use Illuminate\Support\Facades\Schema;

class PersonasRepository
{

	/**
	 * Returns all Personas
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function all()
	{
		return Personas::all();
	}

	public function search($input)
    {
        $query = Personas::query();

        $columns = Schema::getColumnListing('personas');
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
	 * Stores Personas into database
	 *
	 * @param array $input
	 *
	 * @return Personas
	 */
	public function store($input)
	{
		return Personas::create($input);
	}

	/**
	 * Find Personas by given id
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Support\Collection|null|static|Personas
	 */
	public function findPersonasById($id)
	{
		return Personas::find($id);
	}

	/**
	 * Updates Personas into database
	 *
	 * @param Personas $personas
	 * @param array $input
	 *
	 * @return Personas
	 */
	public function update($personas, $input)
	{
		$personas->fill($input);
		$personas->save();

		return $personas;
	}
}