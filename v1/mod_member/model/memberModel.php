<?php

class MemberModel extends Model{

    public function __construct($settings){


        $this->settings = $settings;

    }

    public function checkName(){

        

        $sql = "SELECT name FROM members WHERE name = ?";

        $result = $this->runQuery($sql, [
            $this->settings['name']
        ]);

        if ($result->rowCount() > 0){

            echo 'error';
            exit();
        }

        echo 'success';
    }

    public function addMember(MemberTable $member){

        $sql = "INSERT INTO members(name) VALUES (?)";

        $result = $this->runQuery($sql, [
            $member->getName()
        ]);

        if ($result){
            echo 'success';
        }
    }

    public function getAllMembers(){

        $sql = 'SELECT * FROM members ORDER BY id LIMIT 50';

        $result = $this->runQuery($sql);

        if($result->rowCount() > 0){
            while ($row = $result->fetch(PDO::FETCH_ASSOC)){
                $crew[] = new MemberTable($row);
            }
            return $crew;
        }
        return null;
    }

}

