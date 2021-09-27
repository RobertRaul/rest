<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cobros extends Model
{
    protected $table ="cobros";
    protected $primaryKey="cob_id";
    public $timestamps=false;

    protected $fillable =['cob_solicitud','cob_comproban','cob_serie','cob_numero','con_subtotal','cob_igv','cob_total','cob_estado'];

    public function scopeSearch($query,$val)
    {
        return $query
        ->where('cob_id','like','%'. $val .'%')
        ->Orwhere('cob_solicitud','like','%'. $val .'%')
        ->Orwhere('cob_comproban','like','%'. $val .'%')
        ->Orwhere('cob_serie','like','%'. $val .'%')
        ->Orwhere('cob_numero','like','%'. $val .'%')
        ->Orwhere('con_subtotal','like','%'. $val .'%')
        ->Orwhere('cob_igv','like','%'. $val .'%')
        ->Orwhere('cob_total','like','%'. $val .'%')
        ->Orwhere('cob_estado','like','%'. $val .'%');
    }

    public function Solicitud()
    {
        return $this->hasMany(Solicitud::class, 'sol_id', 'cob_solicitud');
    }
}
    
