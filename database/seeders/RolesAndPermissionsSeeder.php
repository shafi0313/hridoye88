<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        $pers = [
            'dashboard' => [
                'access-dashboard',
                'dashboard-manage',
            ],
            'user' => [
                'user-manage',
                'user-add',
                'user-edit',
                'user-delete',
                'user-impersonate',
                'user-access-dashboard',
            ],
            'activity' => [
                'activity-manage',
                'activity-add',
                'activity-edit',
                'activity-delete',
            ],
            'permission' => [
                'permission-manage',
                'permission-add',
                'permission-edit',
                'permission-delete',
                'permission-change',
            ],
            'role' => [
                'role-manage',
                'role-add',
                'role-edit',
                'role-delete',
                'role-change',
            ],
            'backup' => [
                'backup-manage',
                'backup-delete',
            ],
            'visitor' => [
                'visitor-manage',
                'visitor-delete',
            ],
            'setting' => [
                'setting-manage',
                'language-manage',
            ],
            'blog' => [
                'blog-manage',
                'blog-add',
                'blog-edit',
                'blog-delete',
            ],
            'header' => [
                'header-manage',
                'header-add',
                'header-edit',
                'header-delete',
            ],
            'member' => [
                'member-manage',
                'member-add',
                'member-edit',
                'member-delete',
            ],
            'menu' => [
                'menu-manage',
                'menu-add',
                'menu-edit',
                'menu-delete',
            ],
            'slider' => [
                'slider-manage',
                'slider-add',
                'slider-edit',
                'slider-delete',
            ],
            'profession' => [
                'profession-manage',
                'profession-add',
                'profession-edit',
                'profession-delete',
            ],
            'gallery-category' => [
                'gallery-category-manage',
                'gallery-category-add',
                'gallery-category-edit',
                'gallery-category-delete',
            ],
            'photo-gallery' => [
                'photo-gallery-manage',
                'photo-gallery-add',
                'photo-gallery-edit',
                'photo-gallery-delete',
            ],
            'video-gallery' => [
                'video-gallery-manage',
                'video-gallery-add',
                'video-gallery-edit',
                'video-gallery-delete',
            ],
            'event' => [
                'event-manage',
                'event-add',
                'event-edit',
                'event-delete',
            ],
            'message' => [
                'message-manage',
            ],
            'about' => [
                'about-manage',
            ],
            'blog' => [
                'blog-manage',
                'blog-add',
                'blog-edit',
                'blog-delete',
            ],
            'humanitarian-assistance' => [
                'humanitarian-assistance-manage',
                'humanitarian-assistance-add',
                'humanitarian-assistance-edit',
                'humanitarian-assistance-delete',
            ],
        ];
        foreach ($pers as $per => $val) {
            foreach ($val as $name) {
                Permission::create([
                    'module' => $per,
                    'name' => $name,
                    'removable' => 0,
                ]);
            }
        }

        // $superadmin = Role::create(['name' => 'superadmin','removable'=> 0]);
        $admin = Role::create(['name' => 'admin', 'removable' => 0]);
        $admin->givePermissionTo(Permission::all());
        $teacher = Role::create(['name' => 'user', 'removable' => 0]);
    }
}
