<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectDetails extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'vwProjects';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
}
