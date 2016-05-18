<?php
/**
 * Created by PhpStorm.
 * User: prins
 * Date: 16/05/2016
 * Time: 10:25
 */

namespace Formulaires\Classes\Informations;

require_once __DIR__ . '/../../Interfaces/Crud.php';
use Formulaires\Interfaces\Crud;

class infoGrossisterie implements Crud
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
    private $pharmacienResponsable;

    /**
     * infoGrossisterie constructor.
     * @param string $region
     * @param string $ville
     * @param string $code
     * @param string $nom
     * @param string $adresse
     * @param string $telephone
     * @param string $directeur
     * @param string $pharmacienResponsable
     */
    public function __construct($region, $ville, $code, $nom, $adresse, $telephone, $directeur, $pharmacienResponsable)
    {
        $this->region = $region;
        $this->ville = $ville;
        $this->code = $code;
        $this->nom = $nom;
        $this->adresse = $adresse;
        $this->telephone = $telephone;
        $this->directeur = $directeur;
        $this->pharmacienResponsable = $pharmacienResponsable;
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
    public function getPharmacienResponsable()
    {
        return $this->pharmacienResponsable;
    }

    /**
     * @param string $pharmacienResponsable
     */
    public function setPharmacienResponsable($pharmacienResponsable)
    {
        $this->pharmacienResponsable = $pharmacienResponsable;
    }

    public function insertData($conn)
    {
        $sql = "INSERT INTO grossisterie (region_G, ville_G, code_G, nom_G, adresse_G, telephone_G, directeur_G, pharmacienResponsable)
                    VALUES ('$this->region',
                          '$this->ville',
                          '$this->code',
                          '$this->nom',
                          '$this->adresse',
                          '$this->telephone',
                          '$this->directeur',
                          '$this->pharmacienResponsable')";

        mysqli_query($conn, $sql);
    }

    public function updateData($conn, $id)
    {
        $sql = "UPDATE grossisterie SET 
                   region_G='$this->region',
                   ville_G='$this->ville',
                   code_G='$this->code',
                   nom_G='$this->nom',
                   adresse_G='$this->adresse',
                   telephone_G='$this->telephone',
                   directeur_G='$this->directeur',
                   pharmacienResponsable='$this->pharmacienResponsable' WHERE id_infoGrossisterie='$id'";

        mysqli_query($conn, $sql);
    }

}