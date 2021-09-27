<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table ="clientes";
    protected $primaryKey="clien_id";
    public $timestamps=false;

    protected $fillable =['clien_nombres','clien_direcc'];

    public function scopeSearch($query,$val)
    {
        return $query
        ->where('clien_id','like','%'. $val .'%')
        ->Orwhere('clien_nombres','like','%'. $val .'%')
        ->Orwhere('clien_direcc','like','%'. $val .'%');
    }
}
