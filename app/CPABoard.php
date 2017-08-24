<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CPABoard extends Model
{
    protected $table = 'cpa_board';

    protected $fillable = [
        'title', 'details', 'link1', 'link2',  'entered_by', 'entered_date' , 'modified_by' , 'modified_date' ];

}
