<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Process extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable =[
        'name'
    ];
    public function strategicmap(){
        return $this->hasOne(StrategicMap::class);
    }
    public function indicators(){
        return $this->hasMany(Indicator::class);
    }
}
