<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
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
             'product-list',
             'product-create',
             'product-edit',
             'product-delete',
             'location-list',
             'location-create',
             'location-edit',
             'location-delete',
             'category-list',
             'category-create',
             'category-edit',
             'category-delete',
             'items-list',
             'items-create',
             'items-edit',
             'items-delete', 
             'machinery-list',
             'machinery-create',
             'machinery-edit',
             'machinery-delete', 
             'model-list',
             'model-create',
             'model-edit',
             'model-delete', 
             'manufacture-list',
             'manufacture-create',
             'manufacture-edit',
             'manufacture-delete', 
             'user-list',
             'user-create',
             'user-edit',
             'user-delete',  
          ];
       
          foreach ($permissions as $permission) {
               Permission::create(['name' => $permission]);
          }
    }
}
