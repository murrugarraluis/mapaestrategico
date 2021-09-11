<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Indicator extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable =[
        'name',
        'level'
    ];
    public function process(){
        return $this->belongsTo(Process::class);
    }
    public function controlpanel(){
        return $this->hasOne(ControlPanel::class);
    }
    public function strategicmaps(){
        return $this->belongsToMany(StrategicMap::class);
    }
}
