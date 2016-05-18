<?php
namespace Formulaires\Classes\Informations\Commandes;

require_once __DIR__ . '/../../../Interfaces/Crud.php';
use Formulaires\Interfaces\Crud;

class Commande implements Crud
{
    /**
     * @var string
     */
    private $dateCommande;

    /**
     * @var string
     */
    private $commande;

    /**
     * @var string
     */
    private $remarqueMedecin;

    /**
     * @var int
     */
    private $owner;

    /**
     * Commande constructor.
     * @param string $dateCommande
     * @param string $commande
     * @param string $remarqueMedecin
     * @param int $owner
     */
    public function __construct($dateCommande, $commande, $remarqueMedecin, $owner)
    {
        $this->dateCommande = $dateCommande;
        $this->commande = $commande;
        $this->remarqueMedecin = $remarqueMedecin;
        $this->owner = $owner;
    }

    /**
     * @return string
     */
    public function getDateCommande()
    {
        return $this->dateCommande;
    }

    /**
     * @param string $dateCommande
     */
    public function setDateCommande($dateCommande)
    {
        $this->dateCommande = $dateCommande;
    }

    /**
     * @return string
     */
    public function getCommande()
    {
        return $this->commande;
    }

    /**
     * @param string $commande
     */
    public function setCommande($commande)
    {
        $this->commande = $commande;
    }

    /**
     * @return string
     */
    public function getRemarqueMedecin()
    {
        return $this->remarqueMedecin;
    }

    /**
     * @param string $remarqueMedecin
     */
    public function setRemarqueMedecin($remarqueMedecin)
    {
        $this->remarqueMedecin = $remarqueMedecin;
    }

    /**
     * @return int
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * @param int $owner
     */
    public function setOwner($owner)
    {
        $this->owner = $owner;
    }


    public function insertData($conn)
    {
        $sql = "INSERT INTO commande (dateCommande, commande, remarqueMedecin, id_infoClinique)
                    VALUES (STR_TO_DATE('$this->dateCommande', '%Y-%m-%d'),
                            '$this->commande',
                            '$this->remarqueMedecin',
                            '$this->owner')";

        mysqli_query($conn, $sql);
    }

    public function updateData($conn, $id)
    {
        $sql = "UPDATE commande SET dateCommande='$this->dateCommande',
                                    commande='$this->commande',
                                    remarqueMedecin='$this->remarqueMedecin',
                                    id_infoClinique='$this->owner' WHERE id_commande='$id'";

        mysqli_query($conn, $sql);
    }
}