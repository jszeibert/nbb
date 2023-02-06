<?php

namespace OCA\Nbb\Controller;

use OCA\Nbb\AppInfo\Application;
use OCA\Nbb\Service\NbbService;
use OCP\AppFramework\Controller;
use OCP\AppFramework\Http\DataResponse;
use OCP\IRequest;

class PlayController extends Controller {
	private $service;

	/** @var string */
	private $userId;

	use Errors;

	public function __construct(IRequest $request,
		NbbService $service,
		$userId) {
		parent::__construct(Application::APP_ID, $request);
		$this->service = $service;
		$this->userId = $userId;
	}

	/**
	 * @NoAdminRequired
	 */
	public function index(): DataResponse {
		return new DataResponse($this->service->findAllPlays($this->userId));
	}

	/**
	 * @NoAdminRequired
	 */
	public function show(int $id): DataResponse {
		return $this->handleNotFound(function () use ($id) {
			return $this->service->findPlay($id, $this->userId);
		});
	}

	/**
	 * @NoAdminRequired
	 */
	public function create(string $title, string $description): DataResponse {
		return new DataResponse($this->service->createPlay($title, $description,
			$archived, $this->userId));
	}

	/**
	 * @NoAdminRequired
	 */
	public function update(int $id, string $title,
		string $description): DataResponse {
		return $this->handleNotFound(function () use ($id, $title, $description) {
			return $this->service->updatePlay($id, $title, $description, $this->userId);
		});
	}

	/**
	 * @NoAdminRequired
	 */
	public function archive(int $id): DataResponse {
		return $this->handleNotFound(function () use ($id) {
			return $this->service->toggleArchivedPlay($id, $this->userId);
		});
	}

	/**
	 * @NoAdminRequired
	 */
	public function destroy(int $id): DataResponse {
		return $this->handleNotFound(function () use ($id) {
			return $this->service->deletePlay($id, $this->userId);
		});
	}
}
