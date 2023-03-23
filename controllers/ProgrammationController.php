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
      $programmation = $this->pm->getProgrammationBySlug($programmationSlug);   //appel au manager pour récupérer les infos d'un artiste    
    $artists = $this->am->getArtistByProgrammationSlug($programmationSlug);
        $this->render("programmation", [  
        "programmation" => $programmation,
        "artists" => $artists
         ]);   
    }
          
    public function programmations() : void  
    {  
        $programmations = $this->pm->getAllProgrammation();  //appel au manager pour récuperer la liste des artistes
      var_dump($programmations);
        $this->render("progs", [  
            "programmations" => $programmations  
        ]);  
    }
    
    public function adminListProgrammation() : void 
    {
        
          $this->render("admin-prog", [  
        
         ]);   
    }
     
    public function createProgrammation(array $post) : void 
    {
        $newProgrammation =  new Programmation($post["name"],$post["slug"],$post["description"]);
         $createProgrammation = this->pm->createProgrammation($newProgrammation);
         
           $this->render("create-prog", [  
        
         ]);   
    }
    
    public function editProgrammation(array $post) : void
    {
        $editProgrammation = new Programmation($post["name"],$post["slug"],$post["description"]);
        $editedProgrammation = this->pm->editProgrammation($editProgrammation);
        
          $this->render("edit-prog", [  
        
         ]);   
    }
    
    public function deleteProgrammation(array $post) : void 
    {
        $deleteProgrammation = newProgrammation($post["name"],$post["slug"],$post["description"]);
        $deletedProgrammation = this->pm->deleteProgrammation($deleteProgrammation);
        
     
    }
    
   
}