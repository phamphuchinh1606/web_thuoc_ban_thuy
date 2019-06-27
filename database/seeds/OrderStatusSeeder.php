<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrayStatus = ['Đơn hàng mới','Đang giao hàng','Hoàn thành'];
        foreach ($arrayStatus as $statusName){
            DB::table('order_statuses')->insert([
                'status_name' => $statusName
            ]);
        }
    }
}
