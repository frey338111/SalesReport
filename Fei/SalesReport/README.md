# Fei_SalesReport

A custom Magento 2 admin report module that adds a **Product Revenue Report** under **Reports → Sales Reports**.  
It lists products with total quantity sold and revenue earned, filtered by date range.

---

## Features

- Shows product name, quantity sold, and total revenue (invoiced amount)
- Groups results by selected time range (Day, Month, Year)
- Only includes products with positive net sales
- Admin ACL protected

---

## Installation

1. Place the module in:  
   `app/code/Fei/SalesReport/`

2. Enable the module:

   ```bash
   php bin/magento setup:upgrade
   php bin/magento setup:di:compile
   php bin/magento cache:flush
