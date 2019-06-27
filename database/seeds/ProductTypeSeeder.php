<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\TableNameDB;
use App\Models\ProductType;

class ProductTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Data Slider Banner
        $productTypes = [
            [
                'product_type_name' => 'PLC',
                'parrent_id' => '',
                'image_icon' => 'product_types/1537764639_sidebarleft_icon1.png'
            ],
            [
                'product_type_name' => 'HMI',
                'parrent_id' => '',
                'image_icon' => 'product_types/1537764886_sidebarleft_icon2.png'
            ],
            [
                'product_type_name' => 'INVERTER',
                'parrent_id' => '',
                'image_icon' => 'product_types/1537764895_sidebarleft_icon3.png'
            ],
            [
                'product_type_name' => 'FLOWMETER',
                'parrent_id' => '',
                'image_icon' => 'product_types/1537764902_sidebarleft_icon4.png'
            ],
            [
                'product_type_name' => 'TIMER, ENCODER, SENSOR',
                'parrent_id' => '',
                'image_icon' => 'product_types/1537764915_sidebarleft_icon5.png'
            ],
            [
                'product_type_name' => 'PHỤ KIỆN TỦ ĐIỆN',
                'parrent_id' => '',
                'image_icon' => 'product_types/1537764928_sidebarleft_icon6.png'
            ],
            [
                'product_type_name' => 'SERVO',
                'parrent_id' => '',
                'image_icon' => 'product_types/1537764936_sidebarleft_icon7.png'
            ],
            [
                'product_type_name' => 'Autonics',
                'parrent_id' => '',
                'image_icon' => 'product_types/1537764947_sidebarleft_icon9.png'
            ],
            [
                'product_type_name' => 'SCHNEIDER',
                'parrent_id' => '1',
                'image_icon' => ''
            ],
            [
                'product_type_name' => 'IDEC',
                'parrent_id' => '1',
                'image_icon' => ''
            ],
            [
                'product_type_name' => 'SIEMENS',
                'parrent_id' => '1',
                'image_icon' => ''
            ],
            [
                'product_type_name' => 'MITSUBISHI',
                'parrent_id' => '1',
                'image_icon' => ''
            ],
            [
                'product_type_name' => 'SCHNEIDER',
                'parrent_id' => '2',
                'image_icon' => ''
            ],
            [
                'product_type_name' => 'OMRON',
                'parrent_id' => '2',
                'image_icon' => ''
            ],
            [
                'product_type_name' => 'XTOP',
                'parrent_id' => '2',
                'image_icon' => ''
            ],
            [
                'product_type_name' => 'OMRON',
                'parrent_id' => '3',
                'image_icon' => ''
            ],
            [
                'product_type_name' => 'VFD- M Series',
                'parrent_id' => '3',
                'image_icon' => ''
            ],
            [
                'product_type_name' => 'PARKER',
                'parrent_id' => '4',
                'image_icon' => ''
            ],
        ];
        foreach ($productTypes as $productType){
            $productTypeDb = new ProductType();
            $productTypeDb->product_type_name = $productType['product_type_name'];
            if($productType['parrent_id'] != ''){
                $productTypeDb->parent_id = $productType['parrent_id'];
            }
            if($productType['image_icon'] != ''){
                $productTypeDb->image_icon = $productType['image_icon'];
            }
            $productTypeDb->is_public = 1;
            $productTypeDb->is_delete = 0;
            $productTypeDb->save();
        }
    }
}
