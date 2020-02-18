<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace CHK\HideForGuest\Plugin\Pricing;

use Magento\Catalog\Pricing\Render;
use Magento\Framework\Registry;
use Magento\Framework\View\Element\Template;
use CHK\HideForGuest\Helper\Data;

/**
 * Class RenderPlugin
 * @package CHK\HideForGuest\Plugin\Pricing
 */
class RenderPlugin extends Render
{
    /**
     * @var Data
     */
    private $helperData;

    /**
     * RenderPlugin constructor.
     * @param Template\Context $context
     * @param Registry $registry
     * @param Data $helperData
     * @param array $data
     * @return void
     */
    public function __construct(
        Template\Context $context,
        Registry $registry,
        Data $helperData,
        array $data = []
    ) {
        $this->helperData = $helperData;
        parent::__construct($context, $registry, $data);
    }

    /**
     * Get HTML code of Product Price to Display
     *
     * @return string
     */
    protected function _toHtml()
    {
        $product = $this->getProduct();
        $disclosePrice = $this->helperData->getDisclosePrice();

        if ($disclosePrice || $this->helperData->isCustomerloggedIn()) {
            return parent::_toHtml();
        } else {
            return '';
        }
    }
}
