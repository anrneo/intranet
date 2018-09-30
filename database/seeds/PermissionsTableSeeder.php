<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Usuarios
        Permission::create([
            'name'          => 'Navegar usuarios',
            'slug'          => 'users.index',
            'description'   => 'Lista y navega todos los usuarios de la intranet',
        ]);

        Permission::create([
            'name'          => 'Ver detalle de usuario',
            'slug'          => 'users.show',
            'description'   => 'Ve en detalle cada usuario de la intranet',            
        ]);
        
        Permission::create([
            'name'          => 'Crear de usuario',
            'slug'          => 'users.create',
            'description'   => 'Crear un usuario en la intranet',
        ]);
        
        Permission::create([
            'name'          => 'Edición de usuarios',
            'slug'          => 'users.edit',
            'description'   => 'Editar cualquier dato de un usuario de la intranet',
        ]);
        
        Permission::create([
            'name'          => 'Eliminar usuario',
            'slug'          => 'users.destroy',
            'description'   => 'Eliminar cualquier usuario de la intranet',      
        ]);

        //Roles
        Permission::create([
            'name'          => 'Navegar roles',
            'slug'          => 'roles.index',
            'description'   => 'Lista y navega todos los roles de la intranet',
        ]);

        Permission::create([
            'name'          => 'Ver detalle de un rol',
            'slug'          => 'roles.show',
            'description'   => 'Ve en detalle cada rol de la intranet',            
        ]);
        
        Permission::create([
            'name'          => 'Creación de roles',
            'slug'          => 'roles.create',
            'description'   => 'Crear nuevos roles en la intranet',
        ]);
        
        Permission::create([
            'name'          => 'Edición de roles',
            'slug'          => 'roles.edit',
            'description'   => 'Editar cualquier dato de un rol de la intranet',
        ]);
        
        Permission::create([
            'name'          => 'Eliminar roles',
            'slug'          => 'roles.destroy',
            'description'   => 'Eliminar cualquier rol de la intranet',      
        ]);

        //Pqrdats
        Permission::create([
            'name'          => 'Navegar pqrdats',
            'slug'          => 'pqrdats.index',
            'description'   => 'Lista y navega todos los pqrdats de la intranet',
        ]);

        Permission::create([
            'name'          => 'Ver detalle de un pqrdat',
            'slug'          => 'pqrdats.show',
            'description'   => 'Ve en detalle cada pqrdat de la intranet',            
        ]);
        
        Permission::create([
            'name'          => 'Creación de pqrdats',
            'slug'          => 'pqrdats.create',
            'description'   => 'Crear nuevos pqrdats en el sistema',
        ]);
        
        Permission::create([
            'name'          => 'Edición de pqrdats',
            'slug'          => 'pqrdats.edit',
            'description'   => 'Editar cualquier dato de un pqrdat de la intranet',
        ]);
        
        Permission::create([
            'name'          => 'Eliminar pqrdats',
            'slug'          => 'pqrdats.destroy',
            'description'   => 'Eliminar cualquier pqrdat de la intranet',      
        ]);
    }
}
