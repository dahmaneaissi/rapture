<?php

namespace App\Models\Access;

use App\User;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Role
 * @package App\Models\Access
 */
class Role extends Model
{
    /**
     * @var string
     */
    protected $table = 'roles';

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
