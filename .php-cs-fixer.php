<?php

declare(strict_types=1);

$finder = (new PhpCsFixer\Finder())
	->in(__DIR__)
	->exclude('vendor')
;

return (new PhpCsFixer\Config())
	->setRiskyAllowed(true)
	->setIndent("\t")
	->setRules([
		'@PHP70Migration' => true,
		'@PHP71Migration' => true,
		'@PHP73Migration' => true,
		'@PHP74Migration' => true,
		'@PHP80Migration' => true,
		'@PHP81Migration' => true,
		'@Symfony' => true,
		'@Symfony:risky' => true,
		'yoda_style' => false,
		'explicit_string_variable' => false,
		'concat_space' => [
		'spacing' => 'one',
		],
		'phpdoc_align' => [
			'align' => 'vertical'
		],
		'phpdoc_no_alias_tag' => false,
		'increment_style' => [
			'style' => 'post',
		],
	])
	->setFinder($finder)
	;
