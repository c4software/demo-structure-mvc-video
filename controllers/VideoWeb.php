<?php

namespace controllers;

use controllers\base\WebController;
use models\SampleVideo;
use utils\Template;

class VideoWeb extends WebController
{
    private SampleVideo $videoModel;

    function __construct()
    {
        $this->videoModel = new SampleVideo();

        // Décommenter pour avoir des données depuis une base de données
        //$this->videoModel = new DBVideo();
    }

    function home(): string
    {
        // Récupération des vidéos par le modèle
        $videos = $this->videoModel->getVideos();
        return Template::render("./views/video/home.php", array("videos" => $videos));
    }

    /**
     * $id est automatiquement rempli via la valeur du GET
     * @param string $id
     * @return string
     */
    function tv(string $id): string
    {
        $video = $this->videoModel->getByVideoId($id);

        if (!$video) {
            $this->redirect("/");
        }

        return Template::render("./views/video/tv.php", array("video" => $video));
    }
}