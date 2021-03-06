<?php
/*
 *
 * Copyright 2012 Human Resource Information System
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
 * MA 02110-1301, USA.
 *
 * @since 2012
 * @author John Francis Mukulu <john.f.mukulu@gmail.com>
 *
 */
namespace Hris\RecordsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

use Hris\RecordsBundle\Entity\Record;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Hris\RecordsBundle\Entity\Training
 *
 * @Gedmo\Loggable
 * @ORM\Table(name="hris_record_training",uniqueConstraints={ @ORM\UniqueConstraint(name="unique_recordtraining_idx",columns={"record_id", "coursename", "courselocation", "startdate", "enddate"}) })
 * @ORM\Entity(repositoryClass="Hris\RecordsBundle\Entity\TrainingRepository")
 */
class Training
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $uid
     *
     * @Gedmo\Versioned
     * @ORM\Column(name="uid", type="string", length=13, unique=true)
     */
    private $uid;
    
    /**
     * @var Record $record
     *
     * @Gedmo\Versioned
     * @ORM\ManyToOne(targetEntity="Hris\RecordsBundle\Entity\Record")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="record_id", referencedColumnName="id", onDelete="CASCADE")
     * })
     */
    private $record;

    /**
     * @var string $coursename
     *
     * @Gedmo\Versioned
     * @ORM\Column(name="coursename", type="string", length=255)
     */
    private $coursename;

    /**
     * @var string $courselocation
     *
     * @Gedmo\Versioned
     * @ORM\Column(name="courselocation", type="string", length=255)
     */
    private $courselocation;

    /**
     * @var string $sponsor
     *
     * @Gedmo\Versioned
     * @ORM\Column(name="sponsor", type="string", length=255)
     */
    private $sponsor;

    /**
     * @var \DateTime $startdate
     *
     * @Gedmo\Versioned
     * @ORM\Column(name="startdate", type="datetime", length=255)
     */
    private $startdate;

    /**
     * @var \DateTime $enddate
     *
     * @Gedmo\Versioned
     * @ORM\Column(name="enddate", type="datetime", length=255)
     */
    private $enddate;

    /**
     * @var string $username
     *
     * @Gedmo\Versioned
     * @ORM\Column(name="username", type="string", length=64)
     */
    private $username;

    /**
     * @var \DateTime $datecreated
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(name="datecreated", type="datetime", nullable=false)
     */
    private $datecreated;

    /**
     * @var \DateTime $lastupdated
     *
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(name="lastupdated", type="datetime", nullable=true)
     */
    private $lastupdated;

    /**
     * @var string $region
     *
     * @Gedmo\Versioned
     * @ORM\Column(name="region", type="string", length=255)
     */
//    private $region;
//    /**
//     * @var string $district
//     *
//     * @Gedmo\Versioned
//     * @ORM\Column(name="district", type="string", length=255)
//     */
//    private $district;
//
///**
//     * @var string $training
//     *
//     * @Gedmo\Versioned
//     * @ORM\Column(name="training", type="string", length=255)
//     */
//    private $training;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->uid = uniqid();
        $this->datecreated = new \DateTime('now');
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
     * Set uid
     *
     * @param string $uid
     * @return Training
     */
    public function setUid($uid)
    {
        $this->uid = $uid;
    
        return $this;
    }

    /**
     * Get uid
     *
     * @return string 
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * Set coursename
     *
     * @param string $coursename
     * @return Training
     */
    public function setCoursename($coursename)
    {
        $this->coursename = $coursename;
    
        return $this;
    }

    /**
     * Get coursename
     *
     * @return string 
     */
    public function getCoursename()
    {
        return $this->coursename;
    }

    /**
     * Set courselocation
     *
     * @param string $courselocation
     * @return Training
     */
    public function setCourselocation($courselocation)
    {
        $this->courselocation = $courselocation;
    
        return $this;
    }

    /**
     * Get courselocation
     *
     * @return string 
     */
    public function getCourselocation()
    {
        return $this->courselocation;
    }

    /**
     * Set sponsor
     *
     * @param string $sponsor
     * @return Training
     */
    public function setSponsor($sponsor)
    {
        $this->sponsor = $sponsor;
    
        return $this;
    }

    /**
     * Get sponsor
     *
     * @return string 
     */
    public function getSponsor()
    {
        return $this->sponsor;
    }

    /**
     * Set startdate
     *
     * @param \DateTime $startdate
     * @return Training
     */
    public function setStartdate($startdate)
    {
        $this->startdate = $startdate;
    
        return $this;
    }

    /**
     * Get startdate
     *
     * @return \DateTime
     */
    public function getStartdate()
    {
        return $this->startdate;
    }

    /**
     * Set enddate
     *
     * @param \DateTime $enddate
     * @return Training
     */
    public function setEnddate($enddate)
    {
        $this->enddate = $enddate;
    
        return $this;
    }

    /**
     * Get enddate
     *
     * @return \DateTime
     */
    public function getEnddate()
    {
        return $this->enddate;
    }

    /**
     * Set username
     *
     * @param string $username
     * @return Training
     */
    public function setUsername($username)
    {
        $this->username = $username;
    
        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set datecreated
     *
     * @param \DateTime $datecreated
     * @return Training
     */
    public function setDatecreated($datecreated)
    {
        $this->datecreated = $datecreated;
    
        return $this;
    }

    /**
     * Get datecreated
     *
     * @return \DateTime 
     */
    public function getDatecreated()
    {
        return $this->datecreated;
    }

    /**
     * Set lastupdated
     *
     * @param \DateTime $lastupdated
     * @return Training
     */
    public function setLastupdated($lastupdated)
    {
        $this->lastupdated = $lastupdated;
    
        return $this;
    }

    /**
     * Get lastupdated
     *
     * @return \DateTime 
     */
    public function getLastupdated()
    {
        return $this->lastupdated;
    }

    /**
     * Set record
     *
     * @param Record $record
     * @return Training
     */
    public function setRecord(Record $record = null)
    {
        $this->record = $record;
    
        return $this;
    }

    /**
     * Get record
     *
     * @return Record
     */
    public function getRecord()
    {
        return $this->record;
    }

    /**
     * Get Entity verbose name
     *
     * @return string
     */
    public function __toString()
    {
        $trainingDetail = 'Record:'.$this->getRecord()->__toString().' Course location:'.$this->getCourselocation()->__toString().' Course name:'.$this->getCoursename();
        return $trainingDetail;
    }

//    /**
//     * Set region
//     *
//     * @param string $region
//     * @return Training
//     */
//    public function setRegion($region)
//    {
//        $this->region = $region;
//
//        return $this;
//    }
//
//    /**
//     * Get region
//     *
//     * @return string
//     */
//    public function getRegion()
//    {
//        return $this->region;
//    }
//
//    /**
//     * Set district
//     *
//     * @param string $district
//     * @return Training
//     */
//    public function setDistrict($district)
//    {
//        $this->district = $district;
//
//        return $this;
//    }
//
//    /**
//     * Get district
//     *
//     * @return string
//     */
//    public function getDistrict()
//    {
//        return $this->district;
//    }
//
//    /**
//     * Set training
//     *
//     * @param string $training
//     * @return Training
//     */
//    public function setTraining($training)
//    {
//        $this->training = $training;
//
//        return $this;
//    }
//
//    /**
//     * Get training
//     *
//     * @return string
//     */
//    public function getTraining()
//    {
//        return $this->training;
//    }
}