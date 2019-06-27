<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\TableNameDB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Data Slider Banner
        $arrayBanners = ['banners/1537759093_bn2.jpg','banners/1537759097_bn3.jpg','banners/1537759101_bn4.png'];
        foreach ($arrayBanners as $banner){
            DB::table(TableNameDB::$TableSettingBanner)->insert([
                'src_image' => $banner
            ]);
        }

        // Data Top Banner
        $arrayTopBanners = ['top_banners/1537758874_banner_top_1.jpg','top_banners/1537758879_banner_top_2.jpeg','top_banners/1537758884_banner_top_3.jpg'];
        foreach ($arrayTopBanners as $topBanner){
            DB::table(TableNameDB::$TableSettingTopBanner)->insert([
                'src_image' => $topBanner
            ]);
        }
    }
}
