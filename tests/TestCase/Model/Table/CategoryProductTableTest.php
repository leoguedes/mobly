<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CategoryProductTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CategoryProductTable Test Case
 */
class CategoryProductTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CategoryProductTable
     */
    public $CategoryProduct;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.category_product',
        'app.category',
        'app.product'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('CategoryProduct') ? [] : ['className' => CategoryProductTable::class];
        $this->CategoryProduct = TableRegistry::getTableLocator()->get('CategoryProduct', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CategoryProduct);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
