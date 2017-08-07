<?php
/**
 * @package		Videos
 * @author		<a href='http://www.devfuse.com'>DevFuse</a>
 * @copyright	(c) 2015 DevFuse
 */
 
namespace IPS\videos;

/* To prevent PHP errors (extending class does not exist) revealing path */
if ( !defined( '\IPS\SUITE_UNIQUE_KEY' ) )
{
	header( ( isset( $_SERVER['SERVER_PROTOCOL'] ) ? $_SERVER['SERVER_PROTOCOL'] : 'HTTP/1.0' ) . ' 403 Forbidden' );
	exit;
}

/**
 * Media Site Node
 */
class _MediaSite extends \IPS\Node\Model
{
	protected static $multitons;    
    public static $databasePrefix = 'site_';
    public static $databaseColumnId = 'id';
	public static $databaseTable = 'videos_sites';
	public static $nodeTitle = 'module__sites';
	public static $titleLangPrefix = 'videos_mediasite_';
	public static $modalForms = TRUE; 
   
	/**
	 * Set the title
	 *
	 * @param	string	$title	Title
	 * @return	void
	 */
	public function set_title( $title )
	{
		$this->_data['site_name'] = $title;
	}

	public function get__title()
	{
		if ( !$this->id )
		{
			return '';
		}	   
       
        return $this->name;
	}   
    
	/**
	 * [Node] Get whether or not this node is enabled
	 *
	 * @note	Return value NULL indicates the node cannot be enabled/disabled
	 * @return	bool|null
	 */
	protected function get__enabled()
	{
		return $this->enabled;
	}

	/**
	 * [Node] Set whether or not this node is enabled
	 *
	 * @param	bool|int	$enabled	Whether to set it enabled or disabled
	 * @return	void
	 */
	protected function set__enabled( $enabled )
	{
		$this->enabled	= $enabled;
	}    
            	
	/**
	 * [Node] Add/Edit Form
	 *
	 * @param	\IPS\Helpers\Form	$form	The form
	 * @return	void
	 */
	public function form( &$form )
	{		   
        /* Display form */       
		$form->addHeader( 'vmedia_site_settings' );
		$form->add( new \IPS\Helpers\Form\YesNo( 'vmedia_enabled', $this->enabled ? (bool) $this->enabled : TRUE, FALSE, array() ) );
		$form->add( new \IPS\Helpers\Form\Text( 'vmedia_name', ( $this->name ) ? $this->name : '', TRUE, array() ) );
		$form->add( new \IPS\Helpers\Form\Text( 'vmedia_host', ( $this->host ) ? $this->host : '', TRUE, array() ) );
		$form->add( new \IPS\Helpers\Form\Url( 'vmedia_url', ( $this->url ) ? $this->url : '', TRUE, array() ) );
		$form->add( new \IPS\Helpers\Form\Url( 'vmedia_oembed', ( $this->oembed ) ? $this->oembed : '', FALSE, array() ) );
 	}
    
	/**
	 * [Node] Format form values from add/edit form for save
	 *
	 * @param	array	$values	Values from the form
	 * @return	array
	 */
	public function formatFormValues( $values )
	{ 
 		foreach( $values as $k => $v )
		{
			if( mb_substr( $k, 0, 7 ) === 'vmedia_' )
			{
				unset( $values[ $k ] );
				$values[ mb_substr( $k, 7 ) ] = $v;
			}
		}	   
       
        $values['url']    = ( isset( $values['url'] ) AND $values['url'] ) ? (string) $values['url'] : NULL;
        $values['oembed'] = ( isset( $values['oembed'] ) AND $values['oembed'] ) ? (string) $values['oembed'] : NULL;	   
        
		/* Send to parent */
		return $values;
	}


	/**
	 * @brief	Cached URL
	 */
	protected $_url	= NULL;

	/**
	 * Get URL
	 *
	 * @return	\IPS\Http\Url
	 */
	public function url()
	{
		return NULL;
	}  
    
	/**
	 * Delete Record
	 *
	 * @return	void
	 */
	public function delete()
	{
		parent::delete();
	}
    
	/**
	 * Search
	 *
	 * @param	string		$column	Column to search
	 * @param	string		$query	Search query
	 * @param	string|null	$order	Column to order by
	 * @param	mixed		$where	Where clause
	 * @return	array
	 */
	public static function search( $column, $query, $order=NULL, $where=array() )
	{
		if ( $column === '_title' )
		{
			$column	= 'site_name';
		}

		if( $order == '_title' )
		{
			$order	= 'site_name';
		}

		return parent::search( $column, $query, $order, $where );
	}      
}