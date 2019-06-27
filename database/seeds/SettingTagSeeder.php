<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\TableNameDB;

class SettingTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Data Slider Banner
        $arrayTag = [
            [
                'tag_type' => 1,
                'tag_name' => 'Giày thể thao'
            ],
            [
                'tag_type' => 1,
                'tag_name' => 'Giày tập golf'
            ],
            [
                'tag_type' => 1,
                'tag_name' => 'Giày chơi bóng rổ'
            ],
            [
                'tag_type' => 1,
                'tag_name' => 'Giày đạp xe'
            ],
            [
                'tag_type' => 1,
                'tag_name' => 'Giày trượt ván'
            ],
            [
                'tag_type' => 1,
                'tag_name' => 'Giày cao gót'
            ],
            [
                'tag_type' => 1,
                'tag_name' => 'Giày Sneaker'
            ],
            [
                'tag_type' => 1,
                'tag_name' => 'Giày chạy bộ'
            ],
            [
                'tag_type' => 1,
                'tag_name' => 'Giày đá bòng'
            ],
            [
                'tag_type' => 1,
                'tag_name' => 'Giày chơi cầu lông'
            ],
            [
                'tag_type' => 1,
                'tag_name' => 'Giày thể thao'
            ],
            [
                'tag_type' => 1,
                'tag_name' => 'Giày leo núi'
            ],
            [
                'tag_type' => 1,
                'tag_name' => 'Giày tập thể hình'
            ],
            [
                'tag_type' => 1,
                'tag_name' => 'Giày lười'
            ],
            [
                'tag_type' => 1,
                'tag_name' => 'Giày Converse'
            ],
            [
                'tag_type' => 1,
                'tag_name' => 'Giày Phong Cách'
            ],

            [
                'tag_type' => 2,
                'tag_name' => 'Áo sơ mi nam'
            ],
            [
                'tag_type' => 2,
                'tag_name' => 'Áo thun nữ'
            ],
            [
                'tag_type' => 2,
                'tag_name' => 'Áo thun công sở'
            ],
            [
                'tag_type' => 2,
                'tag_name' => 'Áo thun nhăn'
            ],
            [
                'tag_type' => 2,
                'tag_name' => 'Áo thun tay ngắn'
            ],
            [
                'tag_type' => 2,
                'tag_name' => 'Áo thun cá tính'
            ],
            [
                'tag_type' => 2,
                'tag_name' => 'Áó thun cặp'
            ],
            [
                'tag_type' => 2,
                'tag_name' => 'Áo sát nách nam'
            ],
            [
                'tag_type' => 2,
                'tag_name' => 'Áo thun ngắn tay'
            ],
            [
                'tag_type' => 2,
                'tag_name' => 'Áo thun dạo phố'
            ],
            [
                'tag_type' => 2,
                'tag_name' => 'Kiểu xẻ nách'
            ],
            [
                'tag_type' => 2,
                'tag_name' => 'Áo thun cổ dài'
            ],
            [
                'tag_type' => 2,
                'tag_name' => 'Áo thun dài tay'
            ],
            [
                'tag_type' => 2,
                'tag_name' => 'Áo thun mỏng'
            ],
            [
                'tag_type' => 2,
                'tag_name' => 'Áo sát nách nữ'
            ],
            [
                'tag_type' => 2,
                'tag_name' => 'Gym'
            ],
        ];
        foreach ($arrayTag as $tag){
            DB::table(TableNameDB::$TableSettingTag)->insert([
                'tag_type' => $tag['tag_type'],
                'tag_name' => $tag['tag_name'],
                'product_type_id' => 11,
            ]);
        }
    }
}
