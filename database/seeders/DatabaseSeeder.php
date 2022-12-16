<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\Admin;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transaction_types')->insert([
            'name' => 'deposit',
            'positive' => true
        ]);
        DB::table('transaction_types')->insert([
            'name' => 'withdraw',
            'positive' => false
        ]);

        $admin = Customer::factory()->create();

        User::factory()
            ->admin()
            ->make([
                'scope_id' => $admin->id,
                'name' => $admin->name,
                'email' => $admin->email
            ]);

        $customer = Customer::factory()->create();

        User::factory()
            ->customer()
            ->make([
                    'scope_id' => $customer->id,
                    'name' => $customer->name,
                    'email' => $customer->email
                ]);

        DB::table('accounts')->insert([
            'customer_id' => $customer->id,
            'status' => 'open'
        ]);

    }
}
