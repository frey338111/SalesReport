<?php
declare(strict_types=1);

namespace Fei\SalesReport\Controller\Adminhtml\Report;

use Magento\Reports\Controller\Adminhtml\Report\AbstractReport;
use Magento\Framework\App\Action\HttpGetActionInterface as HttpGetActionInterface;

class Index extends AbstractReport implements HttpGetActionInterface
{
    public const ADMIN_RESOURCE = 'Fei_SalesReport::report_sales_product_revenue';

    /**
     * Sold Products Report Action
     *
     * @return void
     */
    public function execute(): void
    {
        $this->_initAction()->_setActiveMenu(
            'Fei_SalesReport::report_sales_product_revenue'
        )->_addBreadcrumb(
            __('Products Sales Revenue Report'),
            __('Products Sales Revenue Report')
        );
        $this->_view->getPage()->getConfig()->getTitle()->prepend(__('Product Sales Revenue Report'));
        $this->_view->renderLayout();
    }
}
