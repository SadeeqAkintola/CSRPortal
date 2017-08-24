<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{

    protected $fillable = [
        'company_id', 'division_id', 'title', 'pillar_id', 'target_id', 'objective', 'target_summary' , 'target_details', 'csr_strategy' , 'status', 'project_stage' , 'pillar_id' , 'year', 'division_id', 'address' , 'community', 'lga' , 'town' , 'street' , 'state', 'country', 'full_location', 'company_name', 'cost', 'initiative_id', 'entered_by'
    ];

}
