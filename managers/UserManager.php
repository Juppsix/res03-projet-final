<?php  
 
class UserManager extends AbstractManager {  
  
    public function getUserByEmail(string $email) : User
    {
        $query = $this->db->prepare('SELECT * FROM users WHERE email=:email'); //''
        $parameters = [
            'email' => $email
                        ];
        $query->execute($parameters);
        $log = $query->fetch(PDO::FETCH_ASSOC);

        //$prod = new Product($product['name'], $product['slug'], $product['description'], $product['price']);
        $user = new User(null['id'], $log['username'], $log['email'], $log['password']);
        // Pour accéder à la base de données utilisez $this->db

        return $user;
    }
  
    public function createUser(User $user) : User
    {
        $query = $this->db->prepare('INSERT INTO users VALUES (:id, :username, :email, :password)');
        $parameters = [
            'id' => $user->getId(),
            'username' => $user->getUsername(),
            'email' => $user->getEmail(),
            'password' => $user->getPassword()
            ];
            $query->execute($parameters);
            $query->fetch(PDO::FETCH_ASSOC);
            $id = $this->db->lastInsertId();
            $user->setId($id);
        // Pour accéder à la base de données utilisez $this->db

        return $user;
    }
  
}