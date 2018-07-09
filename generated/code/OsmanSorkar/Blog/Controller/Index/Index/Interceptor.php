<?php
namespace OsmanSorkar\Blog\Controller\Index\Index;

/**
 * Interceptor class for @see \OsmanSorkar\Blog\Controller\Index\Index
 */
class Interceptor extends \OsmanSorkar\Blog\Controller\Index\Index implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\App\Action\Context $context, \Magento\Framework\View\Result\PageFactory $resultPageFactory, \OsmanSorkar\Blog\Model\ResourceModel\Post\CollectionFactory $postCollectionFactory)
    {
        $this->___init();
        parent::__construct($context, $resultPageFactory, $postCollectionFactory);
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
