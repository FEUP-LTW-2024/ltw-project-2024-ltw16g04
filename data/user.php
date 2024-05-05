<?php
    class User {
        public int $id_user;
        public string $name;
        public string $phone;
        public string $email;
        public string $password;
    

    public function __construct(int $id_user, string $name,string $phone, string $email, string $password){
        $this->id_user = $id_user;
        $this->name = $name;
        $this->phone = $phone;
        $this->email = $email;
        $this->password = $password;
    }


    static function addUser($id,$name ,$phone, $pwd, $email, $db){

        $stmt = $db->prepare('INSERT INTO USERS(id,name,phone,email,password) VALUES (?,?, ?, ?, ?);');
        $stmt->execute(array($id,$name,$phone, $email, $pwd));
    }

    static function getUser($id, $db): ?User {
        $query = 'SELECT * FROM Users WHERE id = ?';
        $stmt = $db->prepare($query);
        $stmt->execute(array($id));
        $user = $stmt->fetch();
        if($user){
            return new User(
                $user['id'],
                $user['name'],
                $user['phone'],
                $user['email'],
                $user['password']
            );
        } else {
            return NULL;
        }
    }


    static function checkUserWithEmail($email,$db){
        $query = 'SELECT * FROM Users WHERE email = ?';
        $stmt = $db->prepare($query);
        $stmt->execute(array($email));
        $user = $stmt->fetch();
        if($user){
            return new User(
                $user['id'],
                $user['name'],
                $user['phone'],
                $user['email'],
                $user['password']
            );
        } else {
            return NULL;
        }
    }

    static function checkUserWithPassword($email, $pwd, $db) : ?User {
    
        $query =  'SELECT * FROM 
                   Users WHERE 
                   email = ?';

        $stmt = $db->prepare($query);
        $stmt->execute(array($email));
        $user = $stmt->fetch();
        
        if ($user['password'] == $pwd) {
           
             return new User(
                $user['id'],
                $user['name'],
                $user['phone'],
                $user['email'],
                $user['password']
            );
        }

        else {return NULL;}
            
    }


    static function favoriteItem($user_id,$item_id, $db): ?bool{
        //see if the current user has the item in their favorites
        $query = 'SELECT * FROM Favorites WHERE user_id = ? AND item_id = ?';
        $stmt = $db->prepare($query);
        $stmt->execute(array($user_id, $item_id));
        $favorite = $stmt->fetch();

        if($favorite){
            return true;
        } else {
            return false;
        }
    }
    }
    ?>