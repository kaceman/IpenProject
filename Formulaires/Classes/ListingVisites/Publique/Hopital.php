<?php
namespace Formulaires\Classes\ListingVisites\Publique;

require_once __DIR__ . '/../../../Interfaces/Crud.php';
use Formulaires\Interfaces\Crud;

class Hopital implements Crud
{
    /**
     * @var int
     */
    private $code;

    /**
     * @var string
     */
    private $hopital;

    /**
     * @var string
     */
    private $service;

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
     * Hopital constructor.
     * @param int $code
     * @param string $hopital
     * @param string $service
     * @param string $medecin
     * @param string $specialite
     * @param string $dateVisite
     * @param int $a
     * @param int $b
     * @param int $c
     * @param string $remarques
     * @param string $region
     */
    public function __construct($code, $hopital, $service, $medecin, $specialite, $dateVisite, $a, $b, $c, $remarques, $region)
    {
        $this->code = $code;
        $this->hopital = $hopital;
        $this->service = $service;
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
    public function getHopital()
    {
        return $this->hopital;
    }

    /**
     * @param string $hopital
     */
    public function setHopital($hopital)
    {
        $this->hopital = $hopital;
    }

    /**
     * @return string
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * @param string $service
     */
    public function setService($service)
    {
        $this->service = $service;
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
        $sql = "INSERT INTO hopital (code_hopital, hopital, service_hopital, medecin_hopital, specialite_hopital, dateVisite_hopital, A_hopital, B_hopital, C_hopital, remarques_hopital, region_hopital)
                    VALUES ('$this->code',
                          '$this->hopital',
                          '$this->service',
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
        $sql = "UPDATE hopital SET code_hopital='$this->code',
                                    hopital='$this->hopital',
                                    service_hopital='$this->service',
                                    medecin_hopital='$this->medecin',
                                    specialite_hopital='$this->specialite',
                                    dateVisite_hopital=STR_TO_DATE('$this->dateVisite', '%Y-%m-%d'),
                                    A_hopital='$this->a',
                                    B_hopital='$this->b',
                                    C_hopital='$this->c',
                                    remarques_hopital='$this->remarques',
                                    region_hopital='$this->region' WHERE id_hopital='$id'";

        mysqli_query($conn, $sql);
    }
}