<?php

namespace common\models;

use tests\codeception\common\fixtures\EmployeeBusinessProfileFixture;
use tests\codeception\common\fixtures\EmployeeFixture;


/**
 * Generated by PHPUnit_SkeletonGenerator on 2015-02-20 at 12:44:53.
 */
class EmployeeTest extends \tests\codeception\common\unit\DbTestCase
{
    
    /**
     * @inheritdoc
     */
    public function fixtures()
    {
        return [
            'businessProfiles' => [
                'class' => EmployeeBusinessProfileFixture::className(),
            ],
            'employee' => [
                'class' => EmployeeFixture::className(),
            ],
        ];
    }

    /**
     * @var Employee
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        parent::setUp();
        $this->object = new Employee;
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @covers common\models\Employee::rules
     * @todo   Implement testRules().
     */
    public function testRules()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers common\models\Employee::behaviors
     * @todo   Implement testBehaviors().
     */
    public function testBehaviors()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers common\models\Employee::getLocationName
     */
    public function testGetLocationName()
    {
        $this->assertNotNull($employee = Employee::findOne(1));
        $this->assertEquals('Poland/Lublin', $employee->locationName);
    }

    /**
     * @covers common\models\Employee::getFullname
     * @todo   Implement testGetFullname().
     */
    public function testGetFullname()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers common\models\Employee::isAdministrator
     * @todo   Implement testIsAdministrator().
     */
    public function testIsAdministrator()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers common\models\Employee::getPrimaryBusinessProfile
     */
    public function testGetPrimaryBusinessProfile()
    {
        $this->assertNotNull($employee = Employee::findOne(1));
        $this->assertEquals('BPROFILE1', $employee->getPrimaryBusinessProfile());

        $this->assertNotNull($employee = Employee::findOne(2));
        $this->assertNull($employee->getPrimaryBusinessProfile());
    }

    /**
     * @covers common\models\Employee::getSecondaryBusinessProfiles
     */
    public function testGetSecondaryBusinessProfiles()
    {
        $this->assertNotNull($employee = Employee::findOne(1));
        $this->assertEquals('BPROFILE2,BPROFILE3,', $employee->getSecondaryBusinessProfiles());

        $this->assertNotNull($employee = Employee::findOne(2));
        $this->assertNull($employee->getSecondaryBusinessProfiles());
    }
}