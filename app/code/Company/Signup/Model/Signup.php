<?php

namespace Company\Signup\Model;


class Signup extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'company_signup_records';

    protected $_cacheTag = 'company_signup_records';

    protected $_eventPrefix = 'company_signup_records';

    protected function _construct()
    {
        $this->_init('Company\Signup\Model\ResourceModel\Signup');
    }

    public function getEntityId()
    {
        return $this->getData(self::ENTITY_ID);
    }

    public function setEntityId($entityId)
    {
        return $this->setData(self::ENTITY_ID, $entityId);
    }

    public function getName()
    {
        return $this->getName(self::NAME);
    }

    public function setName($name)
    {
        return $this->setData(self::NAME, $name);
    }

    public function getDate()
    {
        return $this->getData(self::DATE);
    }

    public function setDate($date)
    {
        return $this->setData(self::DATE, $date);
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }
}
