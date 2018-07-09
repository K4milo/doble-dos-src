<?php
namespace A4logic\Payulatam\Controller\Payment\Start;

/**
 * Interceptor class for @see \A4logic\Payulatam\Controller\Payment\Start
 */
class Interceptor extends \A4logic\Payulatam\Controller\Payment\Start implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\App\Action\Context $context, \A4logic\Payulatam\Model\ClientFactory $clientFactory, \A4logic\Payulatam\Model\Order $orderHelper, \A4logic\Payulatam\Model\Session $session, \A4logic\Payulatam\Logger\Logger $logger)
    {
        $this->___init();
        parent::__construct($context, $clientFactory, $orderHelper, $session, $logger);
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
