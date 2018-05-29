<p align="center">
  <img src="http://malanka.pro/assets/img/logo.png" alt="MALANKA Logo"/>
</p>

# Additional component Module
The additional components for Yii2 framework.

The main purpose of this module to provide the ability to wrap common function from PHP and Yii2 framework. 

## Installation

For the installation of modules Composer is required

```sh
composer require malankateam/yii2-components:~0.1.0
```

### Configuration
After adding to your composer json you have to create your migration and update migration file to:

```php

use robot72\components\helpers\MigrationHelper;

class m000000_092100_our_migration extends MigrationHelper
{
    public $tableName = '{{%lead_generate}}';

    public function up()
    {
        $this->setTableOptions();
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'type' => $this->integer(11),
            'data' => $this->text(),
            'create_at' => $this->timestamp()->notNull(),
        ], $this->tableOptions);
    }

    public function down()
    {
        $this->dropTable($this->tableName);
    }
}
