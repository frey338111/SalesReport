<?php
declare(strict_types=1);

namespace Fei\SalesReport\Block\Adminhtml\Report;

use Magento\Backend\Block\Widget\Grid\Container;

class Grid extends Container
{
    /**
     * Init report parameters
     *
     * @return void
     */
    protected function _construct(): void
    {
        $this->_controller = 'adminhtml_report_grid';
        $this->_blockGroup = 'Magento_Reports';
        parent::_construct();
        $this->buttonList->remove('add');
    }
}
