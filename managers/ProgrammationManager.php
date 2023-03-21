<?php  
 
class ProgrammationManager extends AbstractManager {  
   
    public function getAllProgrammation() : array  
    {  
        $list = [];  
      
       $query = $this->db->prepare('SELECT * FROM programmation'); // Pour accéder à la base de données utilisez $this->db  
       $query->execute();
       $programmation = $query->fetchAll(PDO::FETCH_ASSOC);
       $prog = [];
       
       foreach($programmation as $programation)
       {
            $prog = new Programmation($programation["name"], $programation["slug"], $programation["description"]);
            $prog->setId($programation["id"]);
            $list[] = $prog;
       }
        return $list;  
    }  
      
    public function getCategoryBySlug(string $slug) : Category  
    {  
        $query = $this->db->prepare('SELECT * FROM programmation WHERE programmation.slug=:slug '); 
                                        // Pour accéder à la base de données utilisez $this->db  
        $parameter = ["slug" =>$slug];
        $query->execute($parameter);
        $programations = $query->fetch(PDO::FETCH_ASSOC);
        $prog = new Category($programmation["name"], $programmation["slug"], $programmation["description"]);
        $prog->setId($programmation["id"]);
        return $prog;
    }
    
    public function getprogrammationByartistslug(string $slug) : array
    {
        $query = $this->db->prepare('SELECT programmation.* FROM artists_programmation JOIN artists ON artists_programmation.artists_id = artists.id JOIN 
                                        programmation ON artists_programmation.category_id = programmation.id WHERE artists.slug =:slug '); 
                                        // Pour accéder à la base de données utilisez $this->db  
        $parameter = ["slug" =>$slug];
        $query->execute($parameter);
        $programations = $query->fetchAll(PDO::FETCH_ASSOC);
        $list = [];
        foreach($programmation as $programation)
       {
            $prog = new Programmation($programation["name"], $programation["slug"], $programation["description"]);
            $prog->setId($programation["id"]);
            $list[] = $prog;
       }
        return $list;
    }
}