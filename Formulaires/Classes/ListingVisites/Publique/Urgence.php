<?php
/**
 * Created by PhpStorm.
 * User: prins
 * Date: 16/05/2016
 * Time: 17:34
 */

namespace Formulaires\Classes\ListingVisites\Publique;

require_once __DIR__ . '/../../../Interfaces/Crud.php';
use Formulaires\Interfaces\Crud;

class Urgence implements Crud
{
    /**
     * @var int
     */
    private $code;

    /**
     * @var string
     */
    private $urgence;

    /**
     * @var string
     */
    private $medecin;

    /**
     * @var string
     */
    private $specialite;

    /**
     * @var string
     */
    private $dateVisite;

    /**
     * @var string
     */
    private $remarques;

    /**
     * @var string
     */
    private $region;

    /**
     * Urgence constructor.
     * @param int $code
     * @param string $urgence
     * @param string $medecin
     * @param string $specialite
     * @param string $dateVisite
     * @param string $remarques
     * @param string $region
     */
    public function __construct($code, $urgence, $medecin, $specialite, $dateVisite, $remarques, $region)
    {
        $this->code = $code;
        $this->urgence = $urgence;
        $this->medecin = $medecin;
        $this->specialite = $specialite;
        $this->dateVisite = $dateVisite;
        $this->remarques = $remarques;
        $this->region = $region;
    }

    /**
     * @return int
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param int $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return string
     */
    public function getUrgence()
    {
        return $this->urgence;
    }

    /**
     * @param string $urgence
     */
    public function setUrgence($urgence)
    {
        $this->urgence = $urgence;
    }

    /**
     * @return string
     */
    public function getMedecin()
    {
        return $this->medecin;
    }

    /**
     * @param string $medecin
     */
    public function setMedecin($medecin)
    {
        $this->medecin = $medecin;
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
    public function getDateVisite()
    {
        return $this->dateVisite;
    }

    /**
     * @param string $dateVisite
     */
    public function setDateVisite($dateVisite)
    {
        $this->dateVisite = $dateVisite;
    }

    /**
     * @return string
     */
    public function getRemarques()
    {
        return $this->remarques;
    }

    /**
     * @param string $remarques
     */
    public function setRemarques($remarques)
    {
        $this->remarques = $remarques;
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
        $sql = "INSERT INTO urgence (code_urgence, urgence, medecin_urgence, specialite_urgence, dateVisite_urgence, remarques_urgence, region_urgence)
                    VALUES ('$this->code',
                          '$this->urgence',
                          '$this->medecin',
                          '$this->specialite',
                          STR_TO_DATE('$this->dateVisite', '%Y-%m-%d'),
                          '$this->remarques',
                          '$this->region')";

        mysqli_query($conn, $sql);
    }

    public function updateData($conn, $id)
    {
        $sql = "UPDATE urgence SET code_urgence='$this->code',
                                    urgence='$this->urgence',
                                    medecin_urgence='$this->medecin',
                                    specialite_urgence='$this->specialite',
                                    dateVisite_urgence=STR_TO_DATE('$this->dateVisite', '%Y-%m-%d'),
                                    remarques_urgence='$this->remarques',
                                    region_urgence='$this->region' WHERE id_urgence='$id'";

        mysqli_query($conn, $sql);
    }


}