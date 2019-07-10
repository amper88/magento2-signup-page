<?php
namespace Company\Signup\Controller\Save;

use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Index extends \Magento\Framework\App\Action\Action
{
    protected $_pageFactory;
    protected $_signupFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Company\Signup\Model\SignupFactory $signupFactory
    )
    {
        $this->_signupFactory = $signupFactory->create();
        $this->_pageFactory = $pageFactory;
        return parent::__construct($context);
    }

    public function execute()
    {
        try {
            // Only execute this action over an Ajax call
            if ($this->getRequest()->isAjax()) {

                // Parse form input values
                $signupForm = array();
                parse_str($_POST['signup-form'], $signupForm);

                // Validate fields have been entered
                if(empty($signupForm['signup-name']) || empty($signupForm['signup-date'])) {
                    $this->messageManager->addError('Please fill in all fields');
                    return;
                }

                $model = $this->_signupFactory;

                $date =   $signupForm['signup-date'].' 00:00:00';
                $timestamp = date('Y-m-d H:m:s', strtotime($date));


                //$date = date('m-d-Y H:i:s', $signupForm['signup-date'].' 0:0:0');


                $model->addData([
                    "name" => $signupForm['signup-name'],
                    "date" => $timestamp
                ]);

                $saveData = $model->save();

                if($saveData){
                    $this->messageManager->addSuccess( __('Sign up has been successfully added!') );
                }
            }
            return;
        }catch (Exception $e){
            $this->messageManager->addError($e->getMessage());
            return;
        }
    }
}
