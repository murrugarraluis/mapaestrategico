<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ControlPanel extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable =[
        'formula',
        'objective',
        'frequency',
        'goal',
        'bad_range',
        'regular_range',
        'good_range',
        'iniciatives',
        'responsable',
    ];
    public function indicator(){
        return $this->belongsTo(Indicator::class);
    }
}
