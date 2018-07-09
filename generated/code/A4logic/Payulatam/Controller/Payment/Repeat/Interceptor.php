<?php
namespace A4logic\Payulatam\Controller\Payment\Repeat;

/**
 * Interceptor class for @see \A4logic\Payulatam\Controller\Payment\Repeat
 */
class Interceptor extends \A4logic\Payulatam\Controller\Payment\Repeat implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\App\Action\Context $context, \A4logic\Payulatam\Helper\Payment $paymentHelper, \A4logic\Payulatam\Model\Session $session)
    {
        $this->___init();
        parent::__construct($context, $paymentHelper, $session);
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
