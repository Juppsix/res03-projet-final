<?php  
 
class ArtistController extends AbstractController {  
  
    private ArtistManager $am;  
    private ProgrammationManager $pm;  
  
    public function __construct()  
    {  
    $this->am = new ArtistManager();  
    $this->pm = new ProgrammationManager();
    }  
    
    
    
    public function artists() : void 
    {
       $artists = $this->am->getAllArtists();  //appel au manager pour récuperer la liste des artistes
      var_dump($artists);
        $this->render("index", [  
            "artists" => $artists  
        ]);  
    }
    
    public function artist() : void
    {
    $artists = $this->am->getArtistBySlug($artistSlug);   //appel au manager pour récupérer les infos d'un artiste    
    $programmation = $this->pm->getProgrammationByArtistSlug($artistSlug);
        $this->render("artist", [  
        "artists" => $artists,
        "programmation" => $programmation
         ]);  
    }
    
    public function adminListeArtist() : void 
    {
        
         $this->render("admin-artist", [  
       
         ]);  
        
        
    }
    
    public function createArtist(array $post) : void 
    {
          $newArtist =  new Artist($post["name"],$post["slug"],$post["description"],$post["email"],$post["price"]);
            $createArtist = this->am->createArtist($newArtist);
       
        // // create the Artist in the manager
         $this->render("create-artist", [  
       
         ]);  
        // // render the created Artist
        
    }
    
    public function editArtist(string $artistSlug) : void 
    {
        
         $editArtist = new Artist($post["name"],$post["slug"],$post["description"], $post["email"], $post["price"]);
        $editedArtist = this->am->editArtist($editArtist);
        
         $this->render("edit-artist", [  
       
         ]);  
    }
    
     public function deleteArtist(string $artistSlug) : void 
    {
        $artist = $this->am->deleteArtist($artistSlug);
    }
    
}
