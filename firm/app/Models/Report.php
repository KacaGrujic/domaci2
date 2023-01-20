<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    // protected $fillable = ['title','slug','excerpt','body'];
    protected $guarded = [];
    protected $table='reports';
    protected $primaryKey='reportid';
    protected $fillable= [
        'reportname',
        'analysys',
        'companyid',
        'reporttypeid'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class, 'companyid');
    }

    public function reporttype()
    {
        return $this->belongsTo(ReportType::class, 'reporttypeid');
    }

}


