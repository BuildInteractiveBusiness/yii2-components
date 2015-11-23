<?php

namespace app\components;

use yii\db\Migration;

/**
 * Вспомогательный класс для миграций
 *
 * @author mr
 */
class MigrationHelper extends Migration 
{
    protected $tableOptions = null;
    protected $tableName = null;
    /**
     * Задает конфигурацию таблиц в зависимости от используемой БД
     */
    public function setTableOptions()
    {
        if ($this->db->driverName === 'mysql') {
            $this->tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
    }
}
