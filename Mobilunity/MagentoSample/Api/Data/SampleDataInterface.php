<?php
namespace Mobilunity\MagentoSample\Api\Data;

interface SampleDataInterface
{
    /**
     * @param int $orderId
     */
    public function setOrderId($orderId): void;

    /**
     * @param float $multipliedOrderTotal
     */
    public function setMultipliedOrderTotal($multipliedOrderTotal): void;
}
