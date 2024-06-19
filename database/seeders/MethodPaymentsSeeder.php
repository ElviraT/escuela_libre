<?php

namespace Database\Seeders;

use App\Models\MethodPayment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MethodPaymentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $maritals = array("Transferencia", "Efectivo", "Cheque");

        foreach ($maritals as $item) {
            MethodPayment::create([
                'name' => $item,
                'id_status' => 1,
            ]);
        }
    }
}
