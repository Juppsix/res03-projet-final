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
      
    public function getProgrammationBySlug(string $slug) : Category  
    {  
        $query = $this->db->prepare('SELECT * FROM programmation WHERE programmation.slug=:slug '); 
                                        // Pour accéder à la base de données utilisez $this->db  
        $parameter = ["slug" =>$slug];
        $query->execute($parameter);
        $programmations = $query->fetch(PDO::FETCH_ASSOC);
        $prog = new Category($programmation["name"], $programmation["slug"], $programmation["description"]);
        $prog->setId($programmation["id"]);
        return $prog;
    }
    
    public function getProgrammationByartistslug(string $slug) : array
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
    
    public function createProgrammation(Programmation $programmation) : Programmation
    {
        $query = $this->db->prepare('INSERT INTO programmation VALUES (:id, :name, :slug, :description)');
        $parameters = [
            'id' => $programmation->getId(),
            'name' => $programmation->getName(),
            'slug' => $programmation->getSlug(),
            'description' => $programmation->getDescription()
            ];
            $query->execute($parameters);
            $query->fetch(PDO::FETCH_ASSOC);
            $id = $this->db->lastInsertId();
            $programmation->setId($id);
            
            return $programmation;
    }
    
     public function editProgrammation(Programmation $programmation) : Programmation
    {
        $query = $this->db->prepare('UPDATE programmation SET name = :name, slug = :slug, description = :description');
        $parameters = [
            'name' => $programmation->getName(),
            'slug' => $programmation->getSlug(),
            'description' => $programmation->getDescription(),
            'id' => $programmation->getId()
            ];
            
             $query->execute($parameters);
        
        return $programmation;
    }
    
     public function DeleteProgrammation(Programmation $programmation) : Programmation
    {
         $query = $this->db->prepare('DELETE FROM programmation WHERE name = :name');
        $parameters = [
            'programmation_name' => $programmationName
            ];
        $query->execute($parameters);    
    }
    
    public function getProgrammationById(Programmation $programmation) : Programmation 
    {
        $query = $this->db->prepare('SELECT FROM programmation WHERE id = :id');
        $parameters = [
            'id' => $programmation->getId()
            ];
            
        $query->execute($parameters);
            
        return $programmation;
    }
    
    public function getLatestProgrammations(Programmation $programmation) : Programmation 
    {
        
        
        
        
        
    }
}