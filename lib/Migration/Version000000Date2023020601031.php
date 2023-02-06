<?php

declare(strict_types=1);

namespace OCA\Nbb\Migration;

use Closure;
use OCP\DB\ISchemaWrapper;
use OCP\Migration\SimpleMigrationStep;
use OCP\Migration\IOutput;

class Version000000Date2023020601031 extends SimpleMigrationStep {
	/**
	 * @param IOutput $output
	 * @param Closure $schemaClosure The `\Closure` returns a `ISchemaWrapper`
	 * @param array $options
	 * @return null|ISchemaWrapper
	 */
	public function changeSchema(IOutput $output, Closure $schemaClosure, array $options) {
		/** @var ISchemaWrapper $schema */
		$schema = $schemaClosure();

		// Adding Archived flag
		$table = $schema->getTable('nbb_plays');
		if (!$table->hasColumn('archived')) {
			$table->addColumn('archived', 'boolean', [
				'notnull' => false,
				'default' => false,
			]);
		}

		return $schema;
	}
}
