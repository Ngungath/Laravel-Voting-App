<?php

namespace App\Repositories;

use App\Models\Categories;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class CategoriesRepository
 * @package App\Repositories
 * @version October 18, 2018, 6:53 pm UTC
 *
 * @method Categories findWithoutFail($id, $columns = ['*'])
 * @method Categories find($id, $columns = ['*'])
 * @method Categories first($columns = ['*'])
*/
class CategoriesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'image',
        'icon'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Categories::class;
    }
}
