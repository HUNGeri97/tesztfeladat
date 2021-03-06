<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="szamlazasicimek")
 */
class SzamlazasiCimek {
	/**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
	
	/**
     * @ORM\Column(type="string", length=100)
     */
	private $type;
	
	/**
     * @ORM\Column(type="string", length=100)
     */
	private $name;
	
	/**
     * @ORM\Column(type="string", length=100)
     */
	private $phone;
	
	/**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
	private $adoszam;
	
	/**
     * @ORM\Column(type="string", length=100)
     */
	private $orszag;
	
	/**
     * @ORM\Column(type="string", length=100)
     */
	private $iranyitoszam;
	
	/**
     * @ORM\Column(type="string", length=100)
     */
	private $varos;
	
	/**
     * @ORM\Column(type="string", length=100)
     */
	private $utcahazszam;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $teljescim;
	
	public function getType(){
		return $this->type;
	}
	public function setType($type){
		$this->type = $type;
	}
	
	public function getName(){
		return $this->name;
	}
	public function setName($name){
		$this->name = $name;
	}
	
	public function getPhone(){
		return $this->phone;
	}
	public function setPhone($phone){
		$this->phone = $phone;
	}
	
	public function getAdoszam(){
		return $this->adoszam;
	}
	public function setAdoszam($adoszam){
		$this->adoszam = $adoszam;
	}
	
	public function getOrszag(){
		return $this->orszag;
	}
	public function setOrszag($orszag){
		$this->orszag = $orszag;
	}
	
	public function getIranyitoszam(){
		return $this->iranyitoszam;
	}
	public function setIranyitoszam($iranyitoszam){
		$this->iranyitoszam = $iranyitoszam;
	}
	
	public function getVaros(){
		return $this->varos;
	}
	public function setVaros($varos){
		$this->varos = $varos;
	}
	
	public function getUtcahazszam(){
		return $this->utcahazszam;
	}
	public function setUtcahazszam($utcahazszam){
		$this->utcahazszam = $utcahazszam;
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
     * Set teljescim
     *
     * @param string $teljescim
     *
     * @return SzamlazasiCimek
     */
    public function setTeljescim($teljescim)
    {
        $this->teljescim = $teljescim;

        return $this;
    }

    /**
     * Get teljescim
     *
     * @return string
     */
    public function getTeljescim()
    {
        return $this->teljescim;
    }
}
