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
      
       if (isset($_SESSION["user"]) && ($_SESSION["user"] === "customer" || $_SESSION["user"] === "admin")){
        $this->render("artists", [  
        "artists" => $artists,
        "header" => 'partials/_connect-header.phtml',
        ]);
         
        } else {
    
        $this->render("artists", [  
        "artists" => $artists,
        "header" => "partials/_header.phtml",
         ]);
        }  
    }
    
    public function artist() : void
    {
    $artist = $this->am->getArtistBySlug($artistSlug);   //appel au manager pour récupérer les infos d'un artiste    
   var_dump($artist);
    $programmation = $this->pm->getProgrammationByArtistSlug($artistSlug);
        $this->render("artist", [  
        "artists" => $artists,
        "programmation" => $programmation
         ]);  
    }
    
    public function adminListeArtist() : void 
    {
        
         $this->renderAdmin("admin-artist", [  
       "header" => "partials/_admin-header.phtml",
         ]);  
        
        
    }
    
    public function createArtist(array $post) : void 
{
       echo "Hello World";
        var_dump($post);
    if (isset($post["name"], $post["slug"], $post["description"], $post["price"])) {
        $newArtist =  new Artist($post["name"],$post["slug"],$post["description"],$post["price"]);
        $createdArtist = $this->am->createArtist($newArtist);
        $this->renderAdmin("create-artist", [
            "name" => $createdArtist->getName(),
            "slug" => $createdArtist->getSlug(),
            "description" => $createdArtist->getDescription(),
            "price" => $createdArtist->getPrice(),
            "header" => "partials/_admin-header.phtml",
        ]);
    } else {
        
         $this->renderAdmin("create-artist", [
             "header" => "partials/_admin-header.phtml",
              ]);
    }
}
    
    public function editArtist(string $artistSlug) : void 
    {
        echo "Hello World";
        var_dump($post);
        if (isset($post["name"], $post["slug"], $post["description"], $post["price"])) {
         $editArtist = new Artist($post["name"],$post["slug"],$post["description"],$post["price"]);
        $editedArtist = this->am->editArtist($editArtist);
        
         $this->renderAdmin("edit-artist", [  
             "name" => $editedArtist->getName(),
            "slug" => $editedArtist->getSlug(),
            "description" => $editedArtist->getDescription(),
            "price" => $editedArtist->getPrice(),
            "header" => "partials/_admin-header.phtml",
       
         ]);
         
    } else {
        $this->renderAdmin("edit-artist", [
            "header" => "partials/_admin-header.phtml"
            ]);
    }
    }
    
     public function deleteArtist(string $artistSlug) : void 
    {
        $artist = $this->am->deleteArtist($artistSlug);
    }
    
}
