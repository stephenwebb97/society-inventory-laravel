<?php


namespace App\CustLibs\BoardGameGeek;
use App\CustLibs\BoardGameProviders\BoardGame;
use App\CustLibs\BoardGameProviders\BoardGameInter;
use App\CustLibs\BoardGameProviders\BoardGameProviderInter;


class BoardGameGeekProviderInter implements BoardGameProviderInter
{
    var $bgg;
    public function __construct()
    {
        $this->bgg = new BoardGameGeek();
    }



    public function search(string $search):array
    {

        $results = $this->bgg->search($search);
        return array_map(function ($result){
            return new BoardGame(
                $result['id'],
                $result['name'],
                null,
                $result['year_published'],
                null,
                null,
                $result['type']
            );
        },$results);
    }

    public function get(string $id):BoardGameInter
    {
        $temp = $this->bgg->get($id);
        $ret = new BoardGame(
            $temp['id'],
            $temp['name'],
            $temp['description'],
            $temp['year_published'],
            null,
            $temp['image'],
            $temp['type'],
            $temp['rating'],
            $temp['alternate_names'],
            $temp['is_expansion'],
            $temp['play_time'],
            $temp['min_play_time'],
            $temp['max_play_time'],
            $temp['min_players'],
            $temp['max_players'],
            $temp['min_age']
        );


        return $ret;
    }

    function update(BoardGameInter $board_game,string $id = null): bool
    {
        if (is_null($id))
            $updateBG = $this->get($board_game->get_id());
        else{
            $updateBG = $this->get($id);
            $updateBG->set_id(null);
        }
        $board_game->update($updateBG);
        return true;
    }
}
