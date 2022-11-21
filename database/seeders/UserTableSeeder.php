<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::truncate();
        Role::truncate();
        User::truncate();
        $adminRole = Role::create(['name' => 'Admin']);
        $writerRole = Role::create(['name' => 'writer']);
        $verPostPermiso = Permission::create(['name' => 'Ver Posts']);
        $crearPostPermiso = Permission::create(['name' => 'Crear Posts']);
        $editarPostPermiso = Permission::create(['name' => 'Editar Posts']);
        $actualizarPostPermiso = Permission::create(['name' => 'Actualizar Posts']);
        $eliminarPostPermiso = Permission::create(['name' => 'Eliminar Posts']);

        $admin = new User;
        $admin->name = 'Sepha';
        $admin->email = 'rocho@gmail.com';
        $admin->password = bcrypt('123123');
        $admin->save();
        $admin->assignRole($adminRole);

        $writer = new User;
        $writer->name = 'Sephathias';
        $writer->email = 'rochorocho@gmail.com';
        $writer->password = bcrypt('123123');
        $writer->save();
        $writer->assignRole($writerRole);

        $other = new User;
        $other->name = 'Ramon';
        $other->email = 'ramoncho@gmail.com';
        $other->password = bcrypt('123123');
        $other->givePermissionTo('Ver Posts');
        $other->assignRole($writerRole);
        $other->save();
    }
}
