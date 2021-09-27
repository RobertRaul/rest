<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Camarero extends Model
{
    protected $table ="camareros";
    protected $primaryKey="cam_id";
    public $timestamps=false;

    protected $fillable =['cam_dni','cam_apellidos','cam_nombres','cam_fechan','cam_estado'];

    public function scopeSearch($query,$val)
    {
        return $query
        ->where('cam_id','like','%'. $val .'%')
        ->Orwhere('cam_dni','like','%'. $val .'%')
        ->Orwhere('cam_apellidos','like','%'. $val .'%')
        ->Orwhere('cam_nombres','like','%'. $val .'%')
        ->Orwhere('cam_fechan','like','%'. $val .'%');
    }
}
