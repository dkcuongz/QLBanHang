<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OrderDetailTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OrderDetailTable Test Case
 */
class OrderDetailTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\OrderDetailTable
     */
    protected $OrderDetail;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.OrderDetail',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('OrderDetail') ? [] : ['className' => OrderDetailTable::class];
        $this->OrderDetail = $this->getTableLocator()->get('OrderDetail', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->OrderDetail);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
