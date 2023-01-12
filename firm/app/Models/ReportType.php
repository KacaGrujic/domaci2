<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportType extends Model
{
    use HasFactory;
    
    protected $table='reporttypes';
    protected $primaryKey='reporttypeid';

    
    public function reports()
    {
        return $this->hasMany(Report::class);
    }


}