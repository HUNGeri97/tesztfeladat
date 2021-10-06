<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="megrendelesek")
 */
class megrendeles {
	/**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
	
	/**
     * @ORM\Column(type="string", length=100)
     */
	private $szamlazasiId;
	
	/**
     * @ORM\Column(type="string", length=100)
     */
	private $ar;
    /**
     * @ORM\Column(type="string", length=100)
     */
    private $cim;

    public function getSzamlazasiId(){
		return $this->szamlazasiId;
	}
	public function setSzamlazasiId($szamlazasiId){
		$this->szamlazasiId = $szamlazasiId;
	}
	
	public function getAr(){
		return $this->ar;
	}
	public function setAr($ar){
		$this->ar = $ar;
	}

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set cim
     *
     * @param string $cim
     *
     * @return megrendeles
     */
    public function setCim($cim)
    {
        $this->cim = $cim;

        return $this;
    }

    /**
     * Get cim
     *
     * @return string
     */
    public function getCim()
    {
        return $this->cim;
    }
}
