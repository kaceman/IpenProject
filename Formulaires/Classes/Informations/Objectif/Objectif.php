<?php
/**
 * Created by PhpStorm.
 * User: prins
 * Date: 16/05/2016
 * Time: 11:55
 */

namespace Formulaires\Classes\Informations\Objectif;

require_once __DIR__ . '/../../../Interfaces/Crud.php';
use Formulaires\Interfaces\Crud;

class Objectif implements Crud
{
    /**
     * @var string
     */
    private $mois;

    /**
     * @var int
     */
    private $pmObjectif;

    /**
     * @var int
     */
    private $globalObjectif;

    /**
     * @var int
     */
    private $pmRealise;

    /**
     * @var int
     */
    private $globalRealise;

    /**
     * @var int
     */
    private $owner;

    /**
     * Objectif constructor.
     * @param string $mois
     * @param int $pmObjectif
     * @param int $globalObjectif
     * @param int $pmRealise
     * @param int $globalRealise
     * @param int $owner
     */
    public function __construct($mois, $pmObjectif, $globalObjectif, $pmRealise, $globalRealise, $owner)
    {
        $this->mois = $mois;
        $this->pmObjectif = $pmObjectif;
        $this->globalObjectif = $globalObjectif;
        $this->pmRealise = $pmRealise;
        $this->globalRealise = $globalRealise;
        $this->owner = $owner;
    }

    /**
     * @return string
     */
    public function getMois()
    {
        return $this->mois;
    }

    /**
     * @param string $mois
     */
    public function setMois($mois)
    {
        $this->mois = $mois;
    }


    public function insertData($conn)
    {
        $sql = "INSERT INTO objectif (mois, PMobjectif, GlobalObjectif, PMrealise, GlobalRealise, id_infoGrossisterie)
                    VALUES ('$this->mois',
                            '$this->pmObjectif',
                            '$this->globalObjectif',
                            '$this->pmRealise',
                            '$this->globalRealise',
                            '$this->owner')";

        mysqli_query($conn, $sql);
    }

    public function updateData($conn, $id)
    {
        $sql = "UPDATE objectif SET mois='$this->mois',
                                    PMobjectif='$this->pmObjectif',
                                    GlobalObjectif='$this->globalObjectif',
                                    PMrealise='$this->pmRealise',
                                    GlobalRealise='$this->globalRealise',
                                    id_infoGrossisterie='$this->owner' WHERE id_objectif='$id'";

        mysqli_query($conn, $sql);
    }


}