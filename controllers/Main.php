<?php

namespace controllers;

use controllers\base\WebController;
use utils\Template;

class Main extends WebController
{
    function about(): string
    {
        return Template::render("views/global/about.php");
    }
}