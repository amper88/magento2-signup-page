<?php
namespace Company\Signup\Controller\Index;

use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Index extends \Magento\Framework\App\Action\Action
{
    protected $_resultPageFactory;

    public function __construct(
        Context $context,
        PageFactory $resultPageFactory)
    {
        $this->_resultPageFactory = $resultPageFactory;

        parent::__construct(
            $context
        );
    }

    public function execute()
    {
        $resultPage = $this->_resultPageFactory->create();
        $resultPage->addHandle('signup_index_index');

        return $resultPage;
    }
}
