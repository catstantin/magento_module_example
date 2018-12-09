<?php

namespace Mobilunity\MagentoSample\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

class InstallSchema implements InstallSchemaInterface
{
    /**
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     * @throws \Zend_Db_Exception
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();

        $tableName = $installer->getTable('sample_data');
        if ($installer->getConnection()->isTableExists($tableName) != true) {
            $table = $installer->getConnection()
                ->newTable($tableName)
                ->addColumn(
                    'id',
                    Table::TYPE_INTEGER,
                    null,
                    [
                        'identity' => true,
                        'unsigned' => true,
                        'nullable' => false,
                        'primary' => true
                    ],
                    'ID'
                )
                ->addColumn(
                    'order_entity_id',
                    Table::TYPE_INTEGER,
                    10,
                    ['nullable' => false, 'unsigned' => true],
                    'Order entity ID'
                )
                ->addColumn(
                    'multiplied_order_total',
                    Table::TYPE_DECIMAL,
                    [10, 4],
                    ['nullable' => false],
                    'Multiplied order total'
                )
                ->addIndex(
                    $installer->getIdxName($tableName, ['order_entity_id']),
                    ['order_entity_id']
                )
                ->setComment('Sample Table')
                ->setOption('type', 'InnoDB')
                ->setOption('charset', 'utf8');
            $installer->getConnection()->createTable($table);

            $installer->getConnection()->addForeignKey(
                $installer->getFkName(
                    $tableName,
                    'order_entity_id',
                    $installer->getTable('sales_order'),
                    'entity_id'
                ),
                $tableName,
                'order_entity_id',
                $installer->getTable('sales_order'),
                'entity_id',
                Table::ACTION_CASCADE
            );
        }

        $installer->endSetup();
    }
}