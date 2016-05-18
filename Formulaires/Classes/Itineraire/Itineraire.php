<?php
/**
 * Created by PhpStorm.
 * User: prins
 * Date: 17/05/2016
 * Time: 15:26
 */

namespace Formulaires\Classes\Itineraire;

require_once __DIR__ . '/../../Interfaces/Crud.php';
use Formulaires\Interfaces\Crud;

class Itineraire implements Crud
{
    /**
     * @var string
     */
    private $jour;
    /**
     * @var string
     */
    private $date;
    /**
     * @var string
     */
    private $region;
    /**
     * @var float
     */
    private $kmInterVille;
    /**
     * @var float
     */
    private $kmVille;
    /**
     * @var float
     */
    private $indemnite;
    /**
     * @var float
     */
    private $autreFrais;

    /**
     * Itineraire constructor.
     * @param string $jour
     * @param string $date
     * @param string $region
     * @param float $kmInterVille
     * @param float $kmVille
     * @param float $indemnite
     * @param float $autreFrais
     */
    public function __construct($jour, $date, $region, $kmInterVille, $kmVille, $indemnite, $autreFrais)
    {
        $this->jour = $jour;
        $this->date = $date;
        $this->region = $region;
        $this->kmInterVille = $kmInterVille;
        $this->kmVille = $kmVille;
        $this->indemnite = $indemnite;
        $this->autreFrais = $autreFrais;
    }

    /**
     * @return string
     */
    public function getJour()
    {
        return $this->jour;
    }

    /**
     * @param string $jour
     */
    public function setJour($jour)
    {
        $this->jour = $jour;
    }

    /**
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param string $date
     */
    public function setDate($date)
    {
        $this->date = $date;
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
     * @return float
     */
    public function getKmInterVille()
    {
        return $this->kmInterVille;
    }

    /**
     * @param float $kmInterVille
     */
    public function setKmInterVille($kmInterVille)
    {
        $this->kmInterVille = $kmInterVille;
    }

    /**
     * @return float
     */
    public function getKmVille()
    {
        return $this->kmVille;
    }

    /**
     * @param float $kmVille
     */
    public function setKmVille($kmVille)
    {
        $this->kmVille = $kmVille;
    }

    /**
     * @return float
     */
    public function getIndemnite()
    {
        return $this->indemnite;
    }

    /**
     * @param float $indemnite
     */
    public function setIndemnite($indemnite)
    {
        $this->indemnite = $indemnite;
    }

    /**
     * @return float
     */
    public function getAutreFrais()
    {
        return $this->autreFrais;
    }

    /**
     * @param float $autreFrais
     */
    public function setAutreFrais($autreFrais)
    {
        $this->autreFrais = $autreFrais;
    }

    public function insertData($conn)
    {
        $sql = "INSERT INTO itineraire (jour_Itineraire, date_Itineraire, region_Itineraire, kmInterVille, kmVille, Indemnite, autreFrais)
                    VALUES ('$this->jour',
                          STR_TO_DATE('$this->date', '%Y-%m-%d'),
                          '$this->region',
                          '$this->kmInterVille',
                          '$this->kmVille',
                          '$this->indemnite',
                          '$this->autreFrais')";


        mysqli_query($conn, $sql);
    }

    public function updateData($conn, $id)
    {
        $sql = "UPDATE itineraire SET jour_Itineraire='$this->jour',
                                    date_Itineraire=STR_TO_DATE('$this->date', '%Y-%m-%d'),
                                    region_Itineraire='$this->region',
                                    kmInterVille='$this->kmInterVille',
                                    kmVille='$this->kmVille',
                                    Indemnite='$this->indemnite',
                                    autreFrais='$this->autreFrais' WHERE id_Itineraire='$id'";

        mysqli_query($conn, $sql);
    }


}