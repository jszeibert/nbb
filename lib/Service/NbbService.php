<?php

namespace OCA\Nbb\Service;

use Exception;

use OCP\AppFramework\Db\DoesNotExistException;
use OCP\AppFramework\Db\MultipleObjectsReturnedException;

use OCA\Nbb\Db\Play;
use OCA\Nbb\Db\PlayMapper;

class PlayService {
	/** @var PlayMapper */
	private $mapper;

	public function __construct(PlayMapper $mapper) {
		$this->mapper = $mapper;
	}

	public function findAll(string $userId): array {
		return $this->mapper->findAll($userId);
	}

	private function handleException(Exception $e): void {
		if ($e instanceof DoesNotExistException ||
			$e instanceof MultipleObjectsReturnedException) {
			throw new PlayNotFound($e->getMessage());
		} else {
			throw $e;
		}
	}

	public function find($id, $userId) {
		try {
			return $this->mapper->find($id, $userId);
		} catch (Exception $e) {
			$this->handleException($e);
		}
	}

	public function create($title, $description, $userId) {
		$play = new Play();
		$play->setTitle($title);
		$play->setDescription($description);
		$play->setUserId($userId);
		return $this->mapper->insert($play);
	}

	public function update($id, $title, $description, $userId) {
		try {
			$play = $this->mapper->find($id, $userId);
			$play->setTitle($title);
			$play->setDescription($description);
			return $this->mapper->update($play);
		} catch (Exception $e) {
			$this->handleException($e);
		}
	}

	public function delete($id, $userId) {
		try {
			$play = $this->mapper->find($id, $userId);
			$this->mapper->delete($play);
			return $play;
		} catch (Exception $e) {
			$this->handleException($e);
		}
	}
}
