<?php
class Compte {
    private $id;
    private $rib;
    private $typeCompte;
    private $solde;
    private $idClient;

    public function __construct($rib, $typeCompte, $solde, $idClient) {
        $this->rib = $rib;
        $this->typeCompte = $typeCompte;
        $this->solde = $solde;
        $this->idClient = $idClient;
    }

    public function getId() { return $this->id; }
    public function setId($id) { $this->id = $id; }
    public function getRib() { return $this->rib; }
    public function setRib($rib) { $this->rib = $rib; }
    public function getTypeCompte() { return $this->typeCompte; }
    public function setTypeCompte($typeCompte) { $this->typeCompte = $typeCompte; }
    public function getSolde() { return $this->solde; }
    public function setSolde($solde) { $this->solde = $solde; }
    public function getIdClient() { return $this->idClient; }
    public function setIdClient($idClient) { $this->idClient = $idClient; }
}
?>