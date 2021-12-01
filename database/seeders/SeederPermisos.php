<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class SeederPermisos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'docente-list',
            'docente-create',
            'docente-edit',
            'docente-delete',
            'equipo-list',
            'equipo-create',
            'equipo-edit',
            'equipo-delete',
            'prestamo-list',
            'prestamo-create',
            'prestamo-edit',
            'prestamo-delete',
            'reporte-list',
            'reporte-create',
            'reporte-edit',
            'reporte-delete'

         ];

         foreach ($permissions as $permission) {
              Permission::create(['name' => $permission]);
         }
    }
}
