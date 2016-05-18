<?php
/**
 * Created by PhpStorm.
 * User: Zicha
 * Date: 17/05/2016
 * Time: 17:24
 */

namespace Formulaires\Classes\SyntheseHebdomadaire;


class Prive
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


}