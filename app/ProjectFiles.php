<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectFiles extends Model
{
    public $fillable = ['project_id', 'file_name'];

    public function project()
    {
        return $this->belongsTo('App\Project');
    }
}
