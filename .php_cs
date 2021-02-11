<?php

static $rules =
[
    'php_unit_strict' => true,
    'php_unit_internal_class' => true,
    'php_unit_test_class_requires_covers' => true,
    'align_multiline_comment' => true,
    'single_line_comment_style' => true,
    'multiline_comment_opening_closing' => true,
    'blank_line_before_statement' => true,
    'combine_consecutive_issets' => true,
    'combine_consecutive_unsets' => true,
    'explicit_string_variable' => true,
    'heredoc_to_nowdoc' => true,
    'method_argument_space' => true,
    'method_chaining_indentation' => true,
    'no_null_property_initialization' => true,
    'no_superfluous_elseif' => true,
    'no_useless_else' => true,
    'no_useless_return' => true,
    'ordered_class_elements' => true,
    'single_line_throw' => true,
    'return_assignment' => true,
    'simple_to_complex_string_variable' => true,
    'no_unreachable_default_argument_value' => true,
    'phpdoc_add_missing_param_annotation' => true,
    'phpdoc_no_empty_return' => true,
    'phpdoc_order' => true,
    'phpdoc_types_order' => true,
    'phpdoc_var_annotation_correct_order' => true,
    '@PHP56Migration' => true,
    '@PHPUnit57Migration:risky' => true,
    '@PSR1' => true,
    '@PSR12' => true
];

static $excludeFolders =
[
    'vendor/'
];

$excludeFiles =
[
    'tests/compatibility.php'
];

$finder = PhpCsFixer\Finder::create()
    ->in(addslashes(__DIR__))
    ->exclude($excludeFolders)
    ->ignoreDotFiles(true)
    ->ignoreVCS(true)
    ->notPath($excludeFiles[0]);
return PhpCsFixer\Config::create()
    ->setRules($rules)
    ->setFinder($finder);
