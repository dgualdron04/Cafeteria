<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'SuperAdmin']);
        $role2 = Role::create(['name' => 'Coordinador']);
        $role3 = Role::create(['name' => 'Tendero']);

        Permission::create(['name' => 'users.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'users.edit'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'users.update'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'users.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'users.store'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'users.destroy'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'categories.index'])->syncRoles([$role2]);
        Permission::create(['name' => 'categories.create'])->syncRoles([$role2]);
        Permission::create(['name' => 'categories.edit'])->syncRoles([$role2]);
        Permission::create(['name' => 'categories.show'])->syncRoles([$role2]);
        Permission::create(['name' => 'categories.destroy'])->syncRoles([$role2]);

        Permission::create(['name' => 'subcategories.index'])->syncRoles([$role2]);
        Permission::create(['name' => 'subcategories.create'])->syncRoles([$role2]);
        Permission::create(['name' => 'subcategories.edit'])->syncRoles([$role2]);
        Permission::create(['name' => 'subcategories.show'])->syncRoles([$role2]);
        Permission::create(['name' => 'subcategories.destroy'])->syncRoles([$role2]);

        Permission::create(['name' => 'ingredients.index'])->syncRoles([$role2, $role3]);
        Permission::create(['name' => 'ingredients.create'])->syncRoles([$role2, $role3]);
        Permission::create(['name' => 'ingredients.edit'])->syncRoles([$role2, $role3]);
        Permission::create(['name' => 'ingredients.destroy'])->syncRoles([$role2, $role3]);

        Permission::create(['name' => 'flavors.index'])->syncRoles([$role2, $role3]);
        Permission::create(['name' => 'flavors.create'])->syncRoles([$role2, $role3]);
        Permission::create(['name' => 'flavors.edit'])->syncRoles([$role2, $role3]);
        Permission::create(['name' => 'flavors.destroy'])->syncRoles([$role2, $role3]);

        Permission::create(['name' => 'brands.index'])->syncRoles([$role2, $role3]);
        Permission::create(['name' => 'brands.create'])->syncRoles([$role2, $role3]);
        Permission::create(['name' => 'brands.edit'])->syncRoles([$role2, $role3]);
        Permission::create(['name' => 'brands.destroy'])->syncRoles([$role2, $role3]);

        Permission::create(['name' => 'products.index'])->syncRoles([$role2, $role3]);
        Permission::create(['name' => 'products.create'])->syncRoles([$role2, $role3]);
        Permission::create(['name' => 'products.edit'])->syncRoles([$role2, $role3]);
        Permission::create(['name' => 'products.destroy'])->syncRoles([$role2, $role3]);

    }
}
