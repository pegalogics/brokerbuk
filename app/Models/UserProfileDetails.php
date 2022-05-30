<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfileDetails extends Model
{
    use HasFactory;

    protected $table = 'user_profile_details';

    protected $fillable = [
        'user_id',	
        'office_add_1',	
        'office_add_2',	
        'city',	
        'state',	
        'work_area',	
        'total_exp',
        'type_of_segment',	
        'service_intro',	
        'company_name',	
        'gst_n',	
    ];
}
