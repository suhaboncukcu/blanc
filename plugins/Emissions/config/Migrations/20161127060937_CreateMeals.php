<?php
use Migrations\AbstractMigration;

class CreateMeals extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('meals');
        $table->addColumn('amount', 'float', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('is_meat', 'boolean', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('is_community', 'boolean', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('is_outside', 'boolean', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('emission_factor', 'float', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('impact', 'float', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('created', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('modified', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->create();
    }
}
