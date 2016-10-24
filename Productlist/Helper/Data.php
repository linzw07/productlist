<?php
/**
 *  Lero9
 *
 *  @category    Lero9
 *  @package     Lero9_Deliverydate
 *  @author      Tom Lin <tom@lero9.co.nz>
 *  @copyright   Copyright (c) 2016 Magebase. (http://magebase.com)
 */
namespace  Ecommistry\ProductList\Helper;

class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
    const XML_PATH_CUSTOMER_NOTE = 'customer/handle_display/display_limit';

    /**
     * Check if the extension is enabled
     *
     * @return boolean
     */
    public function getProductLimit() {
        return $this->scopeConfig->getValue(
            self::XML_PATH_CUSTOMER_NOTE,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }
}
