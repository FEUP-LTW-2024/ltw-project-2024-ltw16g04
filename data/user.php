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
    }
    ?>