<?php  
 
class Artist {  
  private ?int $id;
  private string $name;
  private string $slug;
  private string $description;
  private int $price;
  private string $img_url;
  
    public function __construct(string $name, string $slug, string $description, int $price, string $img_url)  
    {  
       $this->id = null;
        $this->name = $name;
        $this->slug = $slug;
        $this->description = $description;
        $this->price = $price;
        $this->img_url = $img_url;
  
    }  
   public function getId() : int 
    {
        return $this->id;
    }
    
    public function setId(?int $id) : void
    {
        $this->id =$id;
    }
    
    public function getName() : string
    {
        return $this->name;
    }
    
    public function setName(string $name) : void
    {
        $this->name =$name;
    }
    
    public function getSlug() : string
    {
        return $this->slug;
    }
    
    public function setSlug(string $slug) : void
    {
        $this->slug =$slug;
    }
  
  public function getDescription() : string
    {
        return $this->description;
    }
    
    public function setDescription(string $description) : void
    {
        $this->description =$description;
    }
    
    public function getPrice() : int
    {
        return $this->price;
    }
    
    public function setPrice(int $price) : void
    {
        $this->price =$price;
    }
  
   public function getImg_url() : string
    {
        return $this->img_url;
    }
    
    public function setImg_url(string $img_url) : void
    {
        $this->img_url =$img_url;
    }
  
}