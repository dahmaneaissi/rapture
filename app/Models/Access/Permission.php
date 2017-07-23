<?php

namespace App\Models\Access;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    /**
     * @var string
     */
    protected $table = 'permissions';

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
    public function roles()
    {
        return $this->belongsToMany( Role::class );
    }
}