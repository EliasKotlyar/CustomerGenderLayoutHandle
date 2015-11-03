<?php

/**
 * Class Twinsen_LayoutHandle_Model_Observer
 */
class Twinsen_LayoutHandle_Model_Observer
{
    /**
     * @param Varien_Event_Observer $observer
     */
    public function beforeLoadLayout(Varien_Event_Observer $observer)
    {
        $customer = Mage::getSingleton('customer/session')->getCustomer();
        if ($customer != null) {
            $genderText = $customer->getResource()->getAttribute('gender')->getSource()->getOptionText($customer->getData('gender'));
            $layout = $observer->getEvent()->getLayout()->getUpdate();
            $layout->addHandle('customer_' . $genderText);
        }
    }
}