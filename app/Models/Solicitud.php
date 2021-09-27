<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    protected $table ="solicitudes";
    protected $primaryKey="sol_id";
    public $timestamps=false;

    protected $fillable =['sol_mesa','sol_camare','sol_menu','sol_estado'];

    public function scopeSearch($query,$val)
    {
        return $query
        ->where('sol_id','like','%'. $val .'%')
        ->Orwhere('sol_mesa','like','%'. $val .'%')
        ->Orwhere('sol_camare','like','%'. $val .'%')
        ->Orwhere('sol_menu','like','%'. $val .'%')
        ->Orwhere('sol_estado','like','%'. $val .'%');
    }

    public function Mesa()
    {
        return $this->hasMany(Mesa::class, 'mes_id', 'sol_mesa');
    }

    public function Camarero()
    {
        return $this->hasMany(Camarero::class, 'cam_id', 'sol_camare');
    }

    public function Menu()
    {
        return $this->hasMany(Menu::class, 'men_id', 'sol_menu');
    }
}
