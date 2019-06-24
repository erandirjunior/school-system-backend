<?php

return [
	'name' => 'My Project Migration',
	'migrations_namespace' => 'School\Infrastructure\Migration',
	'table_name' => 'doctrine_migration_versions',
	'column_name' => 'version',
	'column_length' => 14,
	'executed_at_column_name' => 'executed_at',
	'migrations_directory' => '/src/Infrastructure/Migration/',
	'all_or_nothing' => true
];