<?php

namespace App\Libraries\Repositories;


use App\Models\Carreras;
use Illuminate\Support\Facades\Schema;

class CarrerasRepository
{

	/**
	 * Returns all Carreras
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function all()
	{
		return Carreras::all();
	}

	public function search($input)
    {
        $query = Carreras::query();

        $columns = Schema::getColumnListing('carreras');
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
	 * Stores Carreras into database
	 *
	 * @param array $input
	 *
	 * @return Carreras
	 */
	public function store($input)
	{
		return Carreras::create($input);
	}

	/**
	 * Find Carreras by given id
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Support\Collection|null|static|Carreras
	 */
	public function findCarrerasById($id)
	{
		return Carreras::find($id);
	}

	/**
	 * Updates Carreras into database
	 *
	 * @param Carreras $carreras
	 * @param array $input
	 *
	 * @return Carreras
	 */
	public function update($carreras, $input)
	{
		$carreras->fill($input);
		$carreras->save();

		return $carreras;
	}

		public function optionList()
	{
		return Carreras::lists('nombre', 'id');
	}
}
