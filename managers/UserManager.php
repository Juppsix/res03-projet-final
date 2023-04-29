<?php  
 
class UserManager extends AbstractManager {  
  
    public function getUserByEmail(string $email) : ?User
    {
        $query = $this->db->prepare('SELECT * FROM users WHERE email=:email'); //''
        $parameters = [
            'email' => $email
                        ];
        $query->execute($parameters);
        $log = $query->fetch(PDO::FETCH_ASSOC);
        
if($log=== false){
    return null;
}else{
        //$prod = new Product($product['name'], $product['slug'], $product['description'], $product['price']);
        $user = new User(null['id'], $log['username'], $log['email'], $log['password'], $log["role"]);
        // Pour accéder à la base de données utilisez $this->db

        return $user;
    
}
    }
  
    public function createUser(User $user) : User
    {
        var_dump($user);
        $query = $this->db->prepare('INSERT INTO users VALUES (null, :username, :email, :password, :role)');
        $parameters = [
            'username' => $user->getUsername(),
            'email' => $user->getEmail(),
            'password' => $user->getPassword(),
            'role' => $user->getRole()
            ];
            $query->execute($parameters);
            // $query->fetch(PDO::FETCH_ASSOC);
            // $id = $this->db->lastInsertId();
            // $user->setId($id);
        // Pour accéder à la base de données utilisez $this->db

        return $user;
    }
    
    public function editUser(User $user) : User 
    {
    $query = $this->db->prepare('UPDATE users set username = :username, email = :email, password = :password, role = :role');
     $parameters = [
         'username' => $user->getUsername(),
         'email' => $user->getEmail(),
         'password' => $user->getPassword(),
         'role' => $user->getRole()
         ];
         $query->execute($parameters);
         
         return $user;
    }
  
  public function deleteUser(User $user) : User 
  {
       $query = $this->db->prepare('DELETE FROM users WHERE username = :username');
        $parameters = [
            'users_username' => $userUsername
            ];
        $query->execute($parameters);    
  }
  
}