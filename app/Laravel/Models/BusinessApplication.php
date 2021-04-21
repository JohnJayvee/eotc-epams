<?php 

namespace App\Laravel\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Laravel\Traits\DateFormatter;
use Str;

class BusinessApplication extends Model{
    
    use SoftDeletes,DateFormatter;
    
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = "business_application";

    /**
     * The database connection used by the model.
     *
     * @var string
     */
    protected $connection = "master_db";

    /**
     * Enable soft delete in table
     * @var boolean
     */
    protected $softDelete = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];


    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The attributes that created within the model.
     *
     * @var array
     */
    protected $appends = [];

    protected $dates = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
    ];

    public function customer(){
        return $this->BelongsTo("App\Laravel\Models\Customer",'owner_user_id','id');
    }
    public function frontliner(){
        return $this->BelongsTo("App\Laravel\Models\User",'frontliner_id','id');
    }
    public function engineer(){
        return $this->BelongsTo("App\Laravel\Models\User",'engineer_id','id');
    }
    public function business(){
        return $this->BelongsTo("App\Laravel\Models\Business",'business_id','id');
    }
    public function service(){
        return $this->BelongsTo("App\Laravel\Models\Services",'service_id','id');
    }
    public function permit(){
        return $this->BelongsTo("App\Laravel\Models\PermitType",'permit_id','id');
    }

    public function building_permit(){
        return $this->BelongsTo("App\Laravel\Models\BuildingPermit",'id','application_id');
    }

    public function fencing_permit(){
        return $this->BelongsTo("App\Laravel\Models\FencingPermit",'id','application_id');
    }

     public function electrical_permit(){
        return $this->BelongsTo("App\Laravel\Models\ElectricalPermit",'id','application_id');
    }

    public function getFullNameAttribute(){
        return Str::title("{$this->last_name}".(strlen($this->middle_name) > 0 ? " ".Str::title($this->middle_name): NULL)." {$this->first_name}");
    }

    
}