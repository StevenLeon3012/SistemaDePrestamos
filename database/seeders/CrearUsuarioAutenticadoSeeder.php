<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CrearUsuarioAutenticadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Usuario Autenticado',
            'email' => 'auth@gmail.com',
            'password' => bcrypt('123456')
        ]);

        $role = Role::create(['name' => 'Usuario Autenticado']);

        $permissions = ['17', '18', '19', '20', '21', '22', '23', '24'];

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);
    }
}
