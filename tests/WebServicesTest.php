<?php

namespace Whise\Tests;

use Whise\WebServices;
use Whise\Exception\{RequestException, ResponseException, WebServiceException};
use PHPUnit\Framework\TestCase;

class WebServicesTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->adapter = new TestApiAdapter();
        $this->webServices = new WebServices('test');
        $this->webServices->setApiAdapter($this->adapter);
    }

    // API adapter tests

    public function testInvalidJson()
    {
        $this->adapter->queueResponse('invalid');
        $this->expectException(WebServiceException::class);
        $this->webServices->getAvailabilityList();
    }

    public function testExceptionMessage()
    {
        $this->adapter->queueResponseFromFile('ExceptionMessage.json');
        $this->expectException(WebServiceException::class);
        $this->webServices->getAvailabilityList();
    }

    public function testInvalidResponse()
    {
        $this->adapter->queueResponse('{}');
        $this->expectException(WebServiceException::class);
        $this->webServices->getAvailabilityList();
    }

    public function testErrorMessages()
    {
        $this->adapter->queueResponseFromFile('ErrorMessages.json');
        $this->expectException(WebServiceException::class);
        $this->webServices->getAvailabilityList();
    }

    // Property tests

    public function testInvalidRequestProperty()
    {
        $request = new \Whise\Request\GetEstateListRequest();
        $this->expectException(RequestException::class);
        $request->invalid = 1;
    }

    public function testInvalidResponseProperty()
    {
        $this->adapter->queueResponseFromPaginatedFile('GetEstateList.json');
        $estate = $this->webServices->getEstate(1);
        $this->expectException(ResponseException::class);
        $estate->invalid;
    }

    // List tests

    public function testRowCount()
    {
        $this->adapter->queueResponseFromPaginatedFile('GetEstateList.json');
        $estates = $this->webServices->getEstateList();
        $this->assertSame(40, count($estates));
    }

    public function testPagination()
    {
        $this->adapter->queueResponseFromPaginatedFile('GetEstateList.json');
        $items = $this->webServices->getEstateList();
        $count = 0;
        foreach ($items as $item) $count++;
        $this->assertSame(40, $count);
    }

    public function testAltPagination()
    {
        $this->adapter->queueResponseFromPaginatedFile('GetCalendarList.json');
        $items = $this->webServices->getCalendarList();
        $count = 0;
        foreach ($items as $item) $count++;
        $this->assertSame(40, $count);
    }
}
