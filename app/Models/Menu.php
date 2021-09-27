<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table ="menu";
    protected $primaryKey="men_id";
    public $timestamps=false;

    protected $fillable =['men_nomb','men_descripcion','men_fech','men_estado'];

    public function scopeSearch($query,$val)
    {
        return $query
        ->where('men_id','like','%'. $val .'%')
        ->Orwhere('men_nomb','like','%'. $val .'%')
        ->Orwhere('men_descripcion','like','%'. $val .'%')
        ->Orwhere('men_fech','like','%'. $val .'%');
    }
}
