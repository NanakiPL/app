<?php

namespace Wikia\AbPerfTesting;

class Hooks {

	/**
	 * Initialize performance experiments when MediaWiki starts the engine
	 *
	 * @param \Title $title
	 * @param \Article $article
	 * @param \OutputPage $output
	 * @param \User $user
	 * @param \WebRequest $request
	 * @param \MediaWiki $wiki
	 * @return bool it's a hook
	 */
	static function onAfterInitialize( \Title $title, \Article $article, \OutputPage $output, \User $user, \WebRequest $request, \MediaWiki $wiki) {
		global $wgABPerfTestingExperiments;
		wfDebug( __METHOD__. " - checking experiments...\n" );

		// loop through all registered experiments and run those matching criteria
		foreach ( $wgABPerfTestingExperiments as $name => $experiment ) {
			if ( Experiment::isEnabled( $experiment ) ) {
				wfDebug( sprintf( "%s: starting '%s' experiment using %s class with %s params\n",
					__METHOD__, $name, $experiment['handler'], json_encode( $experiment['params'] ) ) );

				$reflector = new \ReflectionClass( $experiment['handler'] );
				$reflector->newInstanceArgs( $experiment['params'] ?: [] );

				// mark a transaction with an experiment name
				\Transaction::getInstance()->set( \Transaction::PARAM_AB_PERFORMANCE_TEST, $name );

				// leave now, we handle only a single experiment at a time now
				return true;
			}
		}

		return true;
	}
}
