<?php

namespace App\Repositories;

use App\Models\Nomination;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class NominationRepository
 * @package App\Repositories
 * @version October 18, 2018, 7:03 pm UTC
 *
 * @method Nomination findWithoutFail($id, $columns = ['*'])
 * @method Nomination find($id, $columns = ['*'])
 * @method Nomination first($columns = ['*'])
*/
class NominationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'image',
        'gender',
        'bio',
        'linkedin_url',
        'business_name',
        'reason_for_nomination',
        'no_of_nomination',
        'is_admin_selected',
        'is_won',
        'user_id',
        'category_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Nomination::class;
    }
}
