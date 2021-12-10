<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Goods;

class GoodsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $goods = [
            [
                'name' => 'Coca cola',
                'type' => 'เครื่องดื่ม',
                'storage' => 'โซน A',
                'price' => 20.00,
                'remain' => 105,
            ],
            [
                'name' => 'KIT KAT',
                'type' => 'ขนม',
                'storage' => 'โซน B',
                'price' => 25.00,
                'remain' => 120,
            ],
            [
                'name' => 'มาม่า',
                'type' => 'บะหมี่กึ่งสำเร็จรูป',
                'storage' => 'โซน C',
                'price' => 6.00,
                'remain' => 60,
            ],
        ];

        foreach($goods as $g){
            Goods::create($g);
        }
    }
}
