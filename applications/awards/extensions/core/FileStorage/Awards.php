<?php
/**
 * @package        iAwards
 * @author        <a href='http://www.invisionizer.com'>Invisionizer</a>
 * @copyright    (c) 2015 Invisionizer
 */

namespace IPS\awards\extensions\core\FileStorage;

/* To prevent PHP errors (extending class does not exist) revealing path */
if ( !defined( '\IPS\SUITE_UNIQUE_KEY' ) )
{
    header( ( isset( $_SERVER['SERVER_PROTOCOL'] ) ? $_SERVER['SERVER_PROTOCOL'] : 'HTTP/1.0' ) . ' 403 Forbidden' );
    exit;
}

class _Awards
{
    /**
     * @return mixed
     */
    public function count()
    {
        return \IPS\Db::i()->select( 'COUNT(*)', 'awards_awarded' )->first();
    }

    /**
     * @param $offset
     * @param $storageConfiguration
     * @param null $oldConfiguration
     */
    public function move( $offset, $storageConfiguration, $oldConfiguration = NULL )
    {
        $awards = \IPS\Db::i()->select( '*', 'awards_awarded', array(), 'award_id', array( $offset, 1 ) )->first();

        try
        {
            $file = \IPS\File::get( $oldConfiguration ?: 'awards_Awards', $awards['award_icon'] )->move( $storageConfiguration );

            if ( (string) $file != $awards['award_icon'] )
            {
                \IPS\Db::i()->update( 'awards_awards', array( 'image' => (string) $file ), array( 'award_id=?', $awards['award_id'] ) );
            }

            unset( \IPS\Data\Store::i()->awards );
        } catch ( \Exception $e )
        {
            /* Any issues are logged */
        }
    }

    /**
     * @param $offset
     */
    public function fixUrls( $offset )
    {
        $awards = \IPS\Db::i()->select( '*', 'awards_awarded', array(), 'award_id', array( $offset, 1 ) )->first();

        if ( $new = \IPS\File::repairUrl( $awards['award_icon'] ) )
        {
            \IPS\Db::i()->update( 'awards_awarded', array( 'award_icon' => $new ), array( 'award_id=?', $awards['award_id'] ) );

            unset( \IPS\Data\Store::i()->awards );
        }
    }

    /**
     * @param $file
     * @return bool
     */
    public function isValidFile( $file )
    {
        try
        {
            $awards = \IPS\Db::i()->select( '*', 'awards_awarded', array( 'award_icon = ?', (string) $file ) )->first();

            return TRUE;
        } catch ( \UnderflowException $e )
        {
            return FALSE;
        }
    }

    /**
     * @return bool
     */
    public function delete()
    {

    }
}