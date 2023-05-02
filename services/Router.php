<?php  
 
class Router {  
    private ProgrammationController $ptrl;
    private ArtistController $atrl;
    private HomeController $htrl;
    private AuthController $auth;
  
    public function __construct()  
        {  
            $this->ptrl = new ProgrammationController();
            $this->atrl = new ArtistController();
            $this->htrl = new HomeController();
            $this->auth = new AuthController(); 
        }
    private function splitRouteAndParameters(string $route) : array  
        {  
            $routeAndParams = [];  
            $routeAndParams["route"] = null;  
            $routeAndParams["programmationSlug"] = null;  
            $routeAndParams["artistSlug"] = null;  
            
            
            if(strlen($route) > 0) // si la chaine de la route n'est pas vide (donc si ça n'est pas la home)  
            {  
                $tab = explode("/", $route);  
          
                if($tab[0] === "programmations") // écrire une condition pour le cas où la route commence par "categories"  
                {  
                    // mettre les bonnes valeurs dans le tableau  
                    $routeAndParams["route"] = "programmations";  
                }  
                // else if($tab[0] === "programmation" && isset($tab[1])) // écrire une condition pour le cas où la route commence par "produits"  
                // {  
                //     // mettre les bonnes valeurs dans le tableau  
                //     $routeAndParams["route"] = "programmation";
                //     $routeAndParams["programmationSlug"] = $tab[1]; 
                    
                // }
                
                else if($tab[0] === "programmation" && isset($tab[1]))  
{  
                // mettre les bonnes valeurs dans le tableau  
                $this->routeAndParams["route"] = "programmation";
                $this->routeAndParams["programmationSlug"] = $tab[1]; 
}
                else if($tab[0] === "create-programmation")
                {
                    $routeAndParams["route"] = "create-programmation";
                }
                else if($tab[0] === "edit-programmation" && isset($tab[1]))
                {
                    $routeAndParams["route"] = "edit-programmation";
                    $routeAndParams["programmationSlug"] = $tab[1];
                }
                else if($tab[0] === "delete-programmation" && isset($tab[1]))
                {
                    $routeAndParams["route"] = "delete-programmation";
                    $routeAndParams["programmationSlug"] = $tab[1];
                }
                 else if($tab[0] === "billetterie")
                {
                    $routeAndParams["route"] = "billetterie";
                }
                else if($tab[0] === "artists") // écrire une condition pour le cas où la route commence par "categories"  
                {  
                    // mettre les bonnes valeurs dans le tableau  
                    $routeAndParams["route"] = "artists";  
                }  
                else if($tab[0] === "artist" && isset($tab[1])) // écrire une condition pour le cas où la route commence par "produits"  
                {  
                    // mettre les bonnes valeurs dans le tableau  
                    $routeAndParams["route"] = "artist";
                    $routeAndParams["programmationSlug"] = $tab[1]; 
                    
                }
                else if($tab[0] === "create-artist")
                {
                    $routeAndParams["route"] = "create-artist";
                }
                else if($tab[0] === "edit-artist" && isset($tab[1]))
                {
                    $routeAndParams["route"] = "edit-artist";
                    $routeAndParams["programmationSlug"] = $tab[1];
                }
                else if($tab[0] === "delete-artist" && isset($tab[1]))
                {
                    $routeAndParams["route"] = "delete-artist";
                    $routeAndParams["programmationSlug"] = $tab[1];
                }
                
                else if($tab[0] === "creer-un-compte") // écrire une condition pour le cas où la route commence par "creer-un-compte"  
                {  
                    // mettre les bonnes valeurs dans le tableau  
                    $routeAndParams["route"] = $tab[0];  
                }  
                else if($tab[0] === "check-creer-un-compte") // écrire une condition pour le cas où la route commence par "check-creer-un-compte"  
                {  
                    // mettre les bonnes valeurs dans le tableau  
                    $routeAndParams["route"] = $tab[0];  
                }  
                else if($tab[0] === "connexion") // écrire une condition pour le cas où la route commence par "connexion"  
                {  
                    // mettre les bonnes valeurs dans le tableau  
                    $routeAndParams["route"] = $tab[0];  
                }  
                else if($tab[0] === "check-connexion") // écrire une condition pour le cas où la route commence par "check-connexion"  
                {  
                    // mettre les bonnes valeurs dans le tableau  
                    $routeAndParams["route"] = $tab[0];  
                }
                else if($tab[0] === "check-artists")
                {
                    $routeAndParams["route"] = $tab[0];
                }
                else if($tab[0] === "check-creer-artists")
                {
                    $routeAndParams["route"] = $tab[0];
                }
                else if($tab[0] === "create-prog")
                {
                    $routeAndParams["route"] = $tab[0];
                }
                 else if($tab[0] === "edit-prog")
                {
                    $routeAndParams["route"] = $tab[0];
                    $routeAndParams["programmationSlug"] = $tab[1]; 
                }
                else if($tab[0] === "check-creer-programmation")
                {
                    $routeAndParams["route"] = $tab[0];
                }
                else if($tab[0] === "home")
                {
                    $routeAndParams["route"] = $tab[0];
                }
                else if($tab[0] === "progs")
                {
                    $routeAndParams["route"] = $tab[0];
                }
                else if($tab[0] === "prog")
                {
                    $routeAndParams["route"] = $tab[0];
                }
                 else if($tab[0] === "billetterie")
                {
                    $routeAndParams["route"] = $tab[0];
                }
                else if($tab[0] === "deconnexion")
                {
                    $routeAndParams["route"] = $tab[0];
                }
                  else if($tab[0] === "admin-artist")
                {
                    $routeAndParams["route"] = $tab[0];
                }
                   else if($tab[0] === "admin-progs")
                {
                    $routeAndParams["route"] = $tab[0];
                }
                else if($tab[0] === "404")
                {
                    $routeAndParams["route"] = $tab[0];
                }
                else if($tab[0] === "informations")
                {
                    $routeAndParams["route"] = $tab[0];
                }
                
            }
            
            else  
            {  
                $routeAndParams["route"] = "";  
            }  
          
            return $routeAndParams;  
        }
        
        
    public function checkRoute(string $route) : void  
    {  
        $routeTab = $this->splitRouteAndParameters($route);
        
    
        if($routeTab['route'] === "") // condition(s) pour envoyer vers la home  
        {  
            // appeler la méthode du controlleur pour afficher la home
            $this->htrl->index();
        }  
        else if($routeTab['route'] === "artists" && $routeTab['artistSlug'] === null) // condition(s) pour envoyer vers la liste des produits  
        {  
            // appeler la méthode du controlleur pour afficher les produits
            $this->atrl->artists();
        }  
        else if($routeTab['route'] === "artist" && $routeTab['artistSlug'] !== null) // condition(s) pour envoyer vers le détail d'un produit  
        {  
            // appeler la méthode du controlleur pour afficher le détail d'un produit
            $this->atrl->artist($routeTab['artistSlug']);
        }
        else if($routeTab['route'] === "create-artist")
         {
            if ($_SESSION['user'] === "admin") {
                  $this->atrl->createArtist($_POST);
            } else {
                header('Location: /res03-projet-final');
            }
         }
         else if($routeTab['route'] === "edit-artist" && $routeTab['artistSlug'] !== null)
         {
             if ($_SESSION['user'] === "admin") {
                $this->atrl->editArtist($routeTab['artistSlug']);
            } else {
                header('Location: /res03-projet-final');
            }
         }
         else if($routeTab['route'] === "delete-artist" && $routeTab['artistSlug'] !== null)
         {
             if ($_SESSION['user'] === "admin") {
                 $this->atrl->deleteArtist($routeTab['artistSlug']);
            } else {
                header('Location: /res03-projet-final');
            }
         }
        else if($routeTab['route'] === "programmations" && $routeTab['programmationSlug'] === null) // condition(s) pour envoyer vers la liste des produits  
        {  
            // appeler la méthode du controlleur pour afficher les produits
            $this->ptrl->programmations();
        }  
         else if($routeTab['route'] === "programmation" && $routeTab['programmationSlug'] !== null) // condition(s) pour envoyer vers le détail d'un produit  
        {  
            // appeler la méthode du controlleur pour afficher le détail d'un produit
            $this->ptrl->programmation($routeTab['programmationSlug']);
        }
          else if($routeTab['route'] === "create-prog")
         {
              if ($_SESSION['user'] === "admin") {
                 $this->ptrl->createProgrammation($_POST);
            } else {
                header('Location: /res03-projet-final');
            }
             
         }
         else if($routeTab['route'] === "edit-prog" && $routeTab['programmationSlug'] !== null)
         {
               if ($_SESSION['user'] === "admin") {
             $this->ptrl->editProgrammation($routeTab['programmationSlug']);
            } else {
                header('Location: /res03-projet-final');
            }
         }
         else if($routeTab['route'] === "delete-prog" && $routeTab['programmationSlug'] !== null)
         {
               if ($_SESSION['user'] === "admin") {
               $this->ptrl->deleteProgrammation($routeTab['programmationSlug']);
            } else {
                header('Location: /res03-projet-final');
            }
         }
        
        else if($routeTab["route"] === "creer-un-compte") // condition pour afficher la page du formulaire d'inscription  
        {  
            $this->auth->register();// appeler la méthode du controlleur pour afficher la page d'inscription  
        }  
        else if($routeTab["route"] === "check-creer-un-compte") // condition pour l'action du formulaire d'inscription  
        {  
            $this->auth->checkRegister($_POST);// appeler la méthode du controlleur pour créer un utilisateur et renvoyer vers l'accueil  
        }  
        else if($routeTab["route"] === "connexion") // condition pour afficher la page du formulaire de connexion  
        {  
            $this->auth->login(); // appeler la méthode du controlleur pour afficher la page d'inscription  
        }  
        else if($routeTab["route"] === "check-connexion") // condition pour l'action du formulaire de connexion  
        {  
            $this->auth->checkLogin($_POST); // appeler la méthode du controlleur pour vérifier la connexion et renvoyer vers l'accueil  
        }
        else if($routeTab["route"] === "deconnexion") // condition pour l'action du formulaire de connexion  
        {  
            $this->auth->logout($_POST); // appeler la méthode du controlleur pour vérifier la connexion et renvoyer vers l'accueil  
        }
         else if($routeTab["route"] === "admin-artist") // condition pour l'action du formulaire de connexion  
        {  
             if ($_SESSION['user'] === "admin") {
            $this->atrl->adminListeArtist(); // appeler la méthode du controlleur pour vérifier la connexion et renvoyer vers l'accueil  
            } else {
                header('Location: /res03-projet-final');
            }
        }
          else if($routeTab["route"] === "admin-progs") // condition pour l'action du formulaire de connexion  
        {  
            if ($_SESSION['user'] === "admin") {
                $this->ptrl->adminListProgrammation(); 
            } else {
                header('Location: /res03-projet-final');
            }
        }
        else if($routeTab["route"] === "404") // condition pour l'action du formulaire de connexion  
        {  
            
        }
    
}
}


        // else if($routeTab["route"] === "creer-un-compte") // condition pour afficher la page du formulaire d'inscription  
        // {  
        //     $this->auth->register();// appeler la méthode du controlleur pour afficher la page d'inscription  
        // }  
        // else if($routeTab["route"] === "check-creer-un-compte") // condition pour l'action du formulaire d'inscription  
        // {  
        //     $this->auth->checkRegister();// appeler la méthode du controlleur pour créer un utilisateur et renvoyer vers l'accueil  
        // }  
        // else if($routeTab["route"] === "connexion") // condition pour afficher la page du formulaire de connexion  
        // {  
        //     $this->auth->login(); // appeler la méthode du controlleur pour afficher la page d'inscription  
        // }  
        // else if($routeTab["route"] === "check-connexion") // condition pour l'action du formulaire de connexion  
        // {  
        //     $this->auth->checkLogin(); // appeler la méthode du controlleur pour vérifier la connexion et renvoyer vers l'accueil  
        // }
        
  