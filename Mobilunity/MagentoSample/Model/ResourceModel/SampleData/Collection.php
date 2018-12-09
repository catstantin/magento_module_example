<?php

namespace Mobilunity\MagentoSample\Model\ResourceModel\SampleData;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * @var string
     */
    // @codingStandardsIgnoreLine
    protected $_idFieldName = 'id';

    // @codingStandardsIgnoreLine
    protected function _construct()
    {
        $this->_init(
            'Mobilunity\MagentoSample\Model\SampleData',
            'Mobilunity\MagentoSample\Model\ResourceModel\SampleData'
        );
    }
}
