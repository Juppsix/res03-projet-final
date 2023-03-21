<?php  
 
class ArtistController extends AbstractController {  
  
    private ArtistManager $am;  
    private ProgrammationManager $pm;  
  
    public function __construct()  
    {  
    $this->am = new ArtistManager();  
    $this->pm = new ProgrammationManager();
    }  
    
    /* Pour la route de la home */  
    public function artistList() : void  
    {  
       $categories = $this->pm->getAll();  // à remplacer par un appel au manager pour récupérer la liste des catégories  
        $this->render("index", [  
            "programmation" => $programmation  
        ]);  
    }
        /* Pour la route /categories/:slug-categorie */  
    public function artistsInProgrammation(string $categorySlug) : void  
    {  
        $products = $this->pm->getProductsByCategorySlug($categorySlug); // à remplacer par un appel au manager pour récupérer la liste des produits d'une catégorie  

        $this->render("category", [  
            "products" => $products,
            "category" => $categorySlug
        ]);  
    }
        /* Pour la route /categories/produits */  
    public function productsList() : void  
    {  
        $products = $this->pm->getAllProducts();// à remplacer par un appel au manager pour récupérer la liste de tous les produits  
      
        $this->render("products", [  
            "products" => $products  
        ]);  
    }
        /* Pour la route /produits/:slug-produit */  
    public function productDetails(string $productSlug) : void  
    {  
        $product = $this->pm->getProductBySlug($productSlug); // à remplacer par un appel au manager pour récupérer les informations d'un produit  
        $categories = $this->cm->getCategoryByProductSlug($productSlug);
        $this->render("product", [  
            "product" => $product,
            "categories" => $categories
        ]);  
    }
}