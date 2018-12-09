<?php

namespace Mobilunity\MagentoSample\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Sales\Model\Order;
use Mobilunity\MagentoSample\Api\Data\SampleDataInterface;
use Mobilunity\MagentoSample\Api\Data\SampleDataInterfaceFactory;
use Mobilunity\MagentoSample\Api\SampleDataRepositoryInterface;
use Mobilunity\MagentoSample\Helper\Data;

class MultiplyOrderTotal implements ObserverInterface
{
    /**
     * @var Data
     */
    private $helper;
    /**
     * @var SampleDataInterfaceFactory
     */
    private $sampleDataFactory;
    /**
     * @var SampleDataRepositoryInterface
     */
    private $sampleDataRepository;

    /**
     * MultiplyOrderTotal constructor.
     * @param Data $helper
     * @param SampleDataInterfaceFactory $sampleDataFactory
     * @param SampleDataRepositoryInterface $sampleDataRepository
     */
    public function __construct(
        Data $helper,
        SampleDataInterfaceFactory $sampleDataFactory,
        SampleDataRepositoryInterface $sampleDataRepository
    ) {
        $this->helper = $helper;
        $this->sampleDataFactory = $sampleDataFactory;
        $this->sampleDataRepository = $sampleDataRepository;
    }

    /**
     * @param Observer $observer
     */
    public function execute(Observer $observer): void
    {
        if ($this->helper->isEnabled()) {
            /** @var Order $order */
            $order = $observer->getData('invoice')->getOrder();

            $multiplyResult = $order->getTotalPaid() * $this->helper->getMultipliedFactor();

            /** @var SampleDataInterface $sampleData */
            $sampleData = $this->sampleDataFactory->create();
            $sampleData->setOrderId($order->getEntityId());
            $sampleData->setMultipliedOrderTotal($multiplyResult);

            $this->sampleDataRepository->save($sampleData);
        }
    }
}
