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
           'user-list',
           'user-create',
           'user-edit',
           'user-delete',
           'employee-list',
           'employee-create',
           'employee-edit',
           'employee-delete',
           'company-list',
           'company-create',
           'company-edit',
           'company-delete',
           'note-list',
           'note-create',
           'note-edit',
           'note-delete',
           'userhasnotes-list',
           'userhasnotes-create',
           'userhasnotes-edit',
           'userhasnotes-delete',
           'employeehasnotes-list',
           'employeehasnotes-create',
           'employeehasnotes-edit',
           'employeehasnotes-delete',
           'companyhasnotes-list',
           'companyhasnotes-create',
           'companyhasnotes-edit',
           'companyhasnotes-delete',
        ];
     
        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}