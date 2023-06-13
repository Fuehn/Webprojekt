<?php
include_once "model/UserDao.php";
class DummyUserDaoFile implements UserDao
{
    //todo: implemetieren
    static function store($userdata)
    {
        $inp = file_get_contents('model/data/test.json');
        $tempArray = json_decode($inp, true);
        $tempArray[] = $userdata;
        $jsonData = json_encode($tempArray);
        file_put_contents('model/data/test.json', $jsonData);
    }
    //todo: implemetieren
    function checkLoginData($email, $pw)
    {
    }
    //todo: implemetieren
    function getUserData($userid)
    {
    }

    //todo: verbugt
    static function doesEmailExsist($email)
    {
        $inp = file_get_contents('model/data/test.json');
        $tempArray = json_decode($inp, true);
        foreach ($tempArray as $item) {
            foreach ($item as $entry) {
                if ($entry == $email) {
                    return true;
                } else {
                    return false;
                }
            }
        }
    }
}

class DummyUserDaoDatabase implements UserDao
{
    static function store($data)
    {
        $hashed_password = password_hash($data['password1'], PASSWORD_DEFAULT);
        try {
            $user = "root";
            $pw = null;
            $dsn = 'sqlite:model/data/test.db';
            $db = new PDO($dsn, $user, $pw);

            $db->beginTransaction();
            $sql = "INSERT INTO user (firstnames, surnames, email, postcode, password1) VALUES (:firstname, :surnames, :email, :postcode , :password1);";
            $kommando = $db->prepare($sql);
            $kommando->bindParam(":firstname", $data["firstnames"]);
            $kommando->bindParam(":surnames", $data["surnames"]);
            $kommando->bindParam(":email", $data["email"]);
            $kommando->bindParam(":postcode", $data["postcode"]);
            $kommando->bindParam(":password1", $hashed_password);
            $kommando->execute();
            $db->commit();

        } catch (Exception $ex) {
            $db->rollback();
        }

    }

    function getUserIdForRegistration($email)
    {
        try {
            $user = "root";
            $pw = null;
            $dsn = 'sqlite:model/data/test.db';
            $db = new PDO($dsn, $user, $pw);

            $sql = "SELECT userid FROM user WHERE email = '" . $email . "'";
            $ergebnis = $db->query($sql);
            $result = $ergebnis->fetch();

            return $result;

        } catch (Exception $ex) {
        }
    }
    function checkLoginData($email, $password)
    {
        if(DummyUserDaoDatabase::doesEmailExsist($email)){
            try {
                $user = "root";
                $pw = null;
                $dsn = 'sqlite:model/data/test.db';
                $db = new PDO($dsn, $user, $pw);
                $db->beginTransaction();
            
                $sql = "SELECT password1 FROM user WHERE user.email = '" . $email . "'";
                $ergebnis = $db->query($sql);
                $queryArray = $ergebnis -> fetch();
                $hashpw = $queryArray['password1'];

                if(password_verify($password, $hashpw)){
                    $db->commit();
                    return true;
                }else{
                    $db->commit();
                    return false;
                }
            } catch (Exception $ex) {
                $db->rollback();
            }
        }
    }
    function getUserData($userid)
    {
        try {
            $user = "root";
            $pw = null;
            $dsn = 'sqlite:model/data/test.db';
            $db = new PDO($dsn, $user, $pw);
        
            $sql = "SELECT firstnames, surnames, email, postcode FROM user WHERE userid = '".$userid."'";
            $ergebnis = $db->query($sql);
            $queryArray = $ergebnis -> fetch();
            if ($queryArray != null) {
                $data = array(
                    "firstnames" => $queryArray['firstnames'],
                    "surnames" => $queryArray['surnames'],
                    "email" => $queryArray["email"],
                    "postcode" => $queryArray['postcode']
                );
                return $data;
            } 
        } catch (Exception $ex) {
        }
    }
    function changedata($data, $userid){
        try {
            $user = "root";
            $pw = null;
            $dsn = 'sqlite:model/data/test.db';
            $db = new PDO($dsn, $user, $pw);
            $sql = "UPDATE user 
                SET firstnames = '".$data["firstnames"]."', surnames = '".$data["surnames"]."',  email = '".$data["email"]."', postcode = '".$data["postcode"]."'
                WHERE  userid = '".$userid."';";
            $db -> exec($sql);

        } catch (Exception $ex) {
        }
    }

    static function doesEmailExsist($email)
    {
        try {
            $user = "root";
            $pw = null;
            $dsn = 'sqlite:model/data/test.db';
            $db = new PDO($dsn, $user, $pw);

            $db->beginTransaction();
            $sql = "SELECT email FROM user WHERE user.email = '" . $email . "'";
            $ergebnis = $db->query($sql);
            if ($ergebnis->fetch() == null) {
                $db->commit();
                return false;
            } else {
                $db->commit();
                return true;
            }
        } catch (Exception $ex) {
            $db->rollback();
        }
    }

    static function doesDatabaseExsist()
    {
        if (file_exists("model/data/test.db")) {
            return true;
        } else {
            return false;
        }
    }

    static function createDatabase()
    {
        fopen("model/data/test.db", "w");
        try {
            $user = "root";
            $pw = null;
            $dsn = 'sqlite:model/data/test.db';
            $db = new PDO($dsn, $user, $pw);
            $db->beginTransaction();
            $sql1 = 'CREATE TABLE user(
                        userid INTEGER PRIMARY KEY,
                        -- Autoincrement, UNIQUE
                        firstnames TEXT,
                        surnames TEXT,
                        email TEXT,
                        postcode INTEGER,
                        password1 TEXT
                        )';
            $db->exec($sql1);
            $db->commit();


            $db->beginTransaction();
            $sql2 = 'CREATE TABLE post(
                postid INTEGER PRIMARY KEY,
                -- Autoincrement, UNIQUE
                title TEXT,
                content TEXT,
                post_location TEXT,
                rating INTEGER
                --FOREIGN KEY(post_userid) REFERENCES user(userid)
                )';
            $db->exec($sql2);
            $db->commit();


            $db->beginTransaction();
            $sql3 = 'CREATE TABLE comments(
                 comid INTEGER PRIMARY KEY,
                 -- Autoincrement, UNIQUE
                 title TEXT,
                 com_content TEXT,
                 com_date Date
                 --FOREIGN KEY(com_userid) REFERENCES user(userid)
                 )';
            $db->exec($sql3);
            $db->commit();

        } catch (Exception $ex) {
            $db->rollback();
        }
    }
}
?>