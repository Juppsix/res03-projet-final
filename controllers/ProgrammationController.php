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
    public function programmation() : void  
    {  
         $programmationSlug = $this->routeAndParams["programmationSlug"];
      $programmation = $this->pm->getProgrammationBySlug($programmationSlug);   //appel au manager pour récupérer les infos d'un artiste    
    $artists = $this->am->getArtistByProgrammationSlug($programmationSlug);
        $this->render("programmation", [  
        "programmation" => $programmation,
        "artists" => $artists
         ]);   
    }

          
    public function programmations() : void  
    {  
        $programmations = $this->pm->getAllProgrammation();
        
        //appel au manager pour récuperer la liste des artistes
        foreach($programmations as $programmation){
            $programmation->setArtists(
                $this->am->getArtistByProgrammationSlug($programmation->getSlug())
            );
        }
       
            
/*        $programmations=array_reverse($programmations);
*/        // if ($_SESSION["user"] === "customer" || $_SESSION["user"] === "admin"){
        if (isset($_SESSION["user"]) && ($_SESSION["user"] === "customer" || $_SESSION["user"] === "admin")){
        $this->render("progs", [  
        "programmations" => $programmations,
        "header" => 'partials/_connect-header.phtml',
        ]);
         
        } else {
    
        $this->render("progs", [  
        "programmations" => $programmations,
        "header" => "partials/_header.phtml",
         ]);
        }  
    }
    
    public function adminListProgrammation() : void 
    {
        
          $this->render("admin-progs", [  
        "header" => "partials/_admin-header.phtml",
         ]);   
    }
     
    public function createProgrammation(array $post) : void 
    {
        
        if (isset($post["name"], $post["slug"], $post["description"])) {
        $newProgrammation =  new Programmation($post["name"],$post["slug"],$post["description"]);
         $createProgrammation = $this->pm->createProgrammation($newProgrammation);
         
           $this->render("create-prog", [  
        "name" => $createProgrammation->getName(),
        "slug" => $createProgrammation->getSlug(),
        "description" => $createProgrammation->getDescription(),
        "header" => "partials/_admin-header.phtml",
         ]);
    } else {
        
    $this->render("create-prog", [
        "header" => "partials/_admin-header.phtml",
        ]);
    }
    }
    
    public function editProgrammation(string $programmationSlug) : void
    {
        //$editProgrammation = new Programmation($post["name"],$post["slug"],$post["description"]);
        //$editedProgrammation = this->pm->editProgrammation($editProgrammation);
        
          $this->render("edit-prog", [  
        "header" => "partials/_admin-header.phtml",
         ]);   
    }
    
    public function deleteProgrammation(array $post) : void 
    {
        $deleteProgrammation = newProgrammation($post["name"],$post["slug"],$post["description"]);
        $deletedProgrammation = this->pm->deleteProgrammation($deleteProgrammation);
        
     
    }
    
   
}