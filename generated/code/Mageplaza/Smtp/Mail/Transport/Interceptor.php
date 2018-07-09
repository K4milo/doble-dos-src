<?php
namespace Mageplaza\Smtp\Mail\Transport;

/**
 * Interceptor class for @see \Mageplaza\Smtp\Mail\Transport
 */
class Interceptor extends \Mageplaza\Smtp\Mail\Transport implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\Mail\MessageInterface $message, \Mageplaza\Smtp\Mail\Rse\Mail $resourceMail, \Mageplaza\Smtp\Model\LogFactory $logFactory, $parameters = null)
    {
        $this->___init();
        parent::__construct($message, $resourceMail, $logFactory, $parameters);
    }

    /**
     * {@inheritdoc}
     */
    public function sendMessage()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'sendMessage');
        if (!$pluginInfo) {
            return parent::sendMessage();
        } else {
            return $this->___callPlugins('sendMessage', func_get_args(), $pluginInfo);
        }
    }
}
