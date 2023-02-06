<?php

namespace OCA\Nbb\Db;

use JsonSerializable;

use OCP\AppFramework\Db\Entity;

class Play extends Entity implements JsonSerializable {
	protected $title;
	protected $description;
	protected $archived;
	protected $userId;

	public function jsonSerialize(): array {
		return [
			'id' => $this->id,
			'title' => $this->title,
			'description' => $this->description,
			'archived' => $this->archived,
		];
	}
}
