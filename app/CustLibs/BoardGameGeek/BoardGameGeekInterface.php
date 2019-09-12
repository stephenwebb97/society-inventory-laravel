<?php

namespace App\CustLibs\BoardGameGeek;

interface BoardGameGeekInterface{
    public function search(string $search);

    public function get(int $id);

    public function getUser(string $name);
}
