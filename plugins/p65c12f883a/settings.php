//<?php
/**
 * SolutionrDEVs Application
 * (SD) Auto Tagging
 *
 * @author      Dawid Baruch <dawid.baruch@solutiondevs.pl>
 * @copyright   (c) 2005 - 2015 SolutionDEVs
 * @package     SolutionDEVs Apps
 * @subpackage  PHP
 * @link        http://www.solutiondevs.pl
 * @link        http://www.ipsbeyond.pl
 * @version     1.0.2
 *
 */
 
$form->addHeader( 'settings' );
$form->add( new \IPS\Helpers\Form\YesNo( 'sd_autotag_enable', \IPS\Settings::i()->sd_autotag_enable, false, array( 'togglesOn' => array( 'sd_autotag_min_length', 'sd_autotag_forums' ) ) ) );
$form->add( new \IPS\Helpers\Form\Number( 'sd_autotag_min_length', \IPS\Settings::i()->sd_autotag_min_length, false, array( 'min' => 1), null, null, null, 'sd_autotag_min_length' ) );
$form->add( new \IPS\Helpers\Form\Node( 'sd_autotag_forums', \IPS\Settings::i()->sd_autotag_forums, FALSE, array( 'class' => 'IPS\forums\Forum', 'multiple' => TRUE, 'zeroVal' => 'all' ), null, null, null, 'sd_autotag_forums' ) );

if ( $values = $form->values() )
{
	$form->saveAsSettings();
	return TRUE;
}

return $form;