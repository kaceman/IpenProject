<?php
/**
 * Created by PhpStorm.
 * User: prins
 * Date: 16/05/2016
 * Time: 17:33
 */

namespace Formulaires\Classes\ListingVisites\Publique;

require_once __DIR__ . '/../../../Interfaces/Crud.php';
use Formulaires\Interfaces\Crud;

class CentreSante implements Crud
{
    /**
     * @var int
     */
    private $code;

    /**
     * @var string
     */
    private $cs;

    /**
     * @var int
     */
    private $id_medecin;

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
     * CentreSante constructor.
     * @param int $code
     * @param string $cs
     * @param int $id_medecin
     * @param string $specialite
     * @param string $dateVisite
     * @param int $a
     * @param int $b
     * @param int $c
     * @param string $remarques
     * @param string $region
     */
    public function __construct($code, $cs, $id_medecin, $specialite, $dateVisite, $a, $b, $c, $remarques, $region)
    {
        $this->code = $code;
        $this->cs = $cs;
        $this->id_medecin = $id_medecin;
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
    public function getCs()
    {
        return $this->cs;
    }

    /**
     * @param string $cs
     */
    public function setCs($cs)
    {
        $this->cs = $cs;
    }

    /**
     * @return int
     */
    public function getIdMedecin()
    {
        return $this->id_medecin;
    }

    /**
     * @param int $id_medecin
     */
    public function setIdMedecin($id_medecin)
    {
        $this->id_medecin = $id_medecin;
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
        $sql = "INSERT INTO ipsendb.centresante (code_centreSante, centreSante, id_medecin, specialite_centreSante, date_centreSante, a_centreSante, b_centreSante, c_centreSante, remarques_centreSante, region_centreSante)
                    VALUES ('$this->code',
                          '$this->cs',
                          '$this->id_medecin',
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
        $sql = "UPDATE ipsendb.centresante SET code_centreSante='$this->code',
                                    centreSante='$this->cs',
                                    id_medecin='$this->id_medecin',
                                    specialite_centreSante='$this->specialite',
                                    date_centreSante=STR_TO_DATE('$this->dateVisite', '%Y-%m-%d'),
                                    a_centreSante='$this->a',
                                    b_centreSante='$this->b',
                                    c_centreSante='$this->c',
                                    remarques_centreSante='$this->remarques',
                                    region_centreSante='$this->region' WHERE id_centreSante='$id'";

        mysqli_query($conn, $sql);
    }

}