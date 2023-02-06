<?php

namespace OCA\Nbb\Service;

use Exception;

use OCP\AppFramework\Db\DoesNotExistException;
use OCP\AppFramework\Db\MultipleObjectsReturnedException;

use OCA\Nbb\Db\Play;
use OCA\Nbb\Db\PlayMapper;

class NbbService {
	/** @var PlayMapper */
	private $playMapper;

	public function __construct(PlayMapper $playMapper) {
		$this->playMapper = $playMapper;
	}

	public function findAll(string $userId): array {
		return $this->playMapper->findAll($userId);
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
			return $this->playMapper->find($id, $userId);
		} catch (Exception $e) {
			$this->handleException($e);
		}
	}

	public function createPlay($title, $description, $userId) {
		$play = new Play();
		$play->setTitle($title);
		$play->setDescription($description);
		$play->setArchived(false);
		$play->setUserId($userId);
		return $this->playMapper->insert($play);
	}

	public function updatePlay($id, $title, $description, $userId) {
		try {
			$play = $this->playMapper->find($id, $userId);
			$play->setTitle($title);
			$play->setDescription($description);
			return $this->playMapper->update($play);
		} catch (Exception $e) {
			$this->handleException($e);
		}
	}

	public function deletePlay($id, $userId) {
		try {
			$play = $this->playMapper->find($id, $userId);
			$this->playMapper->delete($play);
			return $play;
		} catch (Exception $e) {
			$this->handleException($e);
		}
	}

	public function toggleArchivedPlay($id, $userId) {
		try {
			$play = $this->playMapper->find($id, $userId);
			$play->setArchived(!$play->archived);
			return $this->playMapper->update($play);
		} catch (Exception $e) {
			$this->handleException($e);
		}
	}
}
