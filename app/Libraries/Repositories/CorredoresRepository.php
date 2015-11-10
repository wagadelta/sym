<?php

namespace App\Libraries\Repositories;


use App\Models\Corredores;
use Illuminate\Support\Facades\Schema;

class CorredoresRepository
{

	/**
	 * Returns all Corredores
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function all()
	{
		return Corredores::all();
	}

	public function search($input)
    {
        $query = Corredores::query();

        $columns = Schema::getColumnListing('corredores');
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
	 * Stores Corredores into database
	 *
	 * @param array $input
	 *
	 * @return Corredores
	 */
	public function store($input)
	{
		return Corredores::create($input);
	}

	/**
	 * Find Corredores by given id
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Support\Collection|null|static|Corredores
	 */
	public function findCorredoresById($id)
	{
		return Corredores::find($id);
	}

	/**
	 * Updates Corredores into database
	 *
	 * @param Corredores $corredores
	 * @param array $input
	 *
	 * @return Corredores
	 */
	public function update($corredores, $input)
	{
		$corredores->fill($input);
		$corredores->save();

		return $corredores;
	}
}