<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CarReviewsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CarReviewsTable Test Case
 */
class CarReviewsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CarReviewsTable
     */
    protected $CarReviews;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.CarReviews',
        'app.Users',
        'app.Cars',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('CarReviews') ? [] : ['className' => CarReviewsTable::class];
        $this->CarReviews = $this->getTableLocator()->get('CarReviews', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->CarReviews);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\CarReviewsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\CarReviewsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
