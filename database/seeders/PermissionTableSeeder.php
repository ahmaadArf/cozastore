<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions=[
            'category-list','category-create','category-edit','category-delete',
            'color-list','color-create','color-edit','color-delete',
            'product-list','product-create','product-edit','product-delete',
            'productImage-list','productImage-create','productImage-edit','productImage-delete',
            'role-list','role-create','role-edit','role-delete',
            'size-list','size-create','size-edit','size-delete',
            'slider-list','slider-create','slider-edit','slider-delete',
            'user-list','user-create','user-edit','user-delete',
        ];

        foreach($permissions as $permission){
            Permission::create(['name'=>$permission]);
        }


    }
}
