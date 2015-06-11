<?php

/**
 * Performance A/B testing "framework"
 *
 * Defines a set of expirements with criterias of when to enable them
 *
 * Inspired by https://github.com/etsy/feature
 *
 * @see PLATFORM-1246
 * @author macbre
 */

$wgExtensionCredits['other'][] = [
	'name'   => 'A/B Performance Tests',
	'url'    => 'https://github.com/Wikia/app/tree/dev/extensions/wikia/AbPerfTesting',
	'author' => [
		'[http://community.wikia.com/wiki/User:Macbre Maciej Brencz]'
	],
];

// generic classes
$wgAutoloadClasses[ 'Wikia\\AbPerfTesting\\Hooks'                     ] = __DIR__ . '/classes/Hooks.class.php';
$wgAutoloadClasses[ 'Wikia\\AbPerfTesting\\UnknownCriterionException' ] = __DIR__ . '/classes/UnknownCriterionException.class.php';

// experiments
$wgAutoloadClasses[ 'Wikia\\AbPerfTesting\\Experiment'                 ] = __DIR__ . '/experiments/Experiment.class.php';
$wgAutoloadClasses[ 'Wikia\\AbPerfTesting\\Experiments\\BackendDelay'  ] = __DIR__ . '/experiments/BackendDelay.class.php';
$wgAutoloadClasses[ 'Wikia\\AbPerfTesting\\Experiments\\FrontendDelay' ] = __DIR__ . '/experiments/FrontendDelay.class.php';

// criteria
$wgAutoloadClasses[ 'Wikia\\AbPerfTesting\\Criterion'               ] = __DIR__ . '/criteria/Criterion.class.php';
$wgAutoloadClasses[ 'Wikia\\AbPerfTesting\\Criteria\\OasisArticles' ] = __DIR__ . '/criteria/OasisArticles.class.php';
$wgAutoloadClasses[ 'Wikia\\AbPerfTesting\\Criteria\\Traffic'       ] = __DIR__ . '/criteria/Traffic.class.php';
$wgAutoloadClasses[ 'Wikia\\AbPerfTesting\\Criteria\\Wikis'         ] = __DIR__ . '/criteria/Wikis.class.php';

// initialize the experiments when we have full page context available (skin, title, user, etc.)
$wgHooks['AfterInitialize'][] = 'Wikia\\AbPerfTesting\\Hooks::onAfterInitialize';

// experiments config goes below
$wgABPerfTestingExperiments = [];

/**
 * Example entry:
 *
 * $wgABPerfTestingExperiments['an_experiment_42'] = [
 *  # PHP class that will be created when the experiment is considered active
 *	'handler' => 'Wikia\\AbPerfTesting\\Experiments\\AExperimentClass',
 *
 *  # parameters to be passed to the constructor as arguments
 *	'params' => [
 *		'foo' => 25,
 *		'bar' => 42,
 *	],
 *
 *  # set of criteria to which bucket given experiment should be assigned (all needs to be met)
 *	'criteria' => [
 *      # all wikis are split into 1000 buckets (modulo of city ID), pick one here
 *		'wikis' => 1,
 *      # all clients are split into 1000 buckets (modulo of beacon_id md5 hash), pick one here
 * 		'traffic' => 1,
 *	]
 *];
**/

$wgABPerfTestingExperiments['backend_delay_a'] = [
	'handler' => 'Wikia\\AbPerfTesting\\Experiments\\BackendDelay',
	'params' => [
		'delay' => 100,
	],
	'criteria' => [
		'oasisArticles' => true,
		'traffic' => 1,
	]
];

$wgABPerfTestingExperiments['backend_delay_b'] = [
	'handler' => 'Wikia\\AbPerfTesting\\Experiments\\BackendDelay',
	'params' => [
		'delay' => 200,
	],
	'criteria' => [
		'oasisArticles' => true,
		'traffic' => 2,
	]
];

$wgABPerfTestingExperiments['backend_delay_c'] = [
	'handler' => 'Wikia\\AbPerfTesting\\Experiments\\BackendDelay',
	'params' => [
		'delay' => 300,
	],
	'criteria' => [
		'oasisArticles' => true,
		'traffic' => 3,
	]
];

$wgABPerfTestingExperiments['frontend_delay'] = [
	'handler' => 'Wikia\\AbPerfTesting\\Experiments\\FrontendDelay',
	'criteria' => [
		// this test performs bucketing logic in JS code
		'oasisArticles' => true,
	]
];
