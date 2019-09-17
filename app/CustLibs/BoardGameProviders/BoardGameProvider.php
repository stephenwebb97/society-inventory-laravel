<?php


namespace App\CustLibs\BoardGameProviders;
use App\CustLibs\BoardGameProviders\BoardGameInter;

interface BoardGameProvider
{
    function search(string $search_name):array;
    function get(string $id):BoardGameInter;
    function update(BoardGameInter $board_game):bool;
}