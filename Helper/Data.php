<?php
namespace CHK\HideForGuest\Helper;

use Magento\Customer\Model\Session;
use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Magento\Store\Model\ScopeInterface;

/**
 * Class Data
 *
 * @package CHK\HideForGuest\Helper
 */
class Data extends AbstractHelper
{
    /**
     * @var Session
     */
    protected $customerSession;

    /**
     * Data constructor.
     *
     * @param Context $context
     * @param Session $customerSession
     * @return void
     */
    public function __construct(
        Context $context,
        Session $customerSession
    ) {
        $this->customerSession = $customerSession;
        parent::__construct($context);
    }

    public function getConfig($configPath)
    {
        return $this->scopeConfig->getValue(
            $configPath,
            ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * Get Is HideForGuest Enables/Disabled
     *
     * @return bool
     */
    public function getHideForGuestEnabled()
    {
        return $this->getConfig('catalog_custom/general/enable');
    }

    /**
     * Get Custom Button Title
     *
     * @return string
     */
    public function getCustomButtonTitle()
    {
        return $this->getHideForGuestEnabled() ? $this->getConfig('catalog_custom/general/label') : null ;
    }

    /**
     * Get Is Allowed Add to Cart Button to Show
     *
     * @return bool
     */
    public function getAllowAddtocart()
    {
        return $this->getHideForGuestEnabled() ? $this->getConfig('catalog_custom/general/is_addtocart_allowed') : 0;
    }

    /**
     * Get Is Product Price Disclose
     *
     * @return bool
     */
    public function getDisclosePrice()
    {
        return $this->getHideForGuestEnabled() ? $this->getConfig('catalog_custom/general/is_product_price_disclosed') : 0;
    }

    /**
     * Get Is Customer Logged In
     *
     * @return bool
     */
    public function isCustomerloggedIn()
    {
        return $this->customerSession->isLoggedIn() ? true : false;
    }
}
