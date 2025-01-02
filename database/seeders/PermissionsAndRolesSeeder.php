<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsAndRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $permissions = [
            'role' => ['permission', 'view', 'create', 'edit', 'delete'],
            'menu' => ['permission', 'view', 'create', 'edit', 'delete'],
            'user' => ['view', 'create', 'edit', 'delete'],
            'product' => ['view', 'create', 'edit', 'delete'],
            'project-category' => ['view', 'create', 'edit', 'delete'],
            'project' => ['view', 'create', 'edit', 'delete'],
            'service' => ['view', 'create', 'edit', 'delete'],
            'company' => ['view', 'create', 'edit', 'delete'],
            'blog-category' => ['view', 'create', 'edit', 'delete'],
            'blog' => ['view', 'create', 'edit', 'delete'],
            'team' => ['view', 'create', 'edit', 'delete'],
            'lead' => ['view', 'delete'],
            'job-category' => ['view', 'create', 'edit', 'delete'],
            'job' => ['view', 'create', 'edit', 'delete'],
            'job-application' => ['view', 'delete'],
            'faq' => ['view', 'create', 'edit', 'delete'],
            'faq-category' => ['view', 'create', 'edit', 'delete'],
            'client' => ['view', 'create', 'edit', 'delete'],
            'counter' => ['view', 'create', 'edit', 'delete'],
            'testimonial' => ['view', 'create', 'edit', 'delete'],
            'slider' => ['view', 'create', 'edit', 'delete'],
            'feedback' => ['view', 'delete'],
            'setting' => ['view', 'create', 'edit'],
            'meta-data' => ['create', 'edit'],
            'og-data' => ['create', 'edit'],
            'quotation' => ['view', 'delete'],
            'journey' => ['view','edit','create','delete'],
            'aboutus-edits' => ['view', 'create', 'edit'],
            'activity' => ['view','edit','create','delete'],
        ];

        $superAdminRole = Role::firstOrCreate(['name' => 'Super Admin', 'guard_name' => 'web', 'remarks' => 'Full Access', 'is_default' => 1]);

        foreach ($permissions as $module => $actions) {
            foreach ($actions as $action) {
                $permissionName = "{$module}.{$action}";

                $permission = Permission::firstOrCreate(
                    ['name' => $permissionName, 'guard_name' => 'web'],
                    ['created_at' => Carbon::now(), 'updated_at' => Carbon::now()]
                );

                if (!$superAdminRole->hasPermissionTo($permission)) {
                    $superAdminRole->givePermissionTo($permission);
                }
            }
        }
        Artisan::call('permission:cache-reset');
        $this->command->info('Permissions have been seeded and assigned to the Super Admin role.');
    }
}
