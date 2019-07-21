<?php declare(strict_types=1);

namespace controllers;

use core\music;
use core\concert;

class MusicController
{
    private $music;

    /**
     * UsersController constructor.
     */
    public function __construct(Music $music)
    {
        $this->music = $music;
    }

    public function defaultMusic(): string
    {
        return "music default";
    }

    public function addMusic()
    {
        $form = $this->music->getRegisterForm();
        $v = new View("addMusic", "front");
        $v->assign("form", $form);
    }

    public function saveAction()
    {
        $form = $this->music->getRegisterForm();
        $method = strtoupper($form["config"]["method"]);
        $data = $GLOBALS["_" . $method];

        if ($_SERVER['REQUEST_METHOD'] == $method && !empty($data)) {

            $validator = new Validator($form, $data);
            $form["errors"] = $pianiste->errors;

            if (empty($errors)) {
                $this->music->setFirstname($data["firstname"]);
                $this->music->setLastname($data["lastname"]);
                $this->music->setEmail($data["email"]);
                $this->music->setPwd($data["pwd"]);
                $this->music->save();
            }

        }

        $v = new Concert("addMusic", "front");
        $v->assign("form", $form);

    }

    public function loginMusic()
    {

        $form = $this->music->getLoginForm();

        $method = strtoupper($form["config"]["method"]);
        $data = $GLOBALS["_" . $method];
        if ($_SERVER['REQUEST_METHOD'] == $method && !empty($data)) {

            $validator = new Pianiste($form, $data);
            $form["errors"] = $pianiste->errors;

            if (empty($errors)) {
                $token = md5(substr(uniqid() . time(), 4, 10) . "mxu(4il");
                // TODO: connexion
            }

        }

        $v = new Concert("loginMusic", "front");
        $v->assign("form", $form);

    }

    public function forgetPasswordAction()
    {

        $v = new Concert("forgetPasswordMusic", "front");

    }
}