<?php
class Contrat {
    private $id;
    private $typeContrat;
    private $montantSouscrit;
    private $duree;
    private $idClient;

    public function __construct($typeContrat, $montantSouscrit, $duree, $idClient) {
        $this->typeContrat = $typeContrat;
        $this->montantSouscrit = $montantSouscrit;
        $this->duree = $duree;
        $this->idClient = $idClient;
    }

    // Getters et Setters pour chaque attribut
    public function getId() { return $this->id; }
    public function setId($id) { $this->id = $id; }
    public function getTypeContrat() { return $this->typeContrat; }
    public function setTypeContrat($typeContrat) { $this->typeContrat = $typeContrat; }
    public function getMontantSouscrit() { return $this->montantSouscrit; }
    public function setMontantSouscrit($montantSouscrit) { $this->montantSouscrit = $montantSouscrit; }
    public function getDuree() { return $this->duree; }
    public function setDuree($duree) { $this->duree = $duree; }
    public function getIdClient() { return $this->idClient; }
    public function setIdClient($idClient) { $this->idClient = $idClient; }
}
?>