<?php 
namespace Migue\Biblos\Setup;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\DB\Ddl\Table;
class InstallSchema implements \Magento\Framework\Setup\InstallSchemaInterface{
    public function install(SchemaSetupInterface $setup,ModuleContextInterface $context){
        $setup->startSetup();
        $conn = $setup->getConnection();
        $tableName = $setup->getTable('libros');
        if($conn->isTableExists($tableName) != true){
            $table = $conn->newTable($tableName)
                            ->addColumn(
                                'id_libro',
                                Table::TYPE_INTEGER,
                                null,
                     ['identity'=>true,'unsigned'=>true,'nullable'=>false,'primary'=>true]
                                )
                            ->addColumn(
                                'titulo',
                                Table::TYPE_TEXT,
                                255,
                                ['nullable'=>false,'default'=>'']
                                )
                            ->addColumn(
                                'autor',
                                Table::TYPE_TEXT,
                                255,
                                ['nullable'=>false,'default'=>'']
                                )
                            ->addColumn(
                                'editorial',
                                Table::TYPE_TEXT,
                                255,
                                ['nullable'=>false,'default'=>'']
                                )
                            ->addColumn(
                                'anio_publicacion',
                                Table::TYPE_INTEGER,
                                null,
                                ['nullable'=>false]
                                )
                            ->addColumn(
                                'unidades_disponibles',
                                Table::TYPE_INTEGER,
                                null,
                                ['nullable'=>false]
                                )
                            ->setOption('charset','utf8');
            $conn->createTable($table);
        }
        $setup->endSetup();
    }
}