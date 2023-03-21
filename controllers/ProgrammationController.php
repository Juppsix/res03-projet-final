<?php  
 
class ProgrammationController extends AbstractController {  
  
    private ArtistManager $am;  
    private ProgrammationManager $pm;  
  
    public function __construct()  
    {  
    $this->am = new ArtistManager();  
    $this->pm = new ProgrammationManager();
    }  
    
    /* Pour la route de la home */  
    public function programmationList() : void  
    {  
       $categories = $this->pm->getAllProgrammation();  // à remplacer par un appel au manager pour récupérer la liste des catégories  
        $this->render("index", [  
            "programmation" => $programmation  
        ]);  
    }
        /* Pour la route /categories/:slug-categorie */  
    public function artistInProgrammation(string $programmationSlug) : void  
    {  
        $products = $this->am->getArtistByProgrammationSlug($programmationSlug); // à remplacer par un appel au manager pour récupérer la liste des produits d'une catégorie  

        $this->render("programmation", [  
            "artists" => $artists,
            "programmation" => $programmationSlug
        ]);  
    }
        /* Pour la route /categories/produits */  
    public function artistList() : void  
    {  
        $products = $this->am->getAllArtists();// à remplacer par un appel au manager pour récupérer la liste de tous les produits  
      
        $this->render("artists", [  
            "artists" => $artists  
        ]);  
    }
        /* Pour la route /produits/:slug-produit */  
    public function artistDetails(string $artistSlug) : void  
    {  
        $product = $this->am->getArtistBySlug($artistSlug); // à remplacer par un appel au manager pour récupérer les informations d'un produit  
        $categories = $this->pm->getProgrammationByArtistSlug($artistSlug);
        $this->render("artists", [  
            "artists" => $artists,
            "programmation" => $programmation
        ]);  
    }
}