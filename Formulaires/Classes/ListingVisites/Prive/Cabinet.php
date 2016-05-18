<?php
/**
 * Created by PhpStorm.
 * User: prins
 * Date: 16/05/2016
 * Time: 17:30
 */

namespace Formulaires\Classes\ListingVisites\Prive;

require_once __DIR__ . '/../../../Interfaces/Crud.php';
use Formulaires\Interfaces\Crud;

class Cabinet implements Crud
{
    /**
     * @var int
     */
    private $code;

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
     * @var int
     */
    private $a;

    /**
     * @var int
     */
    private $b;

    /**
     * @var int
     */
    private $c;

    /**
     * @var string
     */
    private $remarques;

    /**
     * @var string
     */
    private $region;

    /**
     * Cabinet constructor.
     * @param int $code
     * @param string $medecin
     * @param string $specialite
     * @param string $dateVisite
     * @param int $a
     * @param int $b
     * @param int $c
     * @param string $remarques
     * @param string $region
     */
    public function __construct($code, $medecin, $specialite, $dateVisite, $a, $b, $c, $remarques, $region)
    {
        $this->code = $code;
        $this->medecin = $medecin;
        $this->specialite = $specialite;
        $this->dateVisite = $dateVisite;
        $this->a = $a;
        $this->b = $b;
        $this->c = $c;
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
     * @return int
     */
    public function getA()
    {
        return $this->a;
    }

    /**
     * @param int $a
     */
    public function setA($a)
    {
        $this->a = $a;
    }

    /**
     * @return int
     */
    public function getB()
    {
        return $this->b;
    }

    /**
     * @param int $b
     */
    public function setB($b)
    {
        $this->b = $b;
    }

    /**
     * @return int
     */
    public function getC()
    {
        return $this->c;
    }

    /**
     * @param int $c
     */
    public function setC($c)
    {
        $this->c = $c;
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
        $sql = "INSERT INTO cabinet (code_Cabinet, MedecinPriv_Cabinet, specialite_Cabinet, dateVisite_Cabinet, a_Cabinet, b_Cabinet, c_Cabinet, remarques_Cabinet, region_Cabinet)
                    VALUES ('$this->code',
                          '$this->medecin',
                          '$this->specialite',
                          STR_TO_DATE('$this->dateVisite', '%Y-%m-%d'),
                          '$this->a',
                          '$this->b',
                          '$this->c',
                          '$this->remarques',
                          '$this->region')";
       

        mysqli_query($conn, $sql);
    }

    public function updateData($conn, $id)
    {
        $sql = "UPDATE cabinet SET code_Cabinet='$this->code',
                                    MedecinPriv_Cabinet='$this->medecin',
                                    specialite_Cabinet='$this->specialite',
                                    dateVisite_Cabinet=STR_TO_DATE('$this->dateVisite', '%Y-%m-%d'),
                                    a_Cabinet='$this->a',
                                    b_Cabinet='$this->b',
                                    code_Cabinet='$this->c',
                                    remarques_Cabinet='$this->remarques',
                                    region_Cabinet='$this->region' WHERE id_Cabinet='$id'";

        mysqli_query($conn, $sql);
    }


}