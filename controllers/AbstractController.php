<?php  

abstract class AbstractController  
{  
    protected function render(string $template, array $values)  
    {  
        $data = $values;  
        $page = $template;  
  
        require "templates/layout.phtml";  
    }  
}
