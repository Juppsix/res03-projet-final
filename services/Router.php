<?php  
 
class Router {  
    private ProgrammationController $ptrl;
    private ArtistController $atrl;
    private AuthController $auth; 
    private HomeController $htrl;
  
    public function __construct()  
        {  
            $this->ptrl = new ProgrammationController();
            $this->atrl = new ArtistController();
            $this->auth = new AuthController(); 
            $this->htrl = new HomeController();
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
                else if($tab[0] === "programmation" && isset($tab[1])) // écrire une condition pour le cas où la route commence par "produits"  
                {  
                    // mettre les bonnes valeurs dans le tableau  
                    $routeAndParams["route"] = "programmation";
                    $routeAndParams["programmationSlug"] = $tab[1]; 
                    
                }
                else if($tab[0] === "creer-une-programmation")
                {
                    $routeAndParams["route"] = "creer-une-programmation";
                }
                else if($tab[0] === "modifier-une-programmation" && isset($tab[1]))
                {
                    $routeAndParams["route"] = "modifier-une-programmation";
                    $routeAndParams["programmationSlug"] = $tab[1];
                }
                else if($tab[0] === "supprimer-une-programmation" && isset($tab[1]))
                {
                    $routeAndParams["route"] = "supprimer-une-programmation";
                    $routeAndParams["programmationSlug"] = $tab[1];
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
                else if($tab[0] === "creer-un-artist")
                {
                    $routeAndParams["route"] = "creer-un-artist";
                }
                else if($tab[0] === "modifier-un-artist" && isset($tab[1]))
                {
                    $routeAndParams["route"] = "modifier-un-artist";
                    $routeAndParams["programmationSlug"] = $tab[1];
                }
                else if($tab[0] === "supprimer-un-artist" && isset($tab[1]))
                {
                    $routeAndParams["route"] = "supprimer-un-artist";
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
                else if($tab[0] === "creer-programmation")
                {
                    $routeAndParams["route"] = $tab[0];
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
            $this->atrl->artistList();
        }  
        else if($routeTab['route'] === "artists" && $routeTab['artistSlug'] !== null) // condition(s) pour envoyer vers le détail d'un produit  
        {  
            // appeler la méthode du controlleur pour afficher le détail d'un produit
            $this->atrl->artistDetails($routeTab['artistSlug']);
        }
        else if($routeTab['route'] === "create-artist")
         {
             $this->atrl->createArtist();
         }
         else if($routeTab['route'] === "edit-artist" && $routeTab['artistSlug'] !== null)
         {
             $this->atrl->editArtist($routeTab['artistSlug']);
         }
         else if($routeTab['route'] === "delete-artist" && $routeTab['artistSlug'] !== null)
         {
             $this->atrl->deleteArtist($routeTab['artistSlug']);
         }
        else if($routeTab['route'] === "programmation" && $routeTab['programmationSlug'] === null) // condition(s) pour envoyer vers la liste des produits  
        {  
            // appeler la méthode du controlleur pour afficher les produits
            $this->ptrl->programmationsList();
        }  
         else if($routeTab['route'] === "programmation" && $routeTab['programmationSlug'] !== null) // condition(s) pour envoyer vers le détail d'un produit  
        {  
            // appeler la méthode du controlleur pour afficher le détail d'un produit
            $this->atrl->programmationDetails($routeTab['programmationSlug']);
        }
          else if($routeTab['route'] === "create-programmation")
         {
             $this->atrl->createProgrammation();
         }
         else if($routeTab['route'] === "edit-programmation" && $routeTab['programmationSlug'] !== null)
         {
             $this->atrl->editProgrammation($routeTab['programmationSlug']);
         }
         else if($routeTab['route'] === "delete-programmation" && $routeTab['programmationSlug'] !== null)
         {
             $this->atrl->deleteProgrammation($routeTab['programmationSlug']);
         }
        
        else if($routeTab["route"] === "creer-un-compte") // condition pour afficher la page du formulaire d'inscription  
        {  
            $this->auth->register();// appeler la méthode du controlleur pour afficher la page d'inscription  
        }  
        else if($routeTab["route"] === "check-creer-un-compte") // condition pour l'action du formulaire d'inscription  
        {  
            $this->auth->checkRegister();// appeler la méthode du controlleur pour créer un utilisateur et renvoyer vers l'accueil  
        }  
        else if($routeTab["route"] === "connexion") // condition pour afficher la page du formulaire de connexion  
        {  
            $this->auth->login(); // appeler la méthode du controlleur pour afficher la page d'inscription  
        }  
        else if($routeTab["route"] === "check-connexion") // condition pour l'action du formulaire de connexion  
        {  
            $this->auth->checkLogin(); // appeler la méthode du controlleur pour vérifier la connexion et renvoyer vers l'accueil  
        }
        
    } 
}