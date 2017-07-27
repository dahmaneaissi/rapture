<?php

namespace Dman\Models\Access;

use App\User;
use Dman\Models\BaseModel;


/**
 * Class Role
 * @package App\Models\Access
 */
class Role extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'roles';

    protected $datatableColumn = [
        'title',
        'description'
    ];

    /**
     * @var array
     */
    protected $fillable = [
        'title',
        'slug',
        'description'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany( User::class );
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function permissions()
    {
        return $this->belongsToMany( Permission::class );
    }
}
