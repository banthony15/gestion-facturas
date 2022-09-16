<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facturas_compras extends Model
{
    use HasFactory;

    protected $table = 'facturas_compras';

    protected $guarded = ['id']; 

    protected $fillable = ['compra_id','factura_id'];

    public function compra_factura()
    {
        return $this->belongsto(Compra::class, 'compra_id');
    }

    public function factura()
    {
        return $this->belongsto(Facturas::class, 'factura_id');
    }
}
