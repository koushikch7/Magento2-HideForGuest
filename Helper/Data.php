<?php
namespace CHK\HideForGuest\Helper;

use Magento\Catalog\Model\ProductFactory;
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
     * @var ProductFactory
     */
    private $productFactory;

    /**
     * Data constructor.
     *
     * @param Context $context
     * @param Session $customerSession
     * @param ProductFactory $productFactory
     */
    public function __construct(
        Context $context,
        Session $customerSession,
        ProductFactory $productFactory
    ) {
        $this->customerSession = $customerSession;
        $this->productFactory = $productFactory;
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
     * @return mixed
     */
    public function getHideForGuestEnabled()
    {
        return $this->getConfig('catalog_custom/general/enable');
    }

    /**
     * @return string
     */
    public function getCustomButtonTitle()
    {
        return $this->getHideForGuestEnabled() ? $this->getConfig('catalog_custom/general/label') : null ;
    }

    /**
     * @return bool
     */
    public function getAllowAddtocart()
    {
        return $this->getHideForGuestEnabled() ? $this->getConfig('catalog_custom/general/is_addtocart_allowed') : 0;
    }

    /**
     * @return bool
     */
    public function getDisclosePrice()
    {
        return $this->getHideForGuestEnabled() ? $this->getConfig('catalog_custom/general/is_product_price_disclosed') : 0;
    }

    /**
     * @return bool
     */
    public function isCustomerloggedIn()
    {
        return $this->customerSession->isLoggedIn() ? true : false;
    }
}
