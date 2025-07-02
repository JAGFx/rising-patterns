<?php

declare(strict_types=1);

use Rector\CodingStyle\Rector\FuncCall\ConsistentImplodeRector;
use Rector\CodingStyle\Rector\Stmt\NewlineAfterStatementRector;
use Rector\Config\RectorConfig;
use Rector\DeadCode\Rector\If_\RemoveAlwaysTrueIfConditionRector;
use Rector\EarlyReturn\Rector\If_\ChangeIfElseValueAssignToEarlyReturnRector;
use Rector\EarlyReturn\Rector\If_\RemoveAlwaysElseRector;
use Rector\EarlyReturn\Rector\StmtsAwareInterface\ReturnEarlyIfVariableRector;
use Rector\Naming\Rector\Assign\RenameVariableToMatchMethodCallReturnTypeRector;
use Rector\Naming\Rector\Class_\RenamePropertyToMatchTypeRector;
use Rector\Naming\Rector\ClassMethod\RenameParamToMatchTypeRector;
use Rector\Set\ValueObject\SetList;
use Rector\Visibility\Rector\ClassMethod\ExplicitPublicClassMethodRector;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->paths([
        __DIR__ . '/src',
        __DIR__ . '/*.php',
    ]);

    $rectorConfig->importNames();

    /// Sets
    $rectorConfig->sets([
        SetList::CODE_QUALITY,
        SetList::CODING_STYLE,
        SetList::TYPE_DECLARATION,
        SetList::DEAD_CODE,
        SetList::NAMING,
        SetList::PRIVATIZATION,
        SetList::EARLY_RETURN,
        SetList::STRICT_BOOLEANS,
        SetList::PHP_84,
    ]);

//    // PHPUnit
//    $rectorConfig->sets([
//        PHPUnitSetList::PHPUNIT_91,
//        PHPUnitSetList::PHPUNIT_CODE_QUALITY,
//        PHPUnitSetList::PHPUNIT_EXCEPTION,
//        PHPUnitSetList::REMOVE_MOCKS,
//        PHPUnitSetList::PHPUNIT_SPECIFIC_METHOD,
//        PHPUnitSetList::PHPUNIT_YIELD_DATA_PROVIDER,
//    ]);

    // PHPStan
    $rectorConfig->phpstanConfig(__DIR__ . '/phpstan.neon');

    // Rules
    $rectorConfig->rules([
        ExplicitPublicClassMethodRector::class,
        ChangeIfElseValueAssignToEarlyReturnRector::class,
        RemoveAlwaysElseRector::class,
        ReturnEarlyIfVariableRector::class,
    ]);

    // Remove rules
    $rectorConfig->skip([
        ConsistentImplodeRector::class,
        NewlineAfterStatementRector::class,
        RemoveAlwaysTrueIfConditionRector::class,
        RenameParamToMatchTypeRector::class,
        RenamePropertyToMatchTypeRector::class,
        RenameVariableToMatchMethodCallReturnTypeRector::class,
    ]);
};