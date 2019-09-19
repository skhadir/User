<?php

namespace App\Model;
use Core\DB\AbstractModel;

class UserModel extends AbstractModel {

    function createAccount($firstname, $lastname, $email, $password, $svg){

        if(!empty($user)) {
            throw new Exception ('Un compte existe déjà');
        }

        $sql = 'INSERT INTO user 
            (FirstName, LastName, Email, Password, CreatedAt, Avatar)
            VALUES
            (?,?,?,?,NOW(),?)';
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $this->database->queryAction($sql, [$firstname, $lastname, $email, $hashedPassword, $svg]);


    }

    function checkUser($email, $password) {
        $sql = 'SELECT Id, Email, Password, FirstName, LastName
        FROM user
        WHERE Email=?';
        $user = $this->database->queryOne($sql, [$email]);


        if(!empty($user)){
            if(password_verify($password,$user['Password'])){
                return $user;
            }
        }
        throw new Exception('Identifiants incorrects');
    }

}