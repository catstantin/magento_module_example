<?php

namespace Mobilunity\MagentoSample\Api;

use Mobilunity\MagentoSample\Api\Data\SampleDataInterface;

interface SampleDataRepositoryInterface
{
    /**
     * @param SampleDataInterface $sampleData
     */
    public function save(SampleDataInterface $sampleData): void;
}
