<?php

namespace Mobilunity\MagentoSample\Model;

use Mobilunity\MagentoSample\Api\SampleDataRepositoryInterface;
use Mobilunity\MagentoSample\Api\Data\SampleDataInterface;
use Mobilunity\MagentoSample\Model\ResourceModel\SampleData\CollectionFactory;
use Mobilunity\MagentoSample\Model\ResourceModel\SampleDataFactory;

class SampleDataRepository implements SampleDataRepositoryInterface
{
    /**
     * @var SampleDataFactory
     */
    private $sampleDataResourceModelFactory;

    /**
     * SampleDataRepository constructor.
     * @param SampleDataFactory $sampleDataResourceModelFactory
     */
    public function __construct(
        SampleDataFactory $sampleDataResourceModelFactory
    ) {
        $this->sampleDataResourceModelFactory = $sampleDataResourceModelFactory;
    }

    /**
     * @param SampleDataInterface $sampleData
     * @throws \Magento\Framework\Exception\AlreadyExistsException
     */
    public function save(SampleDataInterface $sampleData): void
    {
        $resourceModel = $this->sampleDataResourceModelFactory->create();
        $resourceModel->save($sampleData);
    }
}
