<?php
namespace A4logic\Payulatam\Controller\Payment\Notify;

/**
 * Interceptor class for @see \A4logic\Payulatam\Controller\Payment\Notify
 */
class Interceptor extends \A4logic\Payulatam\Controller\Payment\Notify implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\App\Action\Context $context, \A4logic\Payulatam\Model\ClientFactory $clientFactory, \Magento\Framework\Controller\Result\ForwardFactory $resultForwardFactory, \A4logic\Payulatam\Logger\Logger $logger)
    {
        $this->___init();
        parent::__construct($context, $clientFactory, $resultForwardFactory, $logger);
    }

    /**
     * {@inheritdoc}
     */
    public function dispatch(\Magento\Framework\App\RequestInterface $request)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'dispatch');
        if (!$pluginInfo) {
            return parent::dispatch($request);
        } else {
            return $this->___callPlugins('dispatch', func_get_args(), $pluginInfo);
        }
    }
}
