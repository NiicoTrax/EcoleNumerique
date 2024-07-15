<?php

class Bibliotheque {
    private $livres = [];
    private $membres = [];
    private $emprunts = [];

    public function ajouterLivre(Livre $livre) {
        $this->livres[] = $livre;
    }

    public function supprimerLivre($isbn) {
        foreach ($this->livres as $key => $livre) {
            if ($livre->getIsbn() === $isbn) {
                unset($this->livres[$key]);
                return true;
            }
        }
        return false;
    }

    public function listerTousLesLivres() {
        return $this->livres;
    }

    public function rechercherLivreParIsbn($isbn) {
        foreach ($this->livres as $livre) {
            if ($livre->getIsbn() === $isbn) {
                return $livre;
            }
        }
        return null;
    }

    public function rechercherLivreParTitre($titre) {
        foreach ($this->livres as $livre) {
            if (stripos($livre->getTitre(), $titre) !== false) {
                return $livre;
            }
        }
        return null;
    }

    public function rechercherLivreParAuteur($auteur) {
        foreach ($this->livres as $livre) {
            if (stripos($livre->getAuteur(), $auteur) !== false) {
                return $livre;
            }
        }
        return null;
    }

    public function modifierLivre(Livre $livreModifie) {
        foreach ($this->livres as &$livre) {
            if ($livre->getIsbn() === $livreModifie->getIsbn()) {
                $livre = $livreModifie;
                return true;
            }
        }
        return false;
    }

    public function ajouterMembre(Membre $membre) {
        $this->membres[] = $membre;
    }

    public function supprimerMembre($id) {
        foreach ($this->membres as $key => $membre) {
            if ($membre->getId() === $id) {
                unset($this->membres[$key]);
                return true;
            }
        }
        return false;
    }

    public function listerTousLesMembres($limit = 10, $offset = 0) {
        return array_slice($this->membres, $offset, $limit);
    }

    public function compterTousLesMembres() {
        return count($this->membres);
    }

    public function rechercherMembreParId($id) {
        foreach ($this->membres as $membre) {
            if ($membre->getId() === $id) {
                return $membre;
            }
        }
        return null;
    }

    public function rechercherMembreParNom($nom) {
        foreach ($this->membres as $membre) {
            if (stripos($membre->getNom(), $nom) !== false) {
                return $membre;
            }
        }
        return null;
    }

    public function rechercherMembreParEmail($email) {
        foreach ($this->membres as $membre) {
            if (stripos($membre->getEmail(), $email) !== false) {
                return $membre;
            }
        }
        return null;
    }

    public function modifierMembre(Membre $membreModifie) {
        foreach ($this->membres as &$membre) {
            if ($membre->getId() === $membreModifie->getId()) {
                $membre = $membreModifie;
                return true;
            }
        }
        return false;
    }

    public function ajouterEmprunt(Emprunt $emprunt) {
        $this->emprunts[] = $emprunt;
    }

    public function supprimerEmprunt($id) {
        foreach ($this->emprunts as $key => $emprunt) {
            if ($emprunt->getIdEmprunt() === $id) {
                unset($this->emprunts[$key]);
                return true;
            }
        }
        return false;
    }

    public function listerTousLesEmprunts($limit = 10, $offset = 0) {
        return array_slice($this->emprunts, $offset, $limit);
    }

    public function compterTousLesEmprunts() {
        return count($this->emprunts);
    }

    public function rechercherEmpruntParIdLivre($idLivre) {
        foreach ($this->emprunts as $emprunt) {
            if ($emprunt->getIdLivre() === $idLivre) {
                return $emprunt;
            }
        }
        return null;
    }

    public function rechercherEmpruntParIdMembre($idMembre) {
        foreach ($this->emprunts as $emprunt) {
            if ($emprunt->getIdMembre() === $idMembre) {
                return $emprunt;
            }
        }
        return null;
    }

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
