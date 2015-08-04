<?php
namespace Brander\Bundle\EAVBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * Селект
 *
 * @author Bogdan Yurov <bogdan@yurov.me>
 *
 * @ORM\Entity()
 * @Serializer\ExclusionPolicy("all")
 */
class AttributeSelect extends Attribute
{
    public function __construct()
    {
        $this->setOptions(new ArrayCollection());

        parent::__construct();
    }

    /**
     * @ORM\OneToMany(targetEntity="AttributeSelectOption", mappedBy="attribute", cascade={"persist", "remove"})
     * @Serializer\Type("array<Brander\Bundle\EAVBundle\Entity\AttributeSelectOption>")
     * @Serializer\Expose()
     * @Serializer\Groups("=read || g('admin')")
     * @var AttributeSelectOption[]|Collection
     **/
    protected $options;

    // -- Accessors ---------------------------------------

    /**
     * @return AttributeSelectOption[]|Collection
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @param AttributeSelectOption[]|Collection $options
     * @return $this
     */
    public function setOptions(Collection $options)
    {
        $this->options = $options;
        return $this;
    }
}