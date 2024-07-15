<?php

class Bibliotheque {
    private $livres = [];
    private $membres = [];
    private $emprunts = [];

    // Method to add a book to the library
    public function ajouterLivre(Livre $livre) {
        $this->livres[] = $livre;
    }

    // Method to remove a book from the library by ISBN
    public function supprimerLivre($isbn) {
        foreach ($this->livres as $key => $livre) {
            if ($livre->getIsbn() === $isbn) {
                unset($this->livres[$key]);
                return true;
            }
        }
        return false;
    }

    // Method to list all books in the library
    public function listerTousLesLivres() {
        return $this->livres;
    }

    // Method to search for a book by ISBN
    public function rechercherLivreParIsbn($isbn) {
        foreach ($this->livres as $livre) {
            if ($livre->getIsbn() === $isbn) {
                return $livre;
            }
        }
        return null;
    }

    // Method to search for a book by ID
    public function rechercherLivreParId($id) {
        foreach ($this->livres as $livre) {
            if ($livre->getId() === $id) {
                return $livre;
            }
        }
        return null;
    }

    // Method to search for a book by title
    public function rechercherLivreParTitre($titre) {
        foreach ($this->livres as $livre) {
            if (stripos($livre->getTitre(), $titre) !== false) {
                return $livre;
            }
        }
        return null;
    }

    // Method to search for a book by author
    public function rechercherLivreParAuteur($auteur) {
        foreach ($this->livres as $livre) {
            if (stripos($livre->getAuteur(), $auteur) !== false) {
                return $livre;
            }
        }
        return null;
    }

    // Method to modify a book's details
    public function modifierLivre(Livre $livreModifie) {
        foreach ($this->livres as &$livre) {
            if ($livre->getIsbn() === $livreModifie->getIsbn()) {
                $livre = $livreModifie;
                return true;
            }
        }
        return false;
    }

    // Method to add a member to the library
    public function ajouterMembre(Membre $membre) {
        $this->membres[] = $membre;
    }

    // Method to remove a member from the library by ID
    public function supprimerMembre($id) {
        foreach ($this->membres as $key => $membre) {
            if ($membre->getId() === $id) {
                unset($this->membres[$key]);
                return true;
            }
        }
        return false;
    }

    // Method to list all members with optional limit and offset
    public function listerTousLesMembres($limit = 10, $offset = 0) {
        return array_slice($this->membres, $offset, $limit);
    }

    // Method to count all members in the library
    public function compterTousLesMembres() {
        return count($this->membres);
    }

    // Method to search for a member by ID
    public function rechercherMembreParId($id) {
        foreach ($this->membres as $membre) {
            if ($membre->getId() === $id) {
                return $membre;
            }
        }
        return null;
    }

    // Method to search for a member by name
    public function rechercherMembreParNom($nom) {
        foreach ($this->membres as $membre) {
            if (stripos($membre->getNom(), $nom) !== false) {
                return $membre;
            }
        }
        return null;
    }

    // Method to search for a member by email
    public function rechercherMembreParEmail($email) {
        foreach ($this->membres as $membre) {
            if (stripos($membre->getEmail(), $email) !== false) {
                return $membre;
            }
        }
        return null;
    }

    // Method to modify a member's details
    public function modifierMembre(Membre $membreModifie) {
        foreach ($this->membres as &$membre) {
            if ($membre->getId() === $membreModifie->getId()) {
                $membre = $membreModifie;
                return true;
            }
        }
        return false;
    }

    // Method to add a loan to the library
    public function ajouterEmprunt(Emprunt $emprunt) {
        $this->emprunts[] = $emprunt;
    }

    // Method to remove a loan from the library by loan ID
    public function supprimerEmprunt($id) {
        foreach ($this->emprunts as $key => $emprunt) {
            if ($emprunt->getIdEmprunt() === $id) {
                unset($this->emprunts[$key]);
                return true;
            }
        }
        return false;
    }

    // Method to list all loans with optional limit and offset
    public function listerTousLesEmprunts($limit = 10, $offset = 0) {
        $result = array_slice($this->emprunts, $offset, $limit);
        foreach ($result as $emprunt) {
            $livre = $this->rechercherLivreParId($emprunt->getIdLivre());
            $membre = $this->rechercherMembreParId($emprunt->getIdMembre());
            $emprunt->livreTitre = $livre->getTitre();
            $emprunt->livreAuteur = $livre->getAuteur();
            $emprunt->membreNom = $membre->getNom();
        }
        return $result;
    }

    // Method to count all loans in the library
    public function compterTousLesEmprunts() {
        return count($this->emprunts);
    }

    // Method to search for a loan by book ID
    public function rechercherEmpruntParIdLivre($idLivre) {
        foreach ($this->emprunts as $emprunt) {
            if ($emprunt->getIdLivre() === $idLivre) {
                return $emprunt;
            }
        }
        return null;
    }

    // Method to search for a loan by member ID
    public function rechercherEmpruntParIdMembre($idMembre) {
        foreach ($this->emprunts as $emprunt) {
            if ($emprunt->getIdMembre() === $idMembre) {
                return $emprunt;
            }
        }
        return null;
    }

    // Method to modify a loan's details
    public function modifierEmprunt(Emprunt $empruntModifie) {
        foreach ($this->emprunts as &$emprunt) {
            if ($emprunt->getIdEmprunt() === $empruntModifie->getIdEmprunt()) {
                $emprunt = $empruntModifie;
                return true;
            }
        }
        return false;
    }
}
?>
