<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(['id' => 1,'name' => "admin",'email' => "admin@app.com",'password' => Hash::make('admin1234')]);

        // DB::table('permissions')->insert([
        //     ["id"=>1,"name"=>"Manage Address Types","guard_name"=>"web"],
        //     ["id"=>2,"name"=>"Manage Customers","guard_name"=>"web"],
        //     ["id"=>3,"name"=>"Manage Drivers","guard_name"=>"web"],
        //     ["id"=>4,"name"=>"Manage Orders","guard_name"=>"web"],
        //     ["id"=>5,"name"=>"Manage Payment Methods","guard_name"=>"web"],
        //     ["id"=>6,"name"=>"Manage Products","guard_name"=>"web"],
        //     ["id"=>7,"name"=>"Manage Stations","guard_name"=>"web"],
        //     ["id"=>8,"name"=>"Manage Authentication","guard_name"=>"web"],
        //     ["id"=>9,"name"=>"Manage Slide Show","guard_name"=>"web"],
        //     ["id"=>10,"name"=>"Manage Categories","guard_name"=>"web"],
        //     ["id"=>11,"name"=>"Manage Coupons","guard_name"=>"web"],
        //     ["id"=>12,"name"=>"Manage Wallet Ratio","guard_name"=>"web"],
        //     ["id"=>13,"name"=>"Manage Countries","guard_name"=>"web"],
        //     ["id"=>14,"name"=>"Manage Terms And Conditions","guard_name"=>"web"],
        // ]);

        // DB::table('roles')->insert([
        //     ["id"=>1,"name"=>"Super Admin","guard_name"=>"web"],
        //     ["id"=>2,"name"=>"Site Admin","guard_name"=>"web"],
        //     ["id"=>3,"name"=>"Owner Site","guard_name"=>"web"],
        //     ["id"=>4,"name"=>"CRM Site","guard_name"=>"web"],
        //     ["id"=>5,"name"=>"Vendor Site","guard_name"=>"web"]
        // ]);

        // DB::table('model_has_roles')->insert([
        //     ["role_id"=>1,"model_type"=>"App\Models\User","model_id"=>"1"],
        // ]);

        // DB::table('role_has_permissions')->insert([
        //     ["permission_id"=>1,"role_id"=>1],
        //     ["permission_id"=>2,"role_id"=>1],
        //     ["permission_id"=>3,"role_id"=>1],
        //     ["permission_id"=>4,"role_id"=>1],
        //     ["permission_id"=>5,"role_id"=>1],
        //     ["permission_id"=>6,"role_id"=>1],
        //     ["permission_id"=>7,"role_id"=>1],
        //     ["permission_id"=>8,"role_id"=>1],
        //     ["permission_id"=>9,"role_id"=>1],
        //     ["permission_id"=>10,"role_id"=>1],
        //     ["permission_id"=>11,"role_id"=>1],
        //     ["permission_id"=>12,"role_id"=>1],
        //     ["permission_id"=>13,"role_id"=>1],
        //     ["permission_id"=>14,"role_id"=>1],

        //     ["permission_id"=>1,"role_id"=>2],
        //     ["permission_id"=>5,"role_id"=>2],
        //     ["permission_id"=>7,"role_id"=>2],
        //     ["permission_id"=>8,"role_id"=>2],

        //     ["permission_id"=>7,"role_id"=>3],
        //     ["permission_id"=>6,"role_id"=>3],
        //     ["permission_id"=>3,"role_id"=>3],

        //     ["permission_id"=>2,"role_id"=>4],
        //     ["permission_id"=>4,"role_id"=>4],

        //     ["permission_id"=>2,"role_id"=>5],
        //     ["permission_id"=>3,"role_id"=>5],
        //     ["permission_id"=>4,"role_id"=>5],
        // ]);
    }
}
