<?php
namespace Formulaires\Classes\Medecins;

require_once __DIR__ . '/../../Interfaces/Crud.php';
use Formulaires\Interfaces\Crud;

class Medecin implements Crud
{
    /**
     * @var string
     */
    private $nom;
    /**
     * @var string
     */
    private $prenom;
    /**
     * @var string
     */
    private $specialite;
    /**
     * @var string
     */
    private $adresse;
    /**
     * @var string
     */
    private $tel;
    /**
     * @var string
     */
    private $secteur;
    /**
     * @var string
     */
    private $region;

    /**
     * Medecin constructor.
     * @param string $nom
     * @param string $prenom
     * @param string $specialite
     * @param string $adresse
     * @param string $tel
     * @param string $secteur
     * @param string $region
     */
    public function __construct($nom, $prenom, $specialite, $adresse, $tel, $secteur, $region)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->specialite = $specialite;
        $this->adresse = $adresse;
        $this->tel = $tel;
        $this->secteur = $secteur;
        $this->region = $region;
    }

    /**
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param string $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @return string
     */
    public function getSpecialite()
    {
        return $this->specialite;
    }

    /**
     * @param string $specialite
     */
    public function setSpecialite($specialite)
    {
        $this->specialite = $specialite;
    }

    /**
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * @param string $adresse
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }

    /**
     * @return string
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * @param string $tel
     */
    public function setTel($tel)
    {
        $this->tel = $tel;
    }

    /**
     * @return string
     */
    public function getSecteur()
    {
        return $this->secteur;
    }

    /**
     * @param string $secteur
     */
    public function setSecteur($secteur)
    {
        $this->secteur = $secteur;
    }

    /**
     * @return string
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * @param string $region
     */
    public function setRegion($region)
    {
        $this->region = $region;
    }

    public function insertData($conn)
    {
        $sql = "INSERT INTO medecin (nom_medecin, prenom_medecin, specialite_medecin, adresse_medecin, tel_medecin, secteur_medecin, region)
                    VALUES ('$this->nom',
                          '$this->prenom',
                          '$this->specialite',
                          '$this->adresse',
                          '$this->tel',
                          '$this->secteur',
                          '$this->region')";

        mysqli_query($conn, $sql);
    }

    public function updateData($conn, $id)
    {
        $sql = "UPDATE medecin SET 
                   nom_medecin='$this->nom',
                   prenom_medecin='$this->prenom',
                   specialite_medecin='$this->specialite',
                   adresse_medecin='$this->adresse',
                   tel_medecin='$this->tel',
                   secteur_medecin='$this->secteur',
                   region='$this->region' WHERE id_medecin='$id'";

        mysqli_query($conn, $sql);
    }
}