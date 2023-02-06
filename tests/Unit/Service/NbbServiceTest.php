<?php

namespace OCA\Nbb\Tests\Unit\Service;

use OCA\Nbb\Service\PlayNotFound;
use PHPUnit\Framework\TestCase;

use OCP\AppFramework\Db\DoesNotExistException;

use OCA\Nbb\Db\Play;
use OCA\Nbb\Service\NbbService;
use OCA\Nbb\Db\PlayMapper;

class NbbServiceTest extends TestCase {
	private $service;
	private $mapper;
	private $userId = 'john';

	public function setUp(): void {
		$this->mapper = $this->getMockBuilder(PlayMapper::class)
			->disableOriginalConstructor()
			->getMock();
		$this->service = new NbbService($this->mapper);
	}

	public function testUpdate() {
		// the existing play
		$play = Play::fromRow([
			'id' => 3,
			'title' => 'yo',
			'description' => 'nope',
			'archived' => false,
		]);
		$this->mapper->expects($this->once())
			->method('find')
			->with($this->equalTo(3))
			->will($this->returnValue($play));

		// the play when updated
		$updatedPlay = Play::fromRow(['id' => 3]);
		$updatedPlay->setTitle('title');
		$updatedPlay->setDescription('description');
		$this->mapper->expects($this->once())
			->method('update')
			->with($this->equalTo($updatedPlay))
			->will($this->returnValue($updatedPlay));

		$result = $this->service->updatePlay(3, 'title', 'description', $this->userId);

		$this->assertEquals($updatedPlay, $result);
	}

	public function testUpdateNotFound() {
		$this->expectException(PlayNotFound::class);
		// test the correct status code if no play is found
		$this->mapper->expects($this->once())
			->method('find')
			->with($this->equalTo(3))
			->will($this->throwException(new DoesNotExistException('')));

		$this->service->updatePlay(3, 'title', 'description', $this->userId);
	}
}
