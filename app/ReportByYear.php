<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportByYear extends Model
{
    protected $table = 'vwProjectsByPlant';
    public $timestamps = false;
}
