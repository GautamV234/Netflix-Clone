<?php

class Season{

    private  $seasonNumber , $videos;
    public function __construct($seasonNumber , $videos){
        $this->videos = $videos;
        $this->seasonNumber = $seasonNumber;
    }

    public function getSeasonNumber(){

        return $this->seasonNumber;
    }
    public function getVideos(){

        return $this->videos;
    }
}

?>