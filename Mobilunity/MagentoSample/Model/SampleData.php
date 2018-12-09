<?php

namespace Mobilunity\MagentoSample\Model;

use Magento\Framework\Model\AbstractModel;
use Mobilunity\MagentoSample\Api\Data\SampleDataInterface;

class SampleData extends AbstractModel implements SampleDataInterface
{
    // @codingStandardsIgnoreLine
    protected function _construct()
    {
        $this->_init('Mobilunity\MagentoSample\Model\ResourceModel\SampleData');
    }

    /**
     * @param int $orderId
     */
    public function setOrderId($orderId): void
    {
        $this->setData('order_entity_id', $orderId);
    }

    /**
     * @param float $multipliedOrderTotal
     */
    public function setMultipliedOrderTotal($multipliedOrderTotal): void
    {
        $this->setData('multiplied_order_total', $multipliedOrderTotal);
    }
}
