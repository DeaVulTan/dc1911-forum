<?php
/**
 * @package      iAwards
 * @author       <a href='http://www.invisionizer.com'>Invisionizer</a>
 * @copyright    (c) 2015 Invisionizer
 */

namespace IPS\awards;

class _Cats extends \IPS\Node\Model implements \IPS\Node\Permissions
{
    /**
     * @var
     */
    protected static $multitons;

    /**
     * @var null
     */
    protected static $defaultValues = NULL;

    /**
     * @var string
     */
    public static $databaseTable = 'awards_cats';

    /**
     * @var string
     */
    public static $databasePrefix = 'cat_';

    /**
     * @var string
     */
    public static $databaseColumnOrder = 'position';

    /**
     * @var string
     */
    public static $databaseColumnParent = 'parent';

    /**
     * @var string
     */
    public static $nodeTitle = 'iAwards';

    /**
     * @var string
     */
    public static $subnodeClass = 'IPS\awards\Awards';

    /**
     * @return mixed
     */
    protected function get__title()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    protected function get__enabled()
    {
        return $this->enabled;
    }

    /**
     * @param $enabled
     */
    protected function set__enabled( $enabled )
    {
        $this->enabled = $enabled;
    }

    /**
     * @var string
     */
    public static $permApp = 'awards';

    /**
     * @var string
     */
    public static $permType = 'cats';

    /**
     * @var array
     */
    public static $permissionMap = array(
        'view' => 'view',
        'add'  => 3
    );

    /**
     * @var string
     */
    public static $permissionLangPrefix = 'cat_perm_';

    /**
     * @param $form
     */
    public function form( &$form )
    {
        $form->addTab( 'cat_tab_main' );
        $form->addHeader( 'cat_header_main' );
        $form->add( new \IPS\Helpers\Form\YesNo( 'cat_enabled', ( $this->enabled ) ? $this->enabled : 1, FALSE, array() ) );
        $form->add( new \IPS\Helpers\Form\Text( 'cat_title', ( $this->title ) ? $this->title : NULL, TRUE, array() ) );


    }

    /**
     * @param $values
     */
    public function saveForm( $values )
    {
        if ( !$this->id )
        {
            $this->save();
        }

        foreach ( array() as $fieldKey => $langKey )
        {
            \IPS\Lang::saveCustom( '', $langKey, $values[$fieldKey] );
            unset( $values[$fieldKey] );
        }

        foreach ( array() as $k )
        {
            $this->bitoptions[$k] = $values[$k];
            unset( $values[$k] );
        }


        parent::saveForm( $values );
    }

    /**
     * @return mixed
     */
    public function url()
    {
        if ( $this->_url === NULL )
        {
            $this->_url = \IPS\Http\Url::internal( "app=awards&module=awards&controller=awards&id={$this->a_id}", 'front', 'awards_cat', $this->name_seo );
        }

        return $this->_url;
    }

    /**
     * Clone
     */
    public function __clone()
    {
        if ( $this->skipCloneDuplication === TRUE )
        {
            return;
        }

        $primaryKey        = static::$databaseColumnId;
        $this->$primaryKey = NULL;

        $this->_new = TRUE;
        $this->save();
    }

    /**
     * @param $column
     * @param $query
     * @param null $order
     * @param array $where
     * @return mixed
     */
    public static function search( $column, $query, $order = NULL, $where = array() )
    {
        if ( $column === '_title' )
        {
            $column = 'cat_title';
        }

        if ( $order == '_title' )
        {
            $order = 'cat_title';
        }

        return parent::search( $column, $query, $order, $where );
    }
}