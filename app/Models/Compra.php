<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;

    protected $table = 'compras';

    protected $fillable = ['producto_id','user_id','procesada'];

    public function producto()
    {
        return $this->belongsto(Producto::class, 'producto_id');
    }

    public function compraUser()
    {
        return $this->belongsto(User::class,'user_id');
    }

    public function compra_factura()
    {
        return $this->belongsto(Facturas_compras::class, 'compra_id');
    }

    
}
