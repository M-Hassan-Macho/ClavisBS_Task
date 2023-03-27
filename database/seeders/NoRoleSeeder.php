<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
  
class NoRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
           'NoRole',
        ];
     
        foreach ($roles as $role) {
             Role::create(['name' => $role]);
        }
    }
}