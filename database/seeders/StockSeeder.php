<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Stock;

class StockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stocks = [
            [
                'goods_id' => 1,
                'code' => '00001',
                'amount' => 100,
                'total_price' => 200.00,
                'stock_type' => 'stock-in',
                'input' => 'ใบส่งเข้า',
                'responsible' => 'admin@mail.com',
            ],
            [
                'goods_id' => 1,
                'code' => '00002',
                'amount' => 20,
                'total_price' => 40.00,
                'stock_type' => 'stock-in',
                'input' => 'ใบส่งเข้า',
                'responsible' => 'admin@mail.com',
            ],
            [
                'goods_id' => 1,
                'code' => '00003',
                'amount' => 10,
                'total_price' => 20.00,
                'stock_type' => 'stock-in',
                'input' => 'ใบส่งเข้า',
                'responsible' => 'admin@mail.com',
            ],
            [
                'goods_id' => 1,
                'code' => '00004',
                'amount' => 10,
                'total_price' => 200.00,
                'stock_type' => 'stock-out',
                'input' => 'ใบส่งออก',
                'responsible' => 'admin@mail.com',
                'office' => 'test.co.th',
                'delivery_route' => 'สายไหม',
                'seller' => 'คนขาย 1',
                'customer' => 'ลูกค้า 1',
            ],
            [
                'goods_id' => 1,
                'code' => '00005',
                'amount' => 5,
                'total_price' => 100.00,
                'stock_type' => 'stock-out',
                'input' => 'ใบส่งออก',
                'responsible' => 'admin@mail.com',
                'office' => 'test.co.th',
                'delivery_route' => 'สายไหม',
                'seller' => 'คนขาย 2',
                'customer' => 'ลูกค้า 2',
            ],
            [
                'goods_id' => 1,
                'code' => '00006',
                'amount' => 10,
                'total_price' => 200.00,
                'stock_type' => 'stock-out',
                'input' => 'ใบส่งออก',
                'responsible' => 'admin@mail.com',
                'office' => 'test.co.th',
                'delivery_route' => 'สายไหม',
                'seller' => 'คนขาย 3',
                'customer' => 'ลูกค้า 3',
            ],
            [
                'goods_id' => 2,
                'code' => '00007',
                'amount' => 80,
                'total_price' => 160.00,
                'stock_type' => 'stock-in',
                'input' => 'ใบส่งเข้า',
                'responsible' => 'admin@mail.com',
            ],
            [
                'goods_id' => 2,
                'code' => '00008',
                'amount' => 40,
                'total_price' => 80.00,
                'stock_type' => 'stock-in',
                'input' => 'ใบส่งเข้า',
                'responsible' => 'admin@mail.com',
            ],
            [
                'goods_id' => 3,
                'code' => '00009',
                'amount' => 20,
                'total_price' => 30.00,
                'stock_type' => 'stock-in',
                'input' => 'ใบส่งเข้า',
                'responsible' => 'admin@mail.com',
            ],
            [
                'goods_id' => 3,
                'code' => '00010',
                'amount' => 40,
                'total_price' => 90.00,
                'stock_type' => 'stock-in',
                'input' => 'ใบส่งเข้า',
                'responsible' => 'admin@mail.com',
            ],
        ];

        foreach($stocks as $s){
            Stock::create($s);
        }
    }
}
