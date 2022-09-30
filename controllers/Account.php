<?php


namespace controllers;


use controllers\base\WebController;
use models\SampleAccount;
use utils\SessionHelpers;
use utils\Template;

class Account extends WebController
{
    protected SampleAccount $account;

    public function __construct()
    {
        $this->account = new SampleAccount();
    }

    function login(): string
    {
        if (isset($_POST['login']) && isset($_POST['password'])) {
            if ($this->account->login($_POST["login"], $_POST["password"])) {
                $this->redirect("me");
            }
        }

        return Template::render("views/account/login.php", []);
    }

    function logout()
    {
        SessionHelpers::logout();
        $this->redirect("/login");
    }

    function me(): string
    {
        return Template::render("views/account/me.php", []);
    }
}