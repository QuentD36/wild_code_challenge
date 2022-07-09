<?php

class MemberView{

    private $settings = [];
    private $tpl;

    public function __construct($settings){

        $this->settings = $settings;
        $this->tpl = new Smarty();
    }

    public function generateView($members){

        $firstCrew = array_chunk($members, count($members)/3);

        $this->tpl->assign('crew', $members);
        $this->tpl->assign('error', MemberTable::getErrorMsg());
        $this->tpl->assign('success', MemberTable::getSuccessMsg());


        $this->tpl->display('mod_member/view/memberView.tpl');
    }
}