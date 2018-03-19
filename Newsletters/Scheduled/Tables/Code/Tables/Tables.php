<?php

namespace Notification\Newsletters\Scheduled\Tables\Code\Tables;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tables
 *
 * @ORM\Table(name="notification_newsletters_scheduled_tables", indexes={@ORM\Index(name="modified_by_index", columns={"modified_by"}), @ORM\Index(name="created_by_index", columns={"created_by"})})
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Tables extends \Kazist\Table\BaseTable
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
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     */
    protected $title;

    /**
     * @var string
     *
     * @ORM\Column(name="extension_path", type="string", length=255, nullable=true)
     */
    protected $extension_path;

    /**
     * @var string
     *
     * @ORM\Column(name="email_field", type="string", length=255, nullable=true)
     */
    protected $email_field;

    /**
     * @var string
     *
     * @ORM\Column(name="date_field", type="string", length=255, nullable=true)
     */
    protected $date_field;

    /**
     * @var string
     *
     * @ORM\Column(name="user_field", type="string", length=255, nullable=true)
     */
    protected $user_field;

    /**
     * @var integer
     *
     * @ORM\Column(name="published", type="integer", length=11, nullable=true)
     */
    protected $published;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_created", type="datetime", nullable=true)
     */
    protected $date_created;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_modified", type="datetime", nullable=true)
     */
    protected $date_modified;

    /**
     * @var integer
     *
     * @ORM\Column(name="modified_by", type="integer", length=11, nullable=true)
     */
    protected $modified_by;

    /**
     * @var integer
     *
     * @ORM\Column(name="created_by", type="integer", length=11, nullable=true)
     */
    protected $created_by;


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
     * Set title
     *
     * @param string $title
     *
     * @return Tables
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set extensionPath
     *
     * @param string $extensionPath
     *
     * @return Tables
     */
    public function setExtensionPath($extensionPath)
    {
        $this->extension_path = $extensionPath;

        return $this;
    }

    /**
     * Get extensionPath
     *
     * @return string
     */
    public function getExtensionPath()
    {
        return $this->extension_path;
    }

    /**
     * Set emailField
     *
     * @param string $emailField
     *
     * @return Tables
     */
    public function setEmailField($emailField)
    {
        $this->email_field = $emailField;

        return $this;
    }

    /**
     * Get emailField
     *
     * @return string
     */
    public function getEmailField()
    {
        return $this->email_field;
    }

    /**
     * Set dateField
     *
     * @param string $dateField
     *
     * @return Tables
     */
    public function setDateField($dateField)
    {
        $this->date_field = $dateField;

        return $this;
    }

    /**
     * Get dateField
     *
     * @return string
     */
    public function getDateField()
    {
        return $this->date_field;
    }

    /**
     * Set userField
     *
     * @param string $userField
     *
     * @return Tables
     */
    public function setUserField($userField)
    {
        $this->user_field = $userField;

        return $this;
    }

    /**
     * Get userField
     *
     * @return string
     */
    public function getUserField()
    {
        return $this->user_field;
    }

    /**
     * Set published
     *
     * @param integer $published
     *
     * @return Tables
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
     * Get dateCreated
     *
     * @return \DateTime
     */
    public function getDateCreated()
    {
        return $this->date_created;
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
     * Get modifiedBy
     *
     * @return integer
     */
    public function getModifiedBy()
    {
        return $this->modified_by;
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
     * @ORM\PreUpdate
     */
    public function onPreUpdate()
    {
        // Add your code here
    }
}

