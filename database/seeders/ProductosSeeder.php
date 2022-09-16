<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Producto;

class ProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Producto::create(['nombre'=>'Producto 1','precio'=>'117.57','impuesto'=>'5']);
        Producto::create(['nombre'=>'Producto 2','precio'=>'39.70','impuesto'=>'15']);
        Producto::create(['nombre'=>'Producto 3','precio'=>'35.47','impuesto'=>'12']);
        Producto::create(['nombre'=>'Producto 4','precio'=>'231.48','impuesto'=>'8']);
        Producto::create(['nombre'=>'Producto 5','precio'=>'53.95','impuesto'=>'10']);
    }
}
