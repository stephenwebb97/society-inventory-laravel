<?php


namespace App\CustLibs\BoardGameProviders;


use App\CustLibs\BoardGameGeek\BoardGameGeekProviderInter;

class BoardGameProviderFact
{
    protected static $PossibleProviders = [
        "bgg" => [
                    "class" => BoardGameGeekProviderInter::class,
                    "display_name" => "BoardGameGeek",
                    "description" => "A BoardGame database"
                ]
    ];

    public static function make(string $id):BoardGameProviderInter{
        if (isset(BoardGameProviderFact::$PossibleProviders[$id])){
            return new BoardGameProviderFact::$PossibleProviders[$id]["class"]();
        }
        throw new \Exception("$id Provider doesn't Exist");
    }

    public static function get(string $id)
    {
        if (isset(BoardGameProviderFact::$PossibleProviders[$id])){
            return[
                "id" => $id,
                "display_name" => BoardGameProviderFact::$PossibleProviders[$id]["display_name"],
                "description" => BoardGameProviderFact::$PossibleProviders[$id]["description"]
            ];
        }
        throw new \Exception("$id Provider doesn't Exist");

    }

    public static function get_providers():array
    {
        $ret = [];
        foreach (BoardGameProviderFact::$PossibleProviders as $id => $info){
            array_push($ret,[
                "id" => $id,
                "display_name" =>$info["display_name"],
                "description" =>$info["description"]
            ]);
        }
        return  $ret;
    }

    public static function get_ids():array
    {
        return array_keys(BoardGameProviderFact::$PossibleProviders);
    }
}