<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BoardGameProvider extends Model
{
    protected $table = "board_game_providers";
    protected $keyType="string";
    public $incrementing = false;
}
