<?php  
 
class HomeController extends AbstractController {  
 
    private ProgrammationManager $pm;  
    private ArtistManager $am;  
  
    public function __construct()  
    {  
    $this->pm = new ProgrammationManager();  
    $this->am = new ArtistManager();
    }  
    
 
 
  /* Pour la route de la home */  
  public function index() {
      
        $this->render("home", []);
    }

}