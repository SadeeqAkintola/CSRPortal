<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CPABoardFiles extends Model
{
    protected $table = 'cpa_board_files';

    public $fillable = ['cpa_board_id', 'file_name'];

    public function cpa_board()
    {
        return $this->belongsTo('App\CPABoard');
    }
}
