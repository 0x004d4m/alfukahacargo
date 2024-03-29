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

        DB::table('permissions')->insert([
            ["id"=>1,"name"=>"Manage Logs","guard_name"=>"web"],
            ["id"=>2,"name"=>"Manage Authentication","guard_name"=>"web"],
            ["id"=>3,"name"=>"Manage Contact requests","guard_name"=>"web"],
            ["id"=>4,"name"=>"View Company types","guard_name"=>"web"],
            ["id"=>5,"name"=>"Manage Company types","guard_name"=>"web"],
            ["id"=>6,"name"=>"View Legal statuses","guard_name"=>"web"],
            ["id"=>7,"name"=>"Manage Legal statuses","guard_name"=>"web"],
            ["id"=>8,"name"=>"View Countries","guard_name"=>"web"],
            ["id"=>9,"name"=>"Manage Countries","guard_name"=>"web"],
            ["id"=>10,"name"=>"View Cities","guard_name"=>"web"],
            ["id"=>11,"name"=>"Manage Cities","guard_name"=>"web"],
            ["id"=>12,"name"=>"View States","guard_name"=>"web"],
            ["id"=>13,"name"=>"Manage States","guard_name"=>"web"],
            ["id"=>14,"name"=>"View Companies","guard_name"=>"web"],
            ["id"=>15,"name"=>"Manage Companies","guard_name"=>"web"],
            ["id"=>16,"name"=>"View Auctions","guard_name"=>"web"],
            ["id"=>17,"name"=>"Manage Auctions","guard_name"=>"web"],
            ["id"=>18,"name"=>"View Auction locations","guard_name"=>"web"],
            ["id"=>19,"name"=>"Manage Auction locations","guard_name"=>"web"],
            ["id"=>20,"name"=>"View Cargo types","guard_name"=>"web"],
            ["id"=>21,"name"=>"Manage Cargo types","guard_name"=>"web"],
            ["id"=>22,"name"=>"View Ports","guard_name"=>"web"],
            ["id"=>23,"name"=>"Manage Ports","guard_name"=>"web"],
            ["id"=>24,"name"=>"View Rates","guard_name"=>"web"],
            ["id"=>25,"name"=>"Manage Rates","guard_name"=>"web"],
            ["id"=>26,"name"=>"View Departments","guard_name"=>"web"],
            ["id"=>27,"name"=>"Manage Departments","guard_name"=>"web"],
            ["id"=>28,"name"=>"View Branches","guard_name"=>"web"],
            ["id"=>29,"name"=>"Manage Branches","guard_name"=>"web"],
            ["id"=>30,"name"=>"View Loading statuses","guard_name"=>"web"],
            ["id"=>31,"name"=>"Manage Loading statuses","guard_name"=>"web"],
            ["id"=>32,"name"=>"View Order statuses","guard_name"=>"web"],
            ["id"=>33,"name"=>"Manage Order statuses","guard_name"=>"web"],
            ["id"=>34,"name"=>"View Order types","guard_name"=>"web"],
            ["id"=>35,"name"=>"Manage Order types","guard_name"=>"web"],
            ["id"=>36,"name"=>"View Locations","guard_name"=>"web"],
            ["id"=>37,"name"=>"Manage Locations","guard_name"=>"web"],
            ["id"=>38,"name"=>"View Orders","guard_name"=>"web"],
            ["id"=>39,"name"=>"Manage Orders","guard_name"=>"web"],
            ["id"=>40,"name"=>"View Inspections","guard_name"=>"web"],
            ["id"=>41,"name"=>"Manage Inspections","guard_name"=>"web"],
            ["id"=>42,"name"=>"View Services","guard_name"=>"web"],
            ["id"=>43,"name"=>"Manage Services","guard_name"=>"web"],
            ["id"=>44,"name"=>"View Documents","guard_name"=>"web"],
            ["id"=>45,"name"=>"Manage Documents","guard_name"=>"web"],
            ["id"=>46,"name"=>"View Notes","guard_name"=>"web"],
            ["id"=>47,"name"=>"Manage Notes","guard_name"=>"web"],
            ["id"=>48,"name"=>"View Parts","guard_name"=>"web"],
            ["id"=>49,"name"=>"Manage Parts","guard_name"=>"web"],
            ["id"=>50,"name"=>"View Addon services","guard_name"=>"web"],
            ["id"=>51,"name"=>"Manage Addon services","guard_name"=>"web"],
            ["id"=>52,"name"=>"View Insurances","guard_name"=>"web"],
            ["id"=>53,"name"=>"Manage Insurances","guard_name"=>"web"],
            ["id"=>54,"name"=>"View Payment methods","guard_name"=>"web"],
            ["id"=>55,"name"=>"Manage Payment methods","guard_name"=>"web"],
            ["id"=>56,"name"=>"View Payments","guard_name"=>"web"],
            ["id"=>57,"name"=>"Manage Payments","guard_name"=>"web"],
            ["id"=>58,"name"=>"View Invoices","guard_name"=>"web"],
            ["id"=>59,"name"=>"Manage Invoices","guard_name"=>"web"],
        ]);

        DB::table('roles')->insert([
            ["id"=>1,"name"=>"Super Admin","guard_name"=>"web"],
            ["id"=>2,"name"=>"Customer","guard_name"=>"web"],
        ]);

        DB::table('model_has_roles')->insert([
            ["role_id"=>1,"model_type"=>"App\Models\User","model_id"=>"1"],
        ]);

        DB::table('role_has_permissions')->insert([
            ["permission_id"=>1,"role_id"=>1],
            ["permission_id"=>2,"role_id"=>1],
            ["permission_id"=>3,"role_id"=>1],
            ["permission_id"=>4,"role_id"=>1],
            ["permission_id"=>5,"role_id"=>1],
            ["permission_id"=>6,"role_id"=>1],
            ["permission_id"=>7,"role_id"=>1],
            ["permission_id"=>8,"role_id"=>1],
            ["permission_id"=>9,"role_id"=>1],
            ["permission_id"=>10,"role_id"=>1],
            ["permission_id"=>11,"role_id"=>1],
            ["permission_id"=>12,"role_id"=>1],
            ["permission_id"=>13,"role_id"=>1],
            ["permission_id"=>14,"role_id"=>1],
            ["permission_id"=>15,"role_id"=>1],
            ["permission_id"=>16,"role_id"=>1],
            ["permission_id"=>17,"role_id"=>1],
            ["permission_id"=>18,"role_id"=>1],
            ["permission_id"=>19,"role_id"=>1],
            ["permission_id"=>20,"role_id"=>1],
            ["permission_id"=>21,"role_id"=>1],
            ["permission_id"=>22,"role_id"=>1],
            ["permission_id"=>23,"role_id"=>1],
            ["permission_id"=>24,"role_id"=>1],
            ["permission_id"=>25,"role_id"=>1],
            ["permission_id"=>26,"role_id"=>1],
            ["permission_id"=>27,"role_id"=>1],
            ["permission_id"=>28,"role_id"=>1],
            ["permission_id"=>29,"role_id"=>1],
            ["permission_id"=>30,"role_id"=>1],
            ["permission_id"=>31,"role_id"=>1],
            ["permission_id"=>32,"role_id"=>1],
            ["permission_id"=>33,"role_id"=>1],
            ["permission_id"=>34,"role_id"=>1],
            ["permission_id"=>35,"role_id"=>1],
            ["permission_id"=>36,"role_id"=>1],
            ["permission_id"=>37,"role_id"=>1],
            ["permission_id"=>38,"role_id"=>1],
            ["permission_id"=>39,"role_id"=>1],
            ["permission_id"=>40,"role_id"=>1],
            ["permission_id"=>41,"role_id"=>1],
            ["permission_id"=>42,"role_id"=>1],
            ["permission_id"=>43,"role_id"=>1],
            ["permission_id"=>44,"role_id"=>1],
            ["permission_id"=>45,"role_id"=>1],
            ["permission_id"=>46,"role_id"=>1],
            ["permission_id"=>47,"role_id"=>1],
            ["permission_id"=>48,"role_id"=>1],
            ["permission_id"=>49,"role_id"=>1],
            ["permission_id"=>50,"role_id"=>1],
            ["permission_id"=>51,"role_id"=>1],
            ["permission_id"=>52,"role_id"=>1],
            ["permission_id"=>53,"role_id"=>1],
            ["permission_id"=>54,"role_id"=>1],
            ["permission_id"=>55,"role_id"=>1],
            ["permission_id"=>56,"role_id"=>1],
            ["permission_id"=>57,"role_id"=>1],
            ["permission_id"=>58,"role_id"=>1],
            ["permission_id"=>59,"role_id"=>1],

            ["permission_id"=>24,"role_id"=>2],//View Rates
            ["permission_id"=>38,"role_id"=>2],//View Orders
            ["permission_id"=>56,"role_id"=>2],//View Payments
            ["permission_id"=>58,"role_id"=>2],//View Invoices
        ]);
    }
}
