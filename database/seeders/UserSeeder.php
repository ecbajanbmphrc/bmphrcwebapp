<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        User::truncate();


        $users = [
         [
             'first_name' =>'Super Admin',
             'last_name' => 'Bmpower',
             'contact_number' => '09123456789',
             'email' => 'superadmin@gmail.com',
             'password' => Hash::make('Bmpower@123'),
             'user_type' => 'Super Admin',
             'company_id' => '1',
             'is_active' => 1,
             'created_at' => now(),
             'updated_at' => now(),
         ],
         [           
             'first_name' =>'Admin',
             'last_name' => 'Bmpower',
             'contact_number' => '09123456789',
             'email' => 'admin@gmail.com',
             'password' => Hash::make('Bmpower@123'),
             'user_type' => 'Admin',
             'company_id' => '1',
             'is_active' => 1,
             'created_at' => now(),
             'updated_at' => now(),
         ],
         [
            'first_name' => 'Payroll Head',
            'last_name' =>'Bmpower',
            'contact_number' => '09123456789',
             'email' => 'payrollhead@gmail.com',
             'password' => Hash::make('Bmpower@123'),
             'user_type' => 'Payroll Head',
             'company_id' => '1',
             'is_active' => 1,
             'created_at' => now(),
             'updated_at' => now(),
         ],
         [
            'first_name' => 'Payroll Officer',
            'last_name' =>'Bmpower',
            'contact_number' => '09123456789',
             'email' => 'payrollofficer@gmail.com',
             'password' => Hash::make('Bmpower@123'),
             'user_type' => 'Payroll Officer',
             'company_id' => '1',
             'is_active' => 1,
             'created_at' => now(),
             'updated_at' => now(),
         ],
         [
            'first_name' => 'Account Supervisor',
            'last_name' =>'Bmpower',
            'contact_number' => '09123456789',
             'email' => 'accountsupervisor@gmail.com',
             'password' => Hash::make('Bmpower@123'),
             'user_type' => 'Account Supervisor',
             'company_id' => '2',
             'is_active' => 1,
             'created_at' => now(),
             'updated_at' => now(),
         ],
         [
            'first_name' => 'Merchandiser',
            'last_name' =>'Bmpower',
            'contact_number' => '09123456789',
             'email' => 'merchandiser@gmail.com',
             'password' => Hash::make('Bmpower@123'),
             'user_type' => 'Merchandiser',
             'company_id' => '1',
             'is_active' => 1,
             'created_at' => now(),
             'updated_at' => now(),
         ]
         ];
         User::insert($users);

    }
}
