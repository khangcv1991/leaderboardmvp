<?php

/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/12/17
 * Time: 2:04 AM
 */


class gameAction
{

    const PRE_GAME = 0;
    const START_GAME = 1;
    const END_GAME = 2;

    protected $DB;
    /**
     * gameAction constructor.
     */
    public function __construct($DB=null)
    {
        $this->DB = $DB;
    }

    public function newGame($game){

    }

    public function startGame($id){
        //0 - just created
        if($this->checkStatus($id) == self::PRE_GAME) {
            $this->generateContestsInGame($id);
            $this->updateGameStatus($id,self::START_GAME);
            return;
        }

        return;

    }

    public function endGame($id){
        $this->updateGameStatus($id,self::END_GAME);
    }


    public function allocateCompetitorGame($com1Id, $com2Id){


    }

    public function subscibleContest($contestId, $userId ){


    }

    public function getContestsByGame($gameId){
        $sql = "SELECT C.*
                FROM `contest` AS U
                INNER JOIN `user_game` AS UG
                ON U.id = UD.user_id
                INNER JOIN `game` AS G
                ON G.id = UG.game_id
                WHERE G.id = $gameId
                ";
        $stmt = $this->DB->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function updateContest($contestId){


    }



    private function updateGameStatus($id, $status){
        $sql = "UPDATE `game`
                SET
                `status` = $status
                WHERE `id` = $id;
                ";
        $stmt = $this->DB->prepare($sql);
        try {
            $affected_rows = $stmt->execute();
        }catch (Exception $err){
            return $err->errorInfo;
        }

        return $affected_rows;
    }

    private function checkStatus($id){

        $status = self::PRE_GAME;

        return $status;

    }

    private function getUsersByGame($id){
        $sql = "SELECT U.*
                FROM `user` AS U
                INNER JOIN `user_game` AS UG
                ON U.id = UD.user_id
                INNER JOIN `game` AS G
                ON G.id = UG.game_id
                WHERE G.id = $id
                ";
        $stmt = $this->DB->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    private function generateContestsInGame($id){

        $competitors = $this->getUsersByGame($id);

        $contests = array();
        for($i = 0; $i < sizeof($competitors) - 1; $i++  ){
            $contest = new ContestModel();
            $contest->round = $i;
            array_push($contest);
        }

        return $contest;



    }








}