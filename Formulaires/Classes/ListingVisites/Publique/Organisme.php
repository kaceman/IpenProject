<?php
namespace Formulaires\Classes\ListingVisites\Publique;

require_once __DIR__ . '/../../../Interfaces/Crud.php';
use Formulaires\Interfaces\Crud;

class Organisme implements Crud
{
    /**
     * @var int
     */
    private $code;

    /**
     * @var string
     */
    private $organisme;

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
     * Organisme constructor.
     * @param int $code
     * @param string $organisme
     * @param int $id_medecin
     * @param string $specialite
     * @param string $dateVisite
     * @param int $a
     * @param int $b
     * @param int $c
     * @param string $remarques
     * @param string $region
     */
    public function __construct($code, $organisme, $id_medecin, $specialite, $dateVisite, $a, $b, $c, $remarques, $region)
    {
        $this->code = $code;
        $this->organisme = $organisme;
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
    public function getOrganisme()
    {
        return $this->organisme;
    }

    /**
     * @param string $organisme
     */
    public function setOrganisme($organisme)
    {
        $this->organisme = $organisme;
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
        $sql = "INSERT INTO ipsendb.organisme (code_organisme, organisme, id_medecin, specialite_organisme, dateVisite_organisme, A_organisme, B_organisme, C_organisme, remarques_organisme, region_organisme)
                    VALUES ('$this->code',
                          '$this->organisme',
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
        $sql = "UPDATE ipsendb.organisme SET code_organisme='$this->code',
                                    organisme='$this->organisme',
                                    id_medecin='$this->id_medecin',
                                    specialite_organisme='$this->specialite',
                                    dateVisite_organisme=STR_TO_DATE('$this->dateVisite', '%Y-%m-%d'),
                                    A_organisme='$this->a',
                                    B_organisme='$this->b',
                                    C_organisme='$this->c',
                                    remarques_organisme='$this->remarques',
                                    region_organisme='$this->region' WHERE id__organisme='$id'";

        mysqli_query($conn, $sql);
    }
}