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
            'name' => 'Vendido',
        ]);
        Status_Sale::create([
            'name' => 'Cancelado',
        ]);
        Status_Sale::create([
            'name' => 'Devolvido',
        ]);
        Status_Sale::create([
            'name' => 'Pendente',
        ]);
    }
}
