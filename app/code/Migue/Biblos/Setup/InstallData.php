<?php
namespace Migue\Biblos\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
          /**
           * Install cities (Colombia)
           */
          $data = [
            ['titulo' => 'Medellín', 'autor' => 'Migue', 'editorial' => 'ahora', 'anio_publicacion' => 2000, 'unidades_disponibles' => 2],
          ];
          foreach ($data as $bind) {
              $setup->getConnection()
                ->insertForce($setup->getTable('libros'), $bind);
          }

    }
}