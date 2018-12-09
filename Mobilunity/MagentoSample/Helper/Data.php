<?php

namespace Mobilunity\MagentoSample\Helper;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Magento\Store\Model\ScopeInterface;

class Data extends AbstractHelper
{
    /** @var ScopeConfigInterface */
    protected $scopeConfig;

    /**
     * Data constructor.
     * @param Context $context
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        Context $context,
        ScopeConfigInterface $scopeConfig
    ) {
        $this->scopeConfig = $scopeConfig;

        parent::__construct($context);
    }

    /**
     * @return bool
     */
    public function isEnabled(): bool
    {
        return $this->scopeConfig->isSetFlag("magentosample/general/is_enabled", ScopeInterface::SCOPE_STORE);
    }

    /**
     * @return float
     */
    public function getMultipliedFactor(): float
    {
        return (float) $this->scopeConfig->getValue("magentosample/general/multiplied_factor", ScopeInterface::SCOPE_STORE);
    }
}