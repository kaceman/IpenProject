<?php
/**
 * Created by PhpStorm.
 * User: Zicha
 * Date: 17/05/2016
 * Time: 17:24
 */

namespace Formulaires\Classes\SyntheseHebdomadaire;


class Produit
{
    /**
     * @var string
     */
    private $produit;
    /**
     * @var string
     */
    private $concurrentDirects;
    /**
     * @var string
     */
    private $emplacement;


    /**
     * Produit constructor.
     * @param $produit
     * @param $concurrentDirects
     * @param $emplacement
     */
    public function __construct($produit, $concurrentDirects, $emplacement)
    {
        $this->produit = $produit;
        $this->concurrentDirects = $concurrentDirects;
        $this->emplacement = $emplacement;
    }

    /**
     * @return mixed
     */
    public function getProduit()
    {
        return $this->produit;
    }

    /**
     * @param mixed $produit
     */
    public function setProduit($produit)
    {
        $this->produit = $produit;
    }

    /**
     * @return mixed
     */
    public function getConcurrentDirects()
    {
        return $this->concurrentDirects;
    }

    /**
     * @param mixed $concurrentDirects
     */
    public function setConcurrentDirects($concurrentDirects)
    {
        $this->concurrentDirects = $concurrentDirects;
    }

    /**
     * @return mixed
     */
    public function getEmplacement()
    {
        return $this->emplacement;
    }

    /**
     * @param mixed $emplacement
     */
    public function setEmplacement($emplacement)
    {
        $this->emplacement = $emplacement;
    }


}