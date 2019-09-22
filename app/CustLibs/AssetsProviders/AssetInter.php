<?php


namespace App\CustLibs\AssetsProviders;
use Illuminate\Support\Carbon;

interface AssetInter {

    function update(AssetInter $asset, bool $ignore_null=false);
    function set_id(?string $id):void ;
    function get_id():?string ;
    function set_date_purchased(?Carbon $date_purchased):void;
    function get_date_purchased():?Carbon;
    function set_name(?string $name):void;
    function get_name():?string ;
    function set_description(?string $description):void ;
    function get_description():?string;
    function set_image(?string $image):void ;
    function get_image():?string ;
    function get_array():array ;

}