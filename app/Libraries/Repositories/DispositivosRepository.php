<?php

namespace App\Libraries\Repositories;


use App\Models\Dispositivos;
use Illuminate\Support\Facades\Schema;

class DispositivosRepository
{

	/**
	 * Returns all Dispositivos
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function all()
	{
		return Dispositivos::all();
	}

	public function search($input)
    {
        $query = Dispositivos::query();

        $columns = Schema::getColumnListing('dispositivos');
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
	 * Stores Dispositivos into database
	 *
	 * @param array $input
	 *
	 * @return Dispositivos
	 */
	public function store($input)
	{
		return Dispositivos::create($input);
	}

	/**
	 * Find Dispositivos by given id
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Support\Collection|null|static|Dispositivos
	 */
	public function findDispositivosById($id)
	{
		return Dispositivos::find($id);
	}

	/**
	 * Updates Dispositivos into database
	 *
	 * @param Dispositivos $dispositivos
	 * @param array $input
	 *
	 * @return Dispositivos
	 */
	public function update($dispositivos, $input)
	{
		$dispositivos->fill($input);
		$dispositivos->save();

		return $dispositivos;
	}
}