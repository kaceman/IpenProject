<?php
/**
 * Created by PhpStorm.
 * User: Zicha
 * Date: 17/05/2016
 * Time: 17:24
 */

namespace Formulaires\Classes\SyntheseHebdomadaire;

require_once __DIR__ . '/../../Interfaces/Crud.php';
use Formulaires\Interfaces\Crud;

class Prive implements Crud
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
    private $actionIpsen;
    /**
     * @var string
     */
    private $actionConcurrence;

    /**
     * Prive constructor.
     * @param int $code
     * @param string $medecin
     * @param string $actionIpsen
     * @param string $actionConcurrence
     */
    public function __construct($code, $medecin, $actionIpsen, $actionConcurrence)
    {
        $this->code = $code;
        $this->medecin = $medecin;
        $this->actionIpsen = $actionIpsen;
        $this->actionConcurrence = $actionConcurrence;
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
    public function getActionIpsen()
    {
        return $this->actionIpsen;
    }

    /**
     * @param string $actionIpsen
     */
    public function setActionIpsen($actionIpsen)
    {
        $this->actionIpsen = $actionIpsen;
    }

    /**
     * @return string
     */
    public function getActionConcurrence()
    {
        return $this->actionConcurrence;
    }

    /**
     * @param string $actionConcurrence
     */
    public function setActionConcurrence($actionConcurrence)
    {
        $this->actionConcurrence = $actionConcurrence;
    }

    public function insertData($conn)
    {
        $sql = "INSERT INTO secteurprive (code_prive, medecin_sctPrive, actionIpsen_prive,actionConcurrence_prive)
                    VALUES ('$this->code',
                          '$this->medecin',
                          '$this->actionIpsen',
                          '$this->actionConcurrence')";

        mysqli_query($conn, $sql);
    }

    public function updateData($conn, $id)
    {
        $sql = "UPDATE secteurprive SET
                   code='$this->code',
                   medecin='$this->medecin',
                   actionIpsen='$this->actionIpsen',
                   actionConcurrence='$this->actionConcurrence' WHERE id_prive='$id'";

        mysqli_query($conn, $sql);
    }


}