<?php  

abstract class AbstractController  
{  
    protected function render(string $template, array $values): void
    {  
        $page = $template;  
        $data = $values;
  
        require "templates/layout.phtml";  
    }  
    protected function renderAdmin(string $template, array $values) : void 
    {
        $page = $template;  
        $data = $values;
  
        require "templates/layout-admin.phtml";  
    }
    
    protected function clean(string $unsafe) : string
    {
        
        $safe = htmlspecialchars($unsafe); //je declare la variable
        
        return $safe; //je return le résultat de ma variable
    }
}
