<?php

namespace Mobilunity\MagentoSample\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class SampleData extends AbstractDb
{
    // @codingStandardsIgnoreLine
    protected function _construct()
    {
        $this->_init('sample_data', 'id');
    }
}
