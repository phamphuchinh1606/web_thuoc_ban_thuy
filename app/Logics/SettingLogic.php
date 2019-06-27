<?php

namespace App\Logics;

use App\Common\Constant;
use App\Models\SettingBanner;
use App\Models\SettingTopBanner;
use App\Models\SettingTag;
use App\Models\SettingAppInfo;
use App\Models\TableNameDB;

class SettingLogic extends BaseLogic{

    public function find($bannerId){
        return SettingBanner::find($bannerId);
    }

    public function getBannerAll(){
        return SettingBanner::orderBy('sort_num','asc')->get();
    }

    public function createBanner($srcImage, $linkUrl, $sortNum){
        $banner = new SettingBanner();
        $banner->src_image = $srcImage;
        $banner->link_url = $linkUrl;
        if(isset($sortNum)){
            $banner->sort_num = $sortNum;
        }
        $banner->save();
        return $banner;
    }

    public function updateBanner($bannerId, $srcImage, $linkUrl, $sortNum){
        $banner = $this->find($bannerId);
        if(isset($banner)){
            if(isset($srcImage)){
                $banner->src_image = $srcImage;
            }
            $banner->link_url = $linkUrl;
            if(isset($sortNum)){
                $banner->sort_num = $sortNum;
            }
            $banner->save();
        }
    }

    public function deleteBanner($bannerId){
        SettingBanner::destroy($bannerId);
    }

    //Start Top Banner
    public function getTopBannerAll(){
        return SettingTopBanner::all();
    }

    public function createTopBanner($srcImage){
        $banner = new SettingTopBanner();
        $banner->src_image = $srcImage;
        $banner->save();
        return $banner;
    }

    public function deleteTopBanner($bannerId){
        SettingTopBanner::destroy($bannerId);
    }
    //End Top Banner

    //Start Tags Key
    public function getTagAll(){
        return SettingTag::all();
    }

    public function getTagByTagType($tagTypeId){
        return SettingTag::join(TableNameDB::$TableProductType.' as productType','productType.id','=','setting_tags.product_type_id')
            ->where('tag_type',$tagTypeId)->orderBy('sort_number','asc')
            ->select('setting_tags.*','productType.product_type_name', 'productType.slug')->get();
    }

    public function createTag($tagType = 1, $productTypeId, $tagName, $sortNumber){
        $tag = new SettingTag();
        $tag->product_type_id = $productTypeId;
        $tag->tag_type = $tagType;
        $tag->tag_name = $tagName;
        $tag->sort_number = $sortNumber;
        $tag->save();
        return $tag;
    }

    public function deleteTag($tagId){
        SettingTag::destroy($tagId);
    }
    //End Tags Key

    //Start App Info
    public function getAppInfo(){
        return SettingAppInfo::first();
    }

    public function createAppInfo(){
        $appInfo = new SettingAppInfo();
        $appInfo->save();
        return $appInfo;
    }

    public function save(SettingAppInfo $appInfo){
        if(isset($appInfo)){
            $appInfo->save();
        }
        return $appInfo;
    }

    public function updateAppInfo($params = []){
        if(isset($params['appId'])){
            $appInfo = SettingAppInfo::find($params['appId']);
            if(isset($appInfo)){
                $appInfo->app_name = $params['appName'];
                $appInfo->app_phone = $params['appPhone'];
                $appInfo->app_fax = $params['appFax'];
                $appInfo->app_email = $params['appEmail'];
                $appInfo->app_facebook = $params['appFacebook'];
                $appInfo->app_address = $params['appAddress'];
                $appInfo->app_address_google_map = $params['appAddressGoogleMap'];
                $appInfo->app_title_chat_box = $params['appTitleChatBox'];
                $appInfo->app_link_facebook_fanpage = $params['appLinkFacebookFanpage'];
                $appInfo->app_link_twitter = $params['appLinkTwitter'];
                $appInfo->app_link_youtube = $params['appLinkYoutube'];
                $appInfo->app_link_instagram = $params['appLinkInstagram'];
                $appInfo->app_make_product_video_one = $params['appMakeProductVideoOne'];
                $appInfo->app_make_product_video_two = $params['appMakeProductVideoTwo'];
                $appInfo->app_content = $params['appContent'];
                if(isset($params['imageIcon'])){
                    $appInfo->app_src_icon = $params['imageIcon'];
                }
                $appInfo->save();
            }
        }
    }
    //End App Info
}
