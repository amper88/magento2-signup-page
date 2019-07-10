<?php

namespace Company\Signup\Model\ResourceModel\Signup;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = 'entity_id';
    /**
     * Define resource model.
     */
    protected function _construct()
    {
        $this->_init('Company\Signup\Model\Signup', 'Company\Signup\Model\ResourceModel\Signup');
    }
}
