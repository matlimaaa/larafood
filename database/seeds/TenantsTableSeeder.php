<?php

use App\Models\{
    Plan,
    Tenant
};

use Illuminate\Database\Seeder;

class TenantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plan = Plan::first();

        $plan->tenants()->create([
            'cnpj' =>'23882706000120',
            'name' => 'Carcara Solution',
            'url' => 'carcara-solution',
            'email' => 'carcara@gmail.com',
        ]);
    }
}
