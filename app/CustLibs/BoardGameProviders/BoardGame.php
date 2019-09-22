<?php


namespace App\CustLibs\BoardGameProviders;


use App\CustLibs\AssetsProviders\Asset;
use App\CustLibs\AssetsProviders\AssetInter;
use Illuminate\Support\Carbon;

class BoardGame extends Asset implements BoardGameInter
{
    protected $board_game_type;
    protected $rating;
    protected $alternate_names;
    protected $is_expansion;
    protected $play_time;
    protected $min_play_time;
    protected $max_play_time;
    protected $min_players;
    protected $max_players;
    protected $min_age;
    protected $year_published;

    public function __construct(string $id,
                                string $name,
                                string $description = null,
                                string $year_published = null,
                                Carbon $date_purchased = null,
                                string $image = null,
                                string $board_game_type = null,
                                string $rating = null,
                                array $alternate_names = null,
                                bool $is_expansion = null,
                                int $play_time = null,
                                int $min_play_time = null,
                                int $max_play_time = null,
                                int $min_players = null,
                                int $max_players = null,
                                int $min_age = null
    )
    {
        parent::__construct($id, $name, $description, $date_purchased, $image);
        $this->set_board_game_type($board_game_type);
        $this->set_rating($rating);
        $this->set_alternate_names($alternate_names);
        $this->set_is_expansion($is_expansion);
        $this->set_play_time($play_time);
        $this->set_min_play_time($min_play_time);
        $this->set_max_play_time($max_play_time);
        $this->set_min_players($min_players);
        $this->set_max_players($max_players);
        $this->set_min_age($min_age);
        $this->set_year_published($year_published);
    }

    function set_board_game_type(?string $board_game_type):void
    {
        $this->board_game_type = $board_game_type;
    }
    function get_board_game_type():?string {
        return $this->board_game_type;
    }
    function set_rating(?string $rating):void{
        $this->rating = $rating;
    }
    function get_rating():?string {
        return $this->rating;
    }
    function set_alternate_names(?array $alternate_names):void {
        $this->alternate_names = $alternate_names;
    }
    function get_alternate_names():?array {
        return $this->alternate_names;
    }

    function set_is_expansion(?bool $is_expansion):void {
        if (!is_null($is_expansion))
            $this->is_expansion = $is_expansion;
    }
    function get_is_expansion():?bool {
        return $this->is_expansion;
    }
    function set_play_time(?int $play_time):void {
        if (!is_null($play_time))
            $this->play_time = $play_time;
    }

    function get_play_time():?int {
        return $this->play_time;
    }

    function set_min_play_time(?int $min_play_time):void {
        $this->min_play_time = $min_play_time;
    }
    function get_min_play_time():?int {
        return $this->min_play_time;
    }

    function set_max_play_time(?int $max_play_time):void {
        $this->max_play_time = $max_play_time;
    }

    function get_max_play_time():?int {
        return $this->max_play_time;
    }
    function set_min_players(?int $min_players):void {
        $this->min_players = $min_players;
    }

    function get_min_players():?int {
        return $this->min_players;
    }

    function set_max_players(?int $max_players):void {
        $this->max_players = $max_players;
    }
    function get_max_players():?int {
        return $this->max_players;
    }
    function set_min_age(?int $min_age):void {
        $this->min_age = $min_age;
    }
    function get_min_age():?int {
        return $this->min_age;
    }

    function update(AssetInter $asset, bool $ignore_null = false)
    {
        parent::update($asset, $ignore_null);
        if ($asset instanceof BoardGameInter){
            if (!$ignore_null || !is_null($asset->get_board_game_type()) )
                $this->set_board_game_type($asset->get_board_game_type());
            if (!$ignore_null || !is_null($asset->get_rating()) )
                $this->set_rating($asset->get_rating());
            if (!$ignore_null || !is_null($asset->get_alternate_names()) )
                $this->set_alternate_names($asset->get_alternate_names());
            if (!$ignore_null || !is_null($asset->get_is_expansion()) )
                $this->set_is_expansion($asset->get_is_expansion());
            if (!$ignore_null || !is_null($asset->get_play_time()) )
                $this->set_play_time($asset->get_play_time());
            if (!$ignore_null || !is_null($asset->get_min_players()) )
                $this->set_min_players($asset->get_min_players());
            if (!$ignore_null || !is_null($asset->get_max_players()) )
                $this->set_max_players($asset->get_max_players());
            if (!$ignore_null || !is_null($asset->get_min_play_time()) )
                $this->set_min_play_time($asset->get_min_play_time());
            if (!$ignore_null || !is_null($asset->get_max_play_time()) )
                $this->set_max_play_time($asset->get_max_play_time());
            if (!$ignore_null || !is_null($asset->get_min_age()) )
                $this->set_min_age($asset->get_min_age());
            if (!$ignore_null || !is_null($asset->get_year_published()) )
                $this->set_year_published($asset->get_year_published());
        }
    }

    function set_year_published(?string $year_published): void
    {
        $this->year_published = $year_published;
    }

    function get_year_published(): ?string
    {
        return $this->year_published;
    }

    public function get_array(): array
    {
        return array_merge(parent::get_array(),[
            "board_game_type"=>$this->get_board_game_type(),
            "year_published"=>$this->get_year_published(),
            "rating"=>$this->get_rating(),
            "is_expansion"=>$this->get_is_expansion(),
            "play_time"=>$this->get_play_time(),
            "min_play_time"=>$this->get_min_play_time(),
            "max_play_time"=>$this->get_max_play_time(),
            "min_players"=>$this->get_min_players(),
            "max_players"=>$this->get_max_players(),
            "min_age"=>$this->get_min_age()
        ]);
    }
}