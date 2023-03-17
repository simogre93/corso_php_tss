<?php
namespace crud;

use models\User;

class UserCRUD {

    public function create(User $user)
    {
        $query = "INSERT INTO user (first_name, last_name, birthday, birth_city, regione_id, provincia_id, gender, username, password)
                    VALUES (:first_name, :last_name, :birthday, :birth_city, :regione_id, :provincia_id, :gender, :username, :password)
                    "; // : parametri query
        $conn = new \PDO(DB_DSN, DB_USER,DB_PASSWORD);
        $stm = $conn->prepare($query);
        // bindvalue() associa un valore a un parametro
        $stm->bindValue(':first_name', $user->first_name, \PDO::PARAM_STR);
        $stm->bindValue(':last_name', $user->last_name, \PDO::PARAM_STR);
        $stm->bindValue(':birthday', $user->birthday, \PDO::PARAM_STR);
        $stm->bindValue(':birth_city', $user->birth_city, \PDO::PARAM_STR);
        $stm->bindValue(':regione_id', $user->regione_id, \PDO::PARAM_INT);
        $stm->bindValue(':provincia_id', $user->provincia_id, \PDO::PARAM_INT);
        $stm->bindValue(':gender', $user->gender, \PDO::PARAM_STR);
        $stm->bindValue(':username', $user->username, \PDO::PARAM_STR);
        $stm->bindValue(':password', $user->password, \PDO::PARAM_STR);
        $stm->execute();

    }

    public function update()
    {
        
    }

    public function read(int $user_id=null)
    {
        $conn = new \PDO(DB_DSN, DB_USER,DB_PASSWORD);
        $query = "SELECT * FROM user;";
        $stm = $conn->prepare($query);
        $stm->execute();
        $result = $stm->fetchAll(\PDO::FETCH_CLASS,User::class);
        return $result;

    }

    public function delete()
    {
        
    }
}