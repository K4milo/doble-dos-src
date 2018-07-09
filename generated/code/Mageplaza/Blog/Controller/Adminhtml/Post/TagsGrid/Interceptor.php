<?php
namespace Mageplaza\Blog\Controller\Adminhtml\Post\TagsGrid;

/**
 * Interceptor class for @see \Mageplaza\Blog\Controller\Adminhtml\Post\TagsGrid
 */
class Interceptor extends \Mageplaza\Blog\Controller\Adminhtml\Post\TagsGrid implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Backend\App\Action\Context $context, \Magento\Framework\Registry $registry, \Magento\Framework\View\Result\LayoutFactory $resultLayoutFactory, \Mageplaza\Blog\Model\PostFactory $tagFactory)
    {
        $this->___init();
        parent::__construct($context, $registry, $resultLayoutFactory, $tagFactory);
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