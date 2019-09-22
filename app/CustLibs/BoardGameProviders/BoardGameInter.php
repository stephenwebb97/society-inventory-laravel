<?php


namespace App\CustLibs\BoardGameProviders;


use App\CustLibs\AssetsProviders\AssetInter;

interface BoardGameInter extends AssetInter {

    function set_board_game_type(?string $board_game_type):void ;
    function get_board_game_type():?string ;
    function set_rating(?string $rating) :void ;
    function get_rating():?string ;
    function set_alternate_names(?array $alternate_names) ;
    function get_alternate_names():?array ;
    function set_is_expansion(?bool $is_expansion):void;
    function get_is_expansion():?bool ;
    function set_play_time(?int $play_time):void ;
    function get_play_time():?int ;
    function set_min_play_time(?int $min_play_time):void ;
    function get_min_play_time():?int;
    function set_max_play_time(?int $max_play_time):void;
    function get_max_play_time():?int ;
    function set_min_players(?int $min_players):void;
    function get_min_players():?int;
    function set_max_players(?int $max_players):void ;
    function get_max_players():?int ;
    function set_min_age(?int $min_age):void ;
    function get_min_age():?int ;
    function set_year_published(?string $year_published):void ;
    function get_year_published():?string ;

}