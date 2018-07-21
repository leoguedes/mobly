<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CategoryProductFixture
 *
 */
class CategoryProductFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'category_product';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'category_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'product_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_product_id_idx' => ['type' => 'index', 'columns' => ['product_id'], 'length' => []],
            'fk_category_id_idx' => ['type' => 'index', 'columns' => ['category_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_category_id' => ['type' => 'foreign', 'columns' => ['category_id'], 'references' => ['category', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_product_id' => ['type' => 'foreign', 'columns' => ['product_id'], 'references' => ['product', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'latin1_swedish_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'id' => 1,
                'category_id' => 1,
                'product_id' => 1
            ],
        ];
        parent::init();
    }
}
