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
      
    // if ($_SESSION["user"] === "customer" || $_SESSION["user"] === "admin"){
    if (isset($_SESSION["user"]) && ($_SESSION["user"] === "customer" || $_SESSION["user"] === "admin")){
    $this->render("home", [  
    "header" => 'partials/_connect-header.phtml',
    ]);
     
    } else {

    $this->render("home", [  
    "header" => "partials/_header.phtml",
     ]);
    }  
  }

}