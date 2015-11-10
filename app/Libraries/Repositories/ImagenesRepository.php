<?php

namespace App\Libraries\Repositories;


use App\Models\Imagenes;
use Illuminate\Support\Facades\Schema;

class ImagenesRepository
{

	/**
	 * Returns all Imagenes
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function all()
	{
		return Imagenes::all();
	}

	public function search($input)
    {
        $query = Imagenes::query();

        $columns = Schema::getColumnListing('imagenes');
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
	 * Stores Imagenes into database
	 *
	 * @param array $input
	 *
	 * @return Imagenes
	 */
	public function store($input)
	{
		return Imagenes::create($input);
	}

	/**
	 * Find Imagenes by given id
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Support\Collection|null|static|Imagenes
	 */
	public function findImagenesById($id)
	{
		return Imagenes::find($id);
	}

	/**
	 * Updates Imagenes into database
	 *
	 * @param Imagenes $imagenes
	 * @param array $input
	 *
	 * @return Imagenes
	 */
	public function update($imagenes, $input)
	{
		$imagenes->fill($input);
		$imagenes->save();

		return $imagenes;
	}
}