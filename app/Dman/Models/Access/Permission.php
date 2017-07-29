<?php

namespace Dman\Models\Access;

use Dman\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;

class Permission extends BaseModel
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

    protected $datatableColumn = [
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