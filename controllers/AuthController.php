<?php  
 
class AuthController extends AbstractController {  
    
    private UserManager $um;
    
    public function __construct()  
    {  
        $this->um = new UserManager();
    }  
    /* Pour la page d'inscription */  
    public function register() : void  
    {  
      $this->render("register", []); // render la page avec le formulaire d'inscription  
    }  
      
    /* Pour vérifier l'inscription */  
    public function checkRegister() : void  
    {  
        if(isset($_POST["formName"])){// vérifier que le formulaire a été soumis
        
        $username = $_POST['username'];
        $email = $_POST['email'];   // récupérer les champs du formulaire  
        $password = $_POST['password'];
          
        $password_hash = password_hash($password, PASSWORD_DEFAULT);    // chiffrer le mot de passe    
        $user = new User(null, $username, $email, $password_hash);    // appeler le manager pour créer l'utilisateur en base de données   
        $this->um->createUser($user);
        $_SESSION["user"] = $user;    // connecter l utilisateur    
        header('Location: /res03-auth/');// le renvoyer vers l'accueil 
        }
        else{
        header('Location: /res03-auth/creer-un-compte'); 
        }
    }  
      
    /* Pour la page de connexion */  
    public function login() : void  
    {  
      $this->render("login", []);  // render la page avec le formulaire de connexion  
    }  
      
    /* Pour vérifier la connexion */  
    public function checkLogin() : void  
    {  
       if(isset($_POST["formName"])){ // vérifier que le formulaire a été soumis  
            $email = $_POST['email'];   // récupérer les champs du formulaire  
            $password = $_POST['password'];
            $user = $this->um->getUserByEmail($email); // si il existe, vérifier son mot de passe    
        
            if ($user)
            {
                if(password_verify($password, $user->getPassword())){
                    $_SESSION["user"] = $user;  // utiliser le manager pour vérifier si un utilisateur avec cet email existe    
                    header('Location: /res03-auth/'); // si il est bon, connecter l'utilisateur  
                }
                else{
                    header('Location: /res03-auth/connexion/'); // si il n'est pas bon renvoyer sur la page de connexion 
                }    
            }
            else{
                header('Location: /res03-auth/connexion/'); // si il n'existe pas renvoyer vers la page de connexion
            }
               
                    
                      
                   
                
       }
    }
}