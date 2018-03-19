<?php

namespace Notification\Newsletters\Scheduled\Code\Tables;

use Doctrine\ORM\Mapping as ORM;

/**
 * Scheduled
 *
 * @ORM\Table(name="notification_newsletters_scheduled", indexes={@ORM\Index(name="selection_list_index", columns={"selection_list"}), @ORM\Index(name="created_by_index", columns={"created_by"}), @ORM\Index(name="modified_by_index", columns={"modified_by"})})
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Scheduled extends \Kazist\Table\BaseTable
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="unique_name", type="string", length=255, nullable=true)
     */
    protected $unique_name;

    /**
     * @var string
     *
     * @ORM\Column(name="subject", type="string", length=255, nullable=false)
     */
    protected $subject;

    /**
     * @var string
     *
     * @ORM\Column(name="body", type="string", length=255, nullable=false)
     */
    protected $body;

    /**
     * @var integer
     *
     * @ORM\Column(name="wait_period", type="integer", length=11, nullable=true)
     */
    protected $wait_period;

    /**
     * @var integer
     *
     * @ORM\Column(name="selection_list", type="integer", length=11, nullable=true)
     */
    protected $selection_list;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="start_date", type="datetime", nullable=true)
     */
    protected $start_date;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="end_date", type="datetime", nullable=true)
     */
    protected $end_date;

    /**
     * @var integer
     *
     * @ORM\Column(name="published", type="integer", length=11, nullable=true)
     */
    protected $published;

    /**
     * @var integer
     *
     * @ORM\Column(name="created_by", type="integer", length=11, nullable=true)
     */
    protected $created_by;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_created", type="datetime", nullable=true)
     */
    protected $date_created;

    /**
     * @var integer
     *
     * @ORM\Column(name="modified_by", type="integer", length=11, nullable=true)
     */
    protected $modified_by;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_modified", type="datetime", nullable=true)
     */
    protected $date_modified;


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
     * Set uniqueName
     *
     * @param string $uniqueName
     *
     * @return Scheduled
     */
    public function setUniqueName($uniqueName)
    {
        $this->unique_name = $uniqueName;

        return $this;
    }

    /**
     * Get uniqueName
     *
     * @return string
     */
    public function getUniqueName()
    {
        return $this->unique_name;
    }

    /**
     * Set subject
     *
     * @param string $subject
     *
     * @return Scheduled
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * Get subject
     *
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Set body
     *
     * @param string $body
     *
     * @return Scheduled
     */
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }

    /**
     * Get body
     *
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Set waitPeriod
     *
     * @param integer $waitPeriod
     *
     * @return Scheduled
     */
    public function setWaitPeriod($waitPeriod)
    {
        $this->wait_period = $waitPeriod;

        return $this;
    }

    /**
     * Get waitPeriod
     *
     * @return integer
     */
    public function getWaitPeriod()
    {
        return $this->wait_period;
    }

    /**
     * Set selectionList
     *
     * @param integer $selectionList
     *
     * @return Scheduled
     */
    public function setSelectionList($selectionList)
    {
        $this->selection_list = $selectionList;

        return $this;
    }

    /**
     * Get selectionList
     *
     * @return integer
     */
    public function getSelectionList()
    {
        return $this->selection_list;
    }

    /**
     * Set startDate
     *
     * @param \DateTime $startDate
     *
     * @return Scheduled
     */
    public function setStartDate($startDate)
    {
        $this->start_date = $startDate;

        return $this;
    }

    /**
     * Get startDate
     *
     * @return \DateTime
     */
    public function getStartDate()
    {
        return $this->start_date;
    }

    /**
     * Set endDate
     *
     * @param \DateTime $endDate
     *
     * @return Scheduled
     */
    public function setEndDate($endDate)
    {
        $this->end_date = $endDate;

        return $this;
    }

    /**
     * Get endDate
     *
     * @return \DateTime
     */
    public function getEndDate()
    {
        return $this->end_date;
    }

    /**
     * Set published
     *
     * @param integer $published
     *
     * @return Scheduled
     */
    public function setPublished($published)
    {
        $this->published = $published;

        return $this;
    }

    /**
     * Get published
     *
     * @return integer
     */
    public function getPublished()
    {
        return $this->published;
    }

    /**
     * Get createdBy
     *
     * @return integer
     */
    public function getCreatedBy()
    {
        return $this->created_by;
    }

    /**
     * Get dateCreated
     *
     * @return \DateTime
     */
    public function getDateCreated()
    {
        return $this->date_created;
    }

    /**
     * Get modifiedBy
     *
     * @return integer
     */
    public function getModifiedBy()
    {
        return $this->modified_by;
    }

    /**
     * Get dateModified
     *
     * @return \DateTime
     */
    public function getDateModified()
    {
        return $this->date_modified;
    }
    /**
     * @ORM\PreUpdate
     */
    public function onPreUpdate()
    {
        // Add your code here
    }
}

