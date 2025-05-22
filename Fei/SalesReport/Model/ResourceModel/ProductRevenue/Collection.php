<?php
declare(strict_types=1);

namespace Fei\SalesReport\Model\ResourceModel\ProductRevenue;

use Magento\Sales\Model\ResourceModel\Order\Item\Collection as ReportItemCollection;
use Zend_Db_Select_Exception;

class Collection extends ReportItemCollection
{
    /**
     * Build up query base on sales order item table
     *
     * @param string $from
     * @param string $to
     *
     * @return $this
     *
     * @throws Zend_Db_Select_Exception
     */
    public function setDateRange(string $from, string $to): Collection
    {
        $this->_reset()
            ->addAttributeToSelect('name')
            ->addExpressionFieldToSelect(
                'total_sold',
                'SUM(main_table.qty_invoiced - main_table.qty_refunded)',
                [
                    'qty_ordered'  => 'main_table.qty_invoiced',
                    'qty_refunded' => 'main_table.qty_refunded',
                ]
            )->addExpressionFieldToSelect(
                'total_revenue',
                'SUM(main_table.row_invoiced - main_table.amount_refunded)',
                [
                    'row_invoiced'    => 'main_table.row_invoiced',
                    'amount_refunded' => 'main_table.amount_refunded',
                ]
            )->addFieldToFilter('main_table.parent_item_id', ['null' => true])
            ->addFieldToFilter('main_table.created_at', [
                'from' => $from,
                'to'   => $to,
            ])
            ->getSelect()
            ->group('main_table.product_id')
            ->where('main_table.row_invoiced > main_table.amount_refunded');

        return $this;
    }

    /**
     * Set store filter to collection
     *
     * @param array $storeIds
     *
     * @return $this
     */
    public function setStoreIds(array $storeIds): Collection
    {
        if ($storeIds) {
            $this->getSelect()->where('main_table.store_id IN (?)', (array)$storeIds);
        }

        return $this;
    }
}
