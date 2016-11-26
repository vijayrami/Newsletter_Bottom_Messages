<?php
class Mycustom_Newsletter_Block_Core_Messages extends Mage_Core_Block_Messages
{
    public function _prepareLayout()
    {
        $this->addMessages(Mage::getSingleton('core/session')->getMessages(false));
        Mage_Core_Block_Template::_prepareLayout();
    }
    /**
     * Add messages to display
     *
     * @param Mage_Core_Model_Message_Collection $messages
     * @return Mage_Core_Block_Messages
     */
    public function addMessages(Mage_Core_Model_Message_Collection $messages)
    {
        foreach ($messages->getItems() as $message) {
            if($message->getIdentifier() != 'subscription')
            {
                $this->getMessageCollection()->add($message);
            }
        }
        return $this;
    }
}