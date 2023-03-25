<?php

namespace Database\Seeders;

use App\Enums\Core\RolesEnum;
use App\Models\User;
use Auth;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DashboardRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Artisan::call('permission:cache-reset');
        $this->setupPermissions();
        //
        $this->setupRoles();
        $this->setupUsers();
    }

    private function setupUsers()
    {
        Auth::shouldUse('dashboard');
        tap(User::updateOrCreate(['email' => 'admin@admin.com'], [
            'name'     => 'Super Admin',
            'email'    => 'admin@admin.com',
            'phone'    => '96651010101010',
            'active'   => true,
            'password' => '123456',
        ]))->assignRole([
            RolesEnum::super()->value,
            RolesEnum::admin()->value,
        ]);
        echo 'Admins Created Successfully'.PHP_EOL;
    }

    private function setupRoles()
    {
        Role::query()->delete();
        $roles = collect(RolesEnum::toArray())
            ->transform(fn ($i) => ['name' => $i, 'guard_name' => 'dashboard'])
            ->toArray();

        Role::insert($roles);

        Role::findByName('super', 'dashboard')
            ->permissions()->sync(Permission::where('guard_name', 'dashboard')->pluck('id'));

        echo 'Roles Created Successfully'.PHP_EOL;
    }

    private function setupPermissions()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('permissions')->truncate();
        DB::table('role_has_permissions')->truncate();
        DB::table('roles')->truncate();
        DB::table('model_has_roles')->truncate();
        DB::table('model_has_permissions')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $permissions = collect([
            ['name'=>'view_admins', 'name_en' => 'view admins', 'name_ar' => 'عرض المدراء'],
            ['name'=>'create_admins', 'name_en' => 'create admins', 'name_ar' => 'إنشاء مدراء'],
            ['name'=>'update_admins', 'name_en' => 'update admins', 'name_ar' => 'تعديل المدراء'],
            ['name'=>'delete_admins', 'name_en' => 'delete admins', 'name_ar' => 'حذف المدراء'],
            ['name'=>'view_roles', 'name_en' => 'view roles', 'name_ar' => 'عرض الأدوار'],
            ['name'=>'create_roles', 'name_en' => 'create roles', 'name_ar' => 'إنشاء أدوار'],
            ['name'=>'update_roles', 'name_en' => 'update roles', 'name_ar' => 'تعديل الأدوار'],
            ['name'=>'delete_roles', 'name_en' => 'delete roles', 'name_ar' => 'حذف الأدوار'],
            ['name'=>'view_setting', 'name_en' => 'view setting', 'name_ar' => 'عرض الإعدادات'],
            ['name'=>'update_setting', 'name_en' => 'update setting', 'name_ar' => 'تغيير الإعدادات'],
            ['name'=>'view_contacts', 'name_en' => 'view contacts', 'name_ar' => 'عرض جهات الاتصال'],
            ['name'=>'view_notifications', 'name_en' => 'view notifications', 'name_ar' => 'عرض الإشعارات'],
            ['name'=>'create_packages', 'name_en' => 'create packages', 'name_ar' => 'إنشاء باقات'],
            ['name'=>'update_packages', 'name_en' => 'update packages', 'name_ar' => 'تعديل الباقات'],
            ['name'=>'delete_packages', 'name_en' => 'delete packages', 'name_ar' => 'حذف الباقات'],
            ['name'=>'view_packages', 'name_en' => 'view packages', 'name_ar' => 'عرض الباقات'],
            ['name'=>'create_homesections', 'name_en' => 'create homesections', 'name_ar' => 'إنشاء أقسام الصفحة الرئيسية'],
            ['name'=>'update_homesections', 'name_en' => 'update homesections', 'name_ar' => 'تعديل أقسام الصفحة الرئيسية'],
            ['name'=>'delete_homesections', 'name_en' => 'delete homesections', 'name_ar' => 'حذف أقسام الصفحة الرئيسية'],
            ['name'=>'view_homesections', 'name_en' => 'view homesections', 'name_ar' => 'عرض أقسام الصفحة الرئيسية'],
            ['name'=>'admin_profile', 'name_en' => 'admin profile', 'name_ar' => 'صفحة الأدمن الشخصية'],
        ]);
        Permission::insert($permissions->transform(fn ($i) => ['name' => $i['name'], 'name_ar' => $i['name_ar'], 'name_en' => $i['name_en'], 'guard_name' => 'dashboard'])
                                       ->toArray());
        echo 'Permissions Created Successfully'.PHP_EOL;

        return $permissions;
    }
}
