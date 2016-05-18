<?php
namespace Formulaires\Classes\Informations;

require_once __DIR__ . '/../../Interfaces/Crud.php';
use Formulaires\Interfaces\Crud;

class InfoClinique implements Crud
{
    /**
     * @var string
     */
    private $region;

    /**
     * @var string
     */
    private $ville;

    /**
     * @var string
     */
    private $code;

    /**
     * @var string
     */
    private $nom;

    /**
     * @var string
     */
    private $adresse;

    /**
     * @var string
     */
    private $telephone;

    /**
     * @var string
     */
    private $directeur;

    /**
     * @var string
     */
    private $reanimateur;

    /**
     * @var string
     */
    private $medecinDeGarde;

    /**
     * @var string
     */
    private $medecinSpecialisteHosp;

    /**
     * InfoClinique constructor.
     * @param string $region
     * @param string $ville
     * @param string $code
     * @param string $nom
     * @param string $adresse
     * @param string $telephone
     * @param string $directeur
     * @param string $reanimateur
     * @param string $medecinDeGarde
     * @param string $medecinSpecialisteHosp
     */
    public function __construct($region, $ville, $code, $nom, $adresse, $telephone, $directeur, $reanimateur, $medecinDeGarde, $medecinSpecialisteHosp)
    {
        $this->region = $region;
        $this->ville = $ville;
        $this->code = $code;
        $this->nom = $nom;
        $this->adresse = $adresse;
        $this->telephone = $telephone;
        $this->directeur = $directeur;
        $this->reanimateur = $reanimateur;
        $this->medecinDeGarde = $medecinDeGarde;
        $this->medecinSpecialisteHosp = $medecinSpecialisteHosp;
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

    /**
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * @param string $ville
     */
    public function setVille($ville)
    {
        $this->ville = $ville;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode($code)
    {
        $this->code = $code;
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
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * @param string $telephone
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    }

    /**
     * @return string
     */
    public function getDirecteur()
    {
        return $this->directeur;
    }

    /**
     * @param string $directeur
     */
    public function setDirecteur($directeur)
    {
        $this->directeur = $directeur;
    }

    /**
     * @return string
     */
    public function getReanimateur()
    {
        return $this->reanimateur;
    }

    /**
     * @param string $reanimateur
     */
    public function setReanimateur($reanimateur)
    {
        $this->reanimateur = $reanimateur;
    }

    /**
     * @return string
     */
    public function getMedecinDeGarde()
    {
        return $this->medecinDeGarde;
    }

    /**
     * @param string $medecinDeGarde
     */
    public function setMedecinDeGarde($medecinDeGarde)
    {
        $this->medecinDeGarde = $medecinDeGarde;
    }

    /**
     * @return string
     */
    public function getMedecinSpecialisteHosp()
    {
        return $this->medecinSpecialisteHosp;
    }

    /**
     * @param string $medecinSpecialisteHosp
     */
    public function setMedecinSpecialisteHosp($medecinSpecialisteHosp)
    {
        $this->medecinSpecialisteHosp = $medecinSpecialisteHosp;
    }

    public function insertData($conn)
    {
        $sql = "INSERT INTO infoclinique (region, ville, code, nom, adresse, telephone, directeur, reanimateur, medecinGarde, medecinSpecialiste)
                    VALUES ('$this->region',
                          '$this->ville',
                          '$this->code',
                          '$this->nom',
                          '$this->adresse',
                          '$this->telephone',
                          '$this->directeur',
                          '$this->reanimateur',
                          '$this->medecinDeGarde',
                          '$this->medecinSpecialisteHosp')";

        mysqli_query($conn, $sql);
    }

    public function updateData($conn, $id)
    {
        $sql = "UPDATE infoclinique SET 
                   region='$this->region',
                   ville='$this->ville',
                   code='$this->code',
                   nom='$this->nom',
                   adresse='$this->adresse',
                   telephone='$this->telephone',
                   directeur='$this->directeur',
                   reanimateur='$this->reanimateur',
                   medecinGarde='$this->medecinDeGarde',
                   medecinSpecialiste='$this->medecinSpecialisteHosp' WHERE id_infoClinique='$id'";

        mysqli_query($conn, $sql);
    }
}