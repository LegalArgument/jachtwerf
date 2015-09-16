<?php
/**
 * Created by PhpStorm.
 * User: Jiles
 * Date: 13/09/2015
 * Time: 20:47
 */

namespace AppBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Aanvraag {

    //eigenaar

    /**
     * @Assert\NotBlank()
     */
    protected $naam;

    /**
     * @Assert\NotBlank()
     */
    protected $voornaam;


    protected $adres;

    protected $postcode;

    protected $plaats;

    /**
     * @Assert\NotBlank()
     */
    protected $telefoon;

    /**
     * @Assert\NotBlank()
     * @Assert\Email(
     *     message = "Het e-mail adres '{{ value }}' is niet geldig.",
     *     checkMX = true
     * )
     */
    protected $email;

    //ship

    /**
     * @Assert\NotBlank()
     */
    protected $naamShip;

    protected $typeShip;

    /**
     * @Assert\NotBlank()
     */
    protected $lengteShip;

    /**
     * @Assert\NotBlank()
     */
    protected $breedteShip;

    //berging
    /**
     * @Assert\NotBlank()
     * @Assert\Type("\DateTime")
     */
    protected $datumVanaf;
    /**
     * @Assert\NotBlank()
     * @Assert\Type("\DateTime")
     */
    protected $datumTot;

    //extra
    protected $opmerking;


    /**
     * @return mixed
     */
    public function getAdres()
    {
        return $this->adres;
    }

    /**
     * @param mixed $adres
     */
    public function setAdres($adres)
    {
        $this->adres = $adres;
    }

    /**
     * @return mixed
     */
    public function getBreedteShip()
    {
        return $this->breedteShip;
    }

    /**
     * @param mixed $breedteShip
     */
    public function setBreedteShip($breedteShip)
    {
        $this->breedteShip = $breedteShip;
    }

    /**
     * @return mixed
     */
    public function getDatumTot()
    {
        return $this->datumTot;
    }

    /**
     * @param mixed $datumTot
     */
    public function setDatumTot(\Datetime $datumTot)
    {
        $this->datumTot = $datumTot;
    }

    /**
     * @return mixed
     */
    public function getDatumVanaf()
    {
        return $this->datumVanaf;
    }

    public function getDatumString(\DateTime $date)
    {
        return $date->format('d/m/y');
    }

    /**
     * @param mixed $datumVanaf
     */
    public function setDatumVanaf(\Datetime $datumVanaf)
    {
        $this->datumVanaf = $datumVanaf;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getLengteShip()
    {
        return $this->lengteShip;
    }

    /**
     * @param mixed $lengteShip
     */
    public function setLengteShip($lengteShip)
    {
        $this->lengteShip = $lengteShip;
    }

    /**
     * @return mixed
     */
    public function getNaam()
    {
        return $this->naam;
    }

    /**
     * @param mixed $naam
     */
    public function setNaam($naam)
    {
        $this->naam = $naam;
    }

    /**
     * @return mixed
     */
    public function getNaamShip()
    {
        return $this->naamShip;
    }

    /**
     * @param mixed $naamShip
     */
    public function setNaamShip($naamShip)
    {
        $this->naamShip = $naamShip;
    }

    /**
     * @return mixed
     */
    public function getOpmerking()
    {
        return $this->opmerking;
    }

    /**
     * @param mixed $opmerking
     */
    public function setOpmerking($opmerking)
    {
        $this->opmerking = $opmerking;
    }

    /**
     * @return mixed
     */
    public function getPlaats()
    {
        return $this->plaats;
    }

    /**
     * @param mixed $plaats
     */
    public function setPlaats($plaats)
    {
        $this->plaats = $plaats;
    }

    /**
     * @return mixed
     */
    public function getPostcode()
    {
        return $this->postcode;
    }

    /**
     * @param mixed $postcode
     */
    public function setPostcode($postcode)
    {
        $this->postcode = $postcode;
    }

    /**
     * @return mixed
     */
    public function getTelefoon()
    {
        return $this->telefoon;
    }

    /**
     * @param mixed $telefoon
     */
    public function setTelefoon($telefoon)
    {
        $this->telefoon = $telefoon;
    }

    /**
     * @return mixed
     */
    public function getTypeShip()
    {
        return $this->typeShip;
    }

    /**
     * @param mixed $typeShip
     */
    public function setTypeShip($typeShip)
    {
        $this->typeShip = $typeShip;
    }

    /**
     * @return mixed
     */
    public function getVoornaam()
    {
        return $this->voornaam;
    }

    /**
     * @param mixed $voornaam
     */
    public function setVoornaam($voornaam)
    {
        $this->voornaam = $voornaam;
    }


} 