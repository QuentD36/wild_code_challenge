<?php

class MemberView{

    private $settings = [];
    private $tpl;

    public function __construct($settings){

        $this->settings = $settings;
        $this->tpl = new Smarty();
    }

    public function generateView($members){

        if (!empty($members)){
            $firstCrew = array_slice($members, 0, round(count($members)/3));
            $secondCrew = array_slice($members, round(count($members)/3), round(count($members)/3));
            $thirdCrew = array_slice($members, (round(count($members)/3) + round(count($members)/3)), count($members)/3);

            $this->tpl->assign('firstCrew', $firstCrew );
            $this->tpl->assign('secondCrew', $secondCrew );
            $this->tpl->assign('thirdCrew', $thirdCrew );


        }else{

            $this->tpl->assign('firstCrew', $members );
            $this->tpl->assign('secondCrew', $members );
            $this->tpl->assign('thirdCrew', $members );


        }

        $this->tpl->display('mod_member/view/memberView.tpl');
    }
}