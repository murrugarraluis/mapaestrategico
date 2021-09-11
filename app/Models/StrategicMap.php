<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StrategicMap extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function process(){
        return $this->belongsTo(Process::class);
    }
    public function indicators(){
        return $this->belongsToMany(Indicator::class);
    }
}
