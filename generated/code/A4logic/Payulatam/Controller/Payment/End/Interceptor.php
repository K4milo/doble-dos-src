<?php
namespace A4logic\Payulatam\Controller\Payment\End;

/**
 * Interceptor class for @see \A4logic\Payulatam\Controller\Payment\End
 */
class Interceptor extends \A4logic\Payulatam\Controller\Payment\End implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\App\Action\Context $context, \Magento\Checkout\Model\Session\SuccessValidator $successValidator, \Magento\Checkout\Model\Session $checkoutSession, \A4logic\Payulatam\Model\Session $session, \A4logic\Payulatam\Model\ClientFactory $clientFactory, \A4logic\Payulatam\Model\Order $orderHelper, \A4logic\Payulatam\Logger\Logger $logger)
    {
        $this->___init();
        parent::__construct($context, $successValidator, $checkoutSession, $session, $clientFactory, $orderHelper, $logger);
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
