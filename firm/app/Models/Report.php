<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $table='reports';
    protected $primaryKey='reportid';
    protected $fillable= [
        'reportname',
        'analysys',
        'companyid',
        'reporttypeid'
    ];

    public function reporttype()
    {
        return $this->belongsTo(ReportType::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }


}
