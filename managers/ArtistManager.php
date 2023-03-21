<?php
class ArtistManager extends AbstractManager {

    public function getAllArtist() : array
    { 
        $query = $this->db->prepare('SELECT * FROM artists');
        $query->execute();
        $artists = $query->fetchAll(PDO::FETCH_ASSOC);
        $list = [];
     foreach ($artists as $artist)
    {
        $art = new Artist($artist['name'], $artist['slug'], $artist['description'], $artist['price']);
        $art->setId($artist['id']);
        $list[] = $prod;
    }
        return $artist;
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

    public function getArtisteByProgrammationSlug(string $programationSlug) : array
    {
        $query = $this->db->prepare('SELECT artists.* FROM artists_programmation JOIN artists ON artists_programmation.artists_id = artists.id JOIN programmation ON artists_programmation.programmation_id = programmation.id WHERE programmation.slug =:slug');

        $parameters = [
            'slug' => $programmationSlug
        ];

        $query->execute($parameters);
        $list = [];
        $artists = $query->fetchAll(PDO::FETCH_ASSOC);

        foreach ($artists as $artist)
    {
        $art = new Artist($artist['name'], $artist['slug'], $artist['description'], $artist['price']);
        $art->setId($product['id']);
        $list[] = $art;
    }
        return $list;
    }
}