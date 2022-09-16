<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $passowrdAdmin = bcrypt('12345678');
        $passowrdBasic = bcrypt('87654321');

        User::create(['name'=>'Administrador','email'=>'administrador@gmail.com','password'=>$passowrdAdmin,'perfil_id'=>'1']);
        User::create(['name'=>'Basico','email'=>'usuariobasico@gmail.com','password'=>$passowrdBasic,'perfil_id'=>'2']);
    }
}
