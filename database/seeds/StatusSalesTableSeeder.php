<?php

use Illuminate\Database\Seeder;
use App\Status_Sale;

class StatusSalesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status_Sale::create([
            'name' => 'Vendidos',
        ]);
        Status_Sale::create([
            'name' => 'Cancelados',
        ]);
        Status_Sale::create([
            'name' => 'Devoluções',
        ]);
        Status_Sale::create([
            'name' => 'Pendentes',
        ]);
    }
}
