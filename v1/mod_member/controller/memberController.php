<?php

class MemberController{

    private $settings = [];
    private $model;
    private $view;

    public function __construct($settings){

        $this->settings = $settings;

        $this->model = new MemberModel($settings);

        $this->view = new MemberView($settings);
    }


    public function checkMember(){

        $checkMember = new MemberTable($this->settings);

        $this->model->checkName();
    }

    public function addMember(){

        $newMember = new MemberTable($this->settings);
        if ($newMember->getAllowDB() == false){
            echo 'error';
        }

        $this->model->addMember($newMember);
    }

    public function getList(){
        $crew = $this->model->getAllMembers();

        $this->view->generateView($crew);
    }
}