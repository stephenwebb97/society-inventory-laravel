<?php


namespace App\CustLibs\BoardGameGeek;
use Nataniel\BoardGameGeek\Client;


class BoardGameGeek implements BoardGameGeekInterface
{
    var $client;
    public function __construct()
    {
        $this->client = new Client();
    }



    public function search(string $search)
    {
        $results = $this->client->search($search);
        $ret = [];
        foreach ($results as $result){
            $temp = [];
            $temp['id'] = $result->getId();
            $temp['name'] = $result->getName();
            $temp['type'] = $result->getType();
            $temp['year_published'] = $result->getYearPublished();
            array_push($ret,$temp);
        }
        return $ret;
    }

    public function get(int $id)
    {
        $result = $this->client->getThing($id,true);
        $temp = [];
        $temp['id'] = $result->getId();
        $temp['name'] = $result->getName();
        $temp['type'] = $result->getType();
        $temp['year_published'] = $result->getYearPublished();
        $temp['alternate_names'] = $result->getAlternateNames();
        $temp['artists'] = $result->getBoardgameArtists();
        $temp['base_game']= $result->getBoardgameBasegame();
        $temp['categories']= $result->getBoardgameCategories();
        $temp['expansions']= $result->getBoardgameExpansions();
        $temp['mechanics']= $result->getBoardgameMechanics();
        $temp['publishers']= $result->getBoardgamePublishers();
        $temp['rating']= $result->getRatingAverage();
        $temp['is_expansion']= $result->isBoardgameExpansion();
        $temp['play_time']= $result->getPlayingTime();
        $temp['min_play_time']= $result->getMinPlayTime();
        $temp['min_players']= $result->getMinPlayers();
        $temp['min_age']= $result->getMinAge();
        $temp['max_play_time']= $result->getMaxPlayTime();
        $temp['max_players']= $result->getMaxPlayers();
        $temp['language_dependence_level']= $result->getLanguageDependenceLevel();
        $temp['image']= $result->getImage();
        $temp['description']= $result->getDescription();

        return $temp;
    }

    public function getUser(string $name)
    {
        $user = $this->client->getUser($name);
        $temp['name'] = $user->getName();
        $temp['id'] = $user->getId();
        $temp['avatar'] = $user->getAvatar();
        $temp['login'] = $user->getLogin();
        $temp['last_name'] = $user->getLastName();
        $temp['first_name'] = $user->getFirstName();
        $temp['country'] = $user->getCountry();

        return $temp;
    }
}
