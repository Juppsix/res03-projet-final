<?php
class ArtistManager extends AbstractManager {

    public function getAllArtists() : array
    { 
        $query = $this->db->prepare('SELECT * FROM artists');
        $query->execute();
        $artists = $query->fetchAll(PDO::FETCH_ASSOC);
        $list = [];
     foreach ($artists as $artist)
    {
        $art = new Artist($artist['name'], $artist['slug'], $artist['description'], $artist['price'], $artist['img_url']);
        $art->setId($artist['id']);
        $list[] = $art;
    }
        return $list;
    }

    public function getArtistBySlug(string $artistSlug) : Product
    {
        $query = $this->db->prepare('SELECT * FROM artists WHERE slug = :artist_slug');

        $parameters = [
            'artist_slug' => $artistSlug
        ];

        $query->execute($parameters);

        $artistParams = $query->fetch(PDO::FETCH_ASSOC);

        $artist = new Artist($artistParams['name'], $artistParams['slug'], $artistParams['description'], $artistParams['price']);

        return $artist;
    }

    public function getArtistByProgrammationSlug(string $programmationSlug) : array
    {
        $query = $this->db->prepare('SELECT artists.* FROM artist_programmation JOIN artists ON artist_programmation.artist_id = artists.id JOIN programmation ON artist_programmation.prog_id = programmation.id WHERE programmation.slug =:slug');

        $parameters = [
            'slug' => $programmationSlug
        ];

        $query->execute($parameters);
        $list = [];
        $artists = $query->fetchAll(PDO::FETCH_ASSOC);

        foreach ($artists as $artist)
    {
        $art = new Artist($artist['name'], $artist['slug'], $artist['description'], $artist['price'], $artist['img_url']);
        $art->setId($artist['id']);
        $list[] = $art;
    }
        return $list;
    }
    
    public function createArtist(Artist $artist) : Artist
    {
        $query = $this->db->prepare('INSERT INTO artists VALUES (:id, :name, :slug, :description, :price)');
        $parameters = [
            'id' => $artist->getId(),
            'name' => $artist->getName(),
            'slug' => $artist->getSlug(),
            'description' => $artist->getDescription(),
            'price' => $artist->getPrice()
            ];
            $query->execute($parameters);
            $query->fetch(PDO::FETCH_ASSOC);
            $id = $this->db->lastInsertId();
            $artist->setId($id);
            
               return $artist;
    }
    
    public function editArtist(Artist $artist) : Artist 
    {
        $query = $this->db->prepare('UPDATE artists SET name = :name, slug = :slug, description = :description  WHERE id = :id');
        $parameters = [
        'name' => $artist->getName(),
        'slug' => $artist->getSlug(),
        'description' => $artist->getDescription(),
        'id' => $artist->getId(),
        'price' => $artist->getPrice()
            ];
            
             $query->execute($parameters);
        
        return $artist;
    }
    
    public function deleteArtist(string $slug) : Artist 
    {
         $query = $this->db->prepare('DELETE FROM artists WHERE slug = :slug');
        $parameters = [
            'slug' => $slug
            ];
        $query->execute($parameters);    
    }
    
    public function getArtistById(Artist $artist) : Artist 
    {
        $query = $this->db->prepare('SELECT FROM artists WHERE id = :id');
        $parameters = [
            'id' => $artist->getId()
            ];
            
            $query->execute($parameters);
            
            return $artist;
    }
}