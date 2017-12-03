<?php

/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2/12/17
 * Time: 1:58 PM
 */

class UserAction{


    private $DB;
    /**
     * User constructor.
     */
    public function __construct($DB=null)
    {
        $this->DB = $DB;
    }


    public function getAllUsers(){
        $sql = "SELECT *
                FROM `user`";
        $stmt = $this->DB->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function getUserById($id){
        $sql = "SELECT *
                FROM `user` WHERE id = $id";
        $stmt = $this->DB->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function deleteUserById($id){

        $sql = "DELETE FROM user 
                WHERE id = $id";
        $stmt = $this->DB->prepare($sql);
        try {
            $affected_rows = $stmt->execute();
        }catch (Exception $err){
            return $err->errorInfo;
        }

        return $affected_rows;

    }
    public function addUser($user){
        $name = $user->name;
        $password = $user->password;
        $type = $user->type;
        $sql = "INSERT INTO `user`
                (`name`,
                `password`,
                `type`)
                VALUES
                ('$name', '$password',$type);";
        $stmt = $this->DB->prepare($sql);

        try {

            $affected_rows = $stmt->execute();
        }catch (Exception $err){
            return $err->errorInfo;
        }

        return $affected_rows;
    }

    public function updateUser($user){
        $sql = "UPDATE `game`.`user`
                SET
                `name` = :name,
                `password` = :password,
                `type` = :type,
                `isAdmin` = :isAdmin,
                `token` = :token,
                `expireDate` = :expireDate
                WHERE `id` = :id;
                ";
        $stmt = $this->DB->prepare($sql);
        try {
            $affected_rows = $stmt->execute(((array)$user));
        }catch (Exception $err){
            return $err->errorInfo;
        }

        return $affected_rows;
    }
}