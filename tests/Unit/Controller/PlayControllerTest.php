<?php

namespace OCA\Nbb\Tests\Unit\Controller;

use PHPUnit\Framework\TestCase;

use OCP\AppFramework\Http;
use OCP\IRequest;

use OCA\Nbb\Service\PlayNotFound;
use OCA\Nbb\Service\NbbService;
use OCA\Nbb\Controller\PlayController;

class PlayControllerTest extends TestCase {
	protected $controller;
	protected $service;
	protected $userId = 'john';
	protected $request;

	public function setUp(): void {
		$this->request = $this->getMockBuilder(IRequest::class)->getMock();
		$this->service = $this->getMockBuilder(NbbService::class)
			->disableOriginalConstructor()
			->getMock();
		$this->controller = new PlayController($this->request, $this->service, $this->userId);
	}

	public function testUpdate() {
		$play = 'just check if this value is returned correctly';
		$this->service->expects($this->once())
			->method('updatePlay')
			->with($this->equalTo(3),
				$this->equalTo('title'),
				$this->equalTo('description'),
				$this->equalTo($this->userId))
			->will($this->returnValue($play));

		$result = $this->controller->update(3, 'title', 'description', false);

		$this->assertEquals($play, $result->getData());
	}

	public function testArchived() {
		$play = 'check if archived bit is toggled';
		$this->service->expects($this->once())
			->method('toggleArchivedPlay')
			->with($this->equalTo(3),
				$this->equalTo($this->userId))
			->will($this->returnValue($play));

		$result = $this->controller->archive(3);

		$this->assertEquals($play, $result->getData());
	}


	public function testUpdateNotFound() {
		// test the correct status code if no play is found
		$this->service->expects($this->once())
			->method('updatePlay')
			->will($this->throwException(new PlayNotFound()));

		$result = $this->controller->update(3, 'title', 'description');

		$this->assertEquals(Http::STATUS_NOT_FOUND, $result->getStatus());
	}
}
