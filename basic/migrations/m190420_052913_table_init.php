<?php

use yii\db\Migration;

/**
 * Class m190420_052913_table_init
 */
class m190420_052913_table_init extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%department}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull()
        ]);

        $this->batchInsert('department', ['name'], [
            ['Отдел автоматизации'],
            ['Финансовый отдел'],
            ['Экономический отдел'],
            ['Бухгалтерия'],
            ['Отдел кадров'],
            ['Канцелярия'],
            ['Отдел продаж'],
        ]);

        $this->createTable('{{%employees}}',[
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'email' => $this->string(255)->notNull(),
            'department_id' => $this->integer()->notNull(),
            'foto' => 'MEDIUMBLOB',
        ]);

        $this->addForeignKey('fk_employees_department_id', 'employees', 'department_id', 'department', 'id', 'CASCADE', 'CASCADE');

        $array = array();
        for ($i = 1; $i <= 30; $i++){
            $array[] = ['Фамилия Имя Отчество №'.$i, 'example'.$i.'@example.ru', rand(1,7), null];
        }
        $this->batchInsert('employees', ['name', 'email', 'department_id', 'foto'], $array);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%employees}}');
        $this->dropTable('{{%department}}');
        echo "m190420_052913_table_init cannot be reverted.\n";
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190420_052913_table_init cannot be reverted.\n";

        return false;
    }
    */
}
