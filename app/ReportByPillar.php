<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportByPillar extends Model
{
    protected $table = 'vwprojectbypillar';
    public $timestamps = false;
    protected $guarded = [];
}
