<?php  

abstract class AbstractController  
{  
    protected function render(string $template, array $values)  
    {  
        $page = $template;  
        $data = $values;  
  
        require "templates/layout.phtml";  
    }  
}
