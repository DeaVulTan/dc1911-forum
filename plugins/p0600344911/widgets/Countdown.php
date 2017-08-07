<?php
/**
 * @brief		Countdown Widget
 * @author		<a href='http://www.invisionpower.com'>Invision Power Services, Inc.</a>
 * @copyright	(c) 2001 - SVN_YYYY Invision Power Services, Inc.
 * @license		http://www.invisionpower.com/legal/standards/
 * @package		IPS Social Suite
 * @subpackage	simplecountdown
 * @since		20 Oct 2015
 * @version		SVN_VERSION_NUMBER
 */

namespace IPS\plugins\p0600344911\widgets;

/* To prevent PHP errors (extending class does not exist) revealing path */
if ( !defined( '\IPS\SUITE_UNIQUE_KEY' ) )
{
	header( ( isset( $_SERVER['SERVER_PROTOCOL'] ) ? $_SERVER['SERVER_PROTOCOL'] : 'HTTP/1.0' ) . ' 403 Forbidden' );
	exit;
}

/**
 * Countdown Widget
 */
class _Countdown extends \IPS\Widget
{
	/**
	 * @brief	Widget Key
	 */
	public $key = 'Countdown';

	/**
	 * @brief	App
	 */
	public $app = '';

	/**
	 * @brief	Plugin
	 */
	public $plugin = '17';

	/**
	 * Initialise this widget
	 *
	 * @return void
	 */
	public function init()
	{
		$this->template( array( \IPS\Theme::i()->getTemplate( 'plugins', 'core', 'global' ), $this->key ) );
		parent::init();
	}

	/**
	 * Specify widget configuration
	 *
	 * @param	null|\IPS\Helpers\Form	$form	Form object
	 * @return	null|\IPS\Helpers\Form
	 */
	public function configuration( &$form=null )
	{
 		if ( $form === null )
		{
	 		$form = new \IPS\Helpers\Form;
 		}

		// Title.
		if ( !isset( $this->configuration['title_countdown'] ) )
		{
			$this->configuration['title_countdown'] = NULL;
		}

		$form->add( new \IPS\Helpers\Form\Text( 'title_countdown', $this->configuration['title_countdown'], TRUE ) );

		// Date And Time.
		if ( !isset( $this->configuration['datetime_countdown'] ) )
		{
			$this->configuration['datetime_countdown'] = new \IPS\DateTime( 'now', new \DateTimeZone( \IPS\Member::loggedIn()->timezone ) );
		}

		$form->add( new \IPS\Helpers\Form\Date( 'datetime_countdown', $this->configuration['datetime_countdown'], TRUE, array( 'time' => TRUE ) ) );

		// Finished Message.
		if ( !isset( $this->configuration['finish_countdown_message'] ) )
		{
			$this->configuration['finish_countdown_message'] = \IPS\Member::loggedIn()->language()->addToStack( 'finished_countdown' );
		}

		$form->add( new \IPS\Helpers\Form\Text( 'finish_countdown_message', $this->configuration['finish_countdown_message'], TRUE) );

		// Overide Timezone.
		if ( !isset( $this->configuration['timezone_countdown_override'] ) )
		{
			$this->configuration['timezone_countdown_override'] = 0;
		}

		$form->add( new \IPS\Helpers\Form\YesNo( 'timezone_countdown_override', $this->configuration['timezone_countdown_override'], FALSE, array( 'togglesOn' => array( 'timezone_container' ) ) ) );

		if ( !isset( $this->configuration['timezone'] ) )
		{
			$this->configuration['timezone'] = \IPS\Member::loggedIn()->timezone;
		}

		// Format a list of timezones from the language strings.
		$timezones = array();
		foreach ( \DateTimeZone::listIdentifiers() as $tz )
		{
			if ( $pos = mb_strpos( $tz, '/' ) )
			{
				$timezones[ 'timezone__' . mb_substr( $tz, 0, $pos ) ][ $tz ] = 'timezone__' . $tz;
			}
			else
			{
				$timezones[ $tz ] = 'timezone__' . $tz;
			}
		}

		$form->add( new \IPS\Helpers\Form\Select( 'timezone', array( $this->configuration['timezone'] ), TRUE, array( 'options' => $timezones, 'sort' => TRUE ), NULL, NULL, NULL, 'timezone_container' ) );

		// Display all units.
		if ( !isset( $this->configuration['display_countdown_small_units'] ) )
		{
			$this->configuration['display_countdown_small_units'] = 0;
		}

		$form->add( new \IPS\Helpers\Form\YesNo( 'display_countdown_small_units', $this->configuration['display_countdown_small_units'] ) );

		// 
		if ( !isset( $this->configuration['color_countdown_units_bg'] ) )
		{
			$this->configuration['color_countdown_units_bg'] = "#F5F5F5";
		}

		$form->add( new \IPS\Helpers\Form\Color( 'color_countdown_units_bg', $this->configuration['color_countdown_units_bg'] ) );

		//
		if ( !isset( $this->configuration['color_countdown_units_txt'] ) )
		{
			$this->configuration['color_countdown_units_txt'] = "#000000";
		}

		$form->add( new \IPS\Helpers\Form\Color( 'color_countdown_units_txt', $this->configuration['color_countdown_units_txt'] ) );

        return $form;
 	}

 	 /**
 	 * Ran before saving widget configuration
 	 *
 	 * @param	array	$values	Values from form
 	 * @return	array
 	 */
 	public function preConfig( $values )
 	{
		// We want to make sure we set the correct timezone.
		if( $values['timezone_countdown_override'] == 0 )
		{
			$values['timezone'] = \IPS\Member::loggedIn()->timezone;
		}

 		return $values;
 	}

	/**
	 * Render a widget
	 *
	 * @return	string
	 */
	public function render()
	{
		// safty check so it did not bork their install just incase they do not fill out the configuration before closing the manage blocks.
		if( isset( $this->configuration['title_countdown'] ) AND isset( $this->configuration['finish_countdown_message'] ) AND isset( $this->configuration['datetime_countdown'] ) AND isset( $this->configuration['timezone_countdown_override'] ) AND isset( $this->configuration['timezone'] ) AND  isset( $this->configuration['display_countdown_small_units'] ) AND isset( $this->configuration['color_countdown_units_bg'] ) AND isset( $this->configuration['color_countdown_units_txt'] ) )
		{
			// A little hack as 0 in a yesNo field means no when we want it to have a meaning.
			if( $this->configuration['display_countdown_small_units'] == 0 )
			{
				$this->configuration['display_countdown_small_units'] = 3;
			}
			else
			{
				$this->configuration['display_countdown_small_units'] = 0;
			}

			$datetimeTo  = new \IPS\DateTime( $this->configuration['datetime_countdown']['date'], new \DateTimeZone( $this->configuration['timezone'] ) );
			$time        = $this->formatCounter($datetimeTo, $this->configuration['display_countdown_small_units']);

			return $this->output( $this->configuration['title_countdown'], $time, $this->configuration['timezone'], $this->configuration['finish_countdown_message'], $this->configuration['color_countdown_units_bg'], $this->configuration['color_countdown_units_txt'] );
		}
		else
		{
			return '';
		}
	}

	/**
	 * formatCounter
	 *
	 * @param	\IPS\DateTime	$dateTimeTo		A DateTime object of the time to countdown to.
	 * @param	int				$restrictParts	The maximum number of "pieces" to return.  Restricts "1 year, 1 month, 1 day, 1 hour, 1 minute, 1 second" to just "1 year, 1 month".  Pass 0 to not reduce.
	 * @return	array
	 */
	protected function formatCounter( \IPS\DateTime $dateTimeTo, $restrictParts=3 )
	{

		$datetimeNow = new \IPS\DateTime('now', new \DateTimeZone(\IPS\Member::loggedIn()->timezone));
		$interval    = $dateTimeTo->diff($datetimeNow);

		// We are done here good bye
		if ( $dateTimeTo < $datetimeNow )
		{
			return FALSE;
		}

		/* Figure out what pieces we have.  Note that we are letting the language manager perform the formatting to implement better pluralization. */
		$format	= array();

		if( $interval->y !== 0 )
		{
			$format[] = array( 'number' => $interval->y,
		                       'lang' => \IPS\Member::loggedIn()->language()->addToStack( 'countdown_years', FALSE, array( 'pluralize' => array( $interval->y ) ) ) );
		}

		if( $interval->m !== 0 )
		{
			$format[] = array( 'number' => $interval->m,
		                       'lang' => \IPS\Member::loggedIn()->language()->addToStack( 'countdown_months', FALSE, array( 'pluralize' => array( $interval->m ) ) ) );
		}

		if( $interval->d !== 0 )
		{
			$format[] = array( 'number' => $interval->d,
		                       'lang' => \IPS\Member::loggedIn()->language()->addToStack( 'countdown_days', FALSE, array( 'pluralize' => array( $interval->d ) ) ) );
		}

		if( $interval->h !== 0 )
		{
			$format[] = array( 'number' => $interval->h,
		                       'lang' => \IPS\Member::loggedIn()->language()->addToStack( 'countdown_hours', FALSE, array( 'pluralize' => array( $interval->h ) ) ) );
		}

		if( $interval->i !== 0 )
		{
			$format[] = array( 'number' => $interval->i,
		                       'lang' => \IPS\Member::loggedIn()->language()->addToStack( 'countdown_minutes', FALSE, array( 'pluralize' => array( $interval->i ) ) ) );
		}

		if( $interval->s !== 0 )
		{
			$format[] = array( 'number' => $interval->s,
		                       'lang' => \IPS\Member::loggedIn()->language()->addToStack( 'countdown_seconds', FALSE, array( 'pluralize' => array( $interval->s ) ) ) );
		}

		/* If we are still here, reduce the number of items in the $format array as appropriate */
		if( $restrictParts > 0 )
		{
			$useOnly	= array();
			$haveUsed	= 0;

			foreach( $format as $period )
			{
				$useOnly[]	= $period;
				$haveUsed++;

				if( $haveUsed >= $restrictParts )
				{
					break;
				}
			}

			$format	= $useOnly;
		}

		return $format;
	}
}
