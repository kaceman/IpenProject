<?php

namespace Formulaires\Classes\SyntheseHebdomadaire;

require_once __DIR__ . '/../../Interfaces/Crud.php';
use Formulaires\Interfaces\Crud;

class Produit implements Crud
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
     * @param string $produit
     * @param string $emplacement
     * @param string $concurrentDirects
     */
    public function __construct($produit, $emplacement, $concurrentDirects)
    {
        $this->produit = $produit;
        $this->emplacement = $emplacement;
        $this->concurrentDirects = $concurrentDirects;
    }

    /**
     * @return string
     */
    public function getProduit()
    {
        return $this->produit;
    }

    /**
     * @param string $produit
     */
    public function setProduit($produit)
    {
        $this->produit = $produit;
    }

    /**
     * @return string
     */
    public function getEmplacement()
    {
        return $this->emplacement;
    }

    /**
     * @param string $emplacement
     */
    public function setEmplacement($emplacement)
    {
        $this->emplacement = $emplacement;
    }

    /**
     * @return string
     */
    public function getConcurrentDirects()
    {
        return $this->concurrentDirects;
    }

    /**
     * @param string $concurrentDirects
     */
    public function setConcurrentDirects($concurrentDirects)
    {
        $this->concurrentDirects = $concurrentDirects;
    }

    public function insertData($conn)
    {
        $sql = "INSERT INTO produit (produit, concurrenceDirecte, Emplacement)
                    VALUES ('$this->produit',
                          '$this->concurrentDirects',
                          '$this->emplacement')";

        mysqli_query($conn, $sql);
    }

    public function updateData($conn, $id)
    {
        $sql = "UPDATE produit SET 
                   produit='$this->produit',
                   concurrenceDirecte='$this->concurrentDirects',
                   Emplacement='$this->emplacement' WHERE id_produit='$id'";

        mysqli_query($conn, $sql);
    }
}