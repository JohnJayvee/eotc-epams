<?php

namespace App\Laravel\Models;

use Illuminate\Database\Eloquent\Model;
use App\Laravel\Traits\DateFormatter;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth,Helper;

class ApplicationBusinessPermitRequirements extends Model
{
    use SoftDeletes,DateFormatter;

    protected $table = "application_business_permit_requirements";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'application_id', 'type'
    ];
    
    public $timestamps = true;
}
