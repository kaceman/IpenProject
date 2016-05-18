<?php
namespace Formulaires\Classes\SyntheseHebdomadaire;

require_once __DIR__ . '/../../Interfaces/Crud.php';
use Formulaires\Interfaces\Crud;

class Region implements Crud
{
    /**
     * @var string
     */
    private $region;
    /**
     * @var string
     */
    private $patelins;
    /**
     * @var int
     */
    private $actPrivA;
    /**
     * @var int
     */
    private $actPrivB;
    /**
     * @var int
     */
    private $actPrivC;
    /**
     * @var int
     */
    private $actPublA;
    /**
     * @var int
     */
    private $actPublB;
    /**
     * @var int
     */
    private $actPublC;

    /**
     * Region constructor.
     * @param string $region
     * @param string $patelins
     * @param int $actPrivA
     * @param int $actPrivB
     * @param int $actPrivC
     * @param int $actPublA
     * @param int $actPublB
     * @param int $actPublC
     */
    public function __construct($region, $patelins, $actPrivA, $actPrivB, $actPrivC, $actPublA, $actPublB, $actPublC)
    {
        $this->region = $region;
        $this->patelins = $patelins;
        $this->actPrivA = $actPrivA;
        $this->actPrivB = $actPrivB;
        $this->actPrivC = $actPrivC;
        $this->actPublA = $actPublA;
        $this->actPublB = $actPublB;
        $this->actPublC = $actPublC;
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
    public function getPatelins()
    {
        return $this->patelins;
    }

    /**
     * @param string $patelins
     */
    public function setPatelins($patelins)
    {
        $this->patelins = $patelins;
    }

    /**
     * @return int
     */
    public function getActPrivA()
    {
        return $this->actPrivA;
    }

    /**
     * @param int $actPrivA
     */
    public function setActPrivA($actPrivA)
    {
        $this->actPrivA = $actPrivA;
    }

    /**
     * @return int
     */
    public function getActPrivB()
    {
        return $this->actPrivB;
    }

    /**
     * @param int $actPrivB
     */
    public function setActPrivB($actPrivB)
    {
        $this->actPrivB = $actPrivB;
    }

    /**
     * @return int
     */
    public function getActPrivC()
    {
        return $this->actPrivC;
    }

    /**
     * @param int $actPrivC
     */
    public function setActPrivC($actPrivC)
    {
        $this->actPrivC = $actPrivC;
    }

    /**
     * @return int
     */
    public function getActPublA()
    {
        return $this->actPublA;
    }

    /**
     * @param int $actPublA
     */
    public function setActPublA($actPublA)
    {
        $this->actPublA = $actPublA;
    }

    /**
     * @return int
     */
    public function getActPublB()
    {
        return $this->actPublB;
    }

    /**
     * @param int $actPublB
     */
    public function setActPublB($actPublB)
    {
        $this->actPublB = $actPublB;
    }

    /**
     * @return int
     */
    public function getActPublC()
    {
        return $this->actPublC;
    }

    /**
     * @param int $actPublC
     */
    public function setActPublC($actPublC)
    {
        $this->actPublC = $actPublC;
    }


    public function insertData($conn)
    {
        $sql = "INSERT INTO regionvisite (regionVisite, patelins, actPrivA, actPrivB, actPrivC, actPublA, actPublB, actPublC)
                    VALUES ('$this->region',
                          '$this->patelins',
                          '$this->actPrivA',
                          '$this->actPrivB',
                          '$this->actPrivC',
                          '$this->actPublA',
                          '$this->actPublB',
                          '$this->actPublC')";

        mysqli_query($conn, $sql);
    }

    public function updateData($conn, $id)
    {
        $sql = "UPDATE regionvisite SET 
                   regionVisite='$this->region',
                   patelins='$this->patelins',
                   actPrivA='$this->actPrivA',
                   actPrivB='$this->actPrivB',
                   actPrivC='$this->actPrivC',
                   actPublA='$this->actPublA',
                   actPublB='$this->actPublB',
                   actPublC='$this->actPublC' WHERE id_regionVisite='$id'";

        mysqli_query($conn, $sql);
    }
}