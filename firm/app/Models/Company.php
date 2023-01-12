<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table='companies';
    protected $primaryKey='companyid';
    protected $fillable= [
        'name',
        'address',
        'company'
    ];
    public function reports()
    {
        return $this->hasMany(Report::class);
    }

}
