<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mesa extends Model
{
    protected $table ="mesas";
    protected $primaryKey="mes_id";
    public $timestamps=false;

    protected $fillable =['mes_numero','mes_sillas','mes_estado'];

    public function scopeSearch($query,$val)
    {
        return $query
        ->where('mes_id','like','%'. $val .'%')
        ->Orwhere('mes_numero','like','%'. $val .'%')
        ->Orwhere('mes_sillas','like','%'. $val .'%')
        ->Orwhere('mes_estado','like','%'. $val .'%');
    }
}
