<?php

class SeasonProvider {

    private $con , $username;

    public function __construct($con , $username){
        $con = $this->con;
        $username = $this->username;

    }

    public function create($entity){

      $seasons = $entity->getSeasons();

      if(sizeof($seasons)==0){
        return; 
    }
    $seasonsHtml = "";
    foreach($seasons as $season){
      $seasonNumber =  $season-> getSeasonNumber(); 

      $videosHtml = "";
      foreach($season->getVideos() as $video){
          $videosHtml.=$this->createVideoSquare($video);
      }
      $seasonsHtml.="<div class='season'>
                     <h3 class='seasonNumber'> Season $seasonNumber</h3> 
                     <div class='videos'> $videosHtml </div>
                     </div>";
    }
    return $seasonsHtml;
    }

    public function createVideoSquare($video){

        $id = $video->getId();
        $thumbnail = $video->getThumbnail();
        $name = $video->getTitle();
        $description = $video->getDescription();
        $episodeNumber = $video->getEpisodeNumber();

        return "<a href='watch.php?id=$id'>
            <div class='episodeContainer'>
                <div class='content'>
                        <img src='$thumbnail'>

                        <div class='videoInfo'>
                            <h4>$name</h4>
                            <span>$description</span>
                        </div>
                    </div>
            </div>
         </a>";
    }

}

?>