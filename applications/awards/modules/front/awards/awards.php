<?php
/**
 * @package      iAwards
 * @author       <a href='http://www.invisionizer.com'>Invisionizer</a>
 * @copyright    (c) 2015 Invisionizer
 */

namespace IPS\awards\modules\front\awards;

/* To prevent PHP errors (extending class does not exist) revealing path */
if ( !defined( '\IPS\SUITE_UNIQUE_KEY' ) )
{
    header( ( isset( $_SERVER['SERVER_PROTOCOL'] ) ? $_SERVER['SERVER_PROTOCOL'] : 'HTTP/1.0' ) . ' 403 Forbidden' );
    exit;
}

/**
 * Class _awards
 * @package IPS\awards\modules\front\awards
 */
class _awards extends \IPS\Dispatcher\Controller
{
    public function execute()
    {
        parent::execute();
    }

    protected function manage()
    {
        \IPS\Output::i()->title = \IPS\Member::loggedIn()->language()->addToStack( '__app_awards' );

        if ( !\IPS\Application::appIsEnabled( 'awards' ) )
        {
            return FALSE;
        }

        if ( !\IPS\Member::loggedIn()->canAccessModule( \IPS\Application\Module::get( 'awards', 'awards' ) ) )
        {
            return FALSE;
        }

        if ( count( \IPS\awards\Cats::roots() ) )
        {
            \IPS\Output::i()->output = \IPS\Theme::i()->getTemplate( 'awards' )->index();
        }
        else
        {
            \IPS\Output::i()->output = \IPS\Theme::i()->getTemplate( 'awards' )->nothing();
        }
    }

    protected function award()
    {
        $where = array( array( 'awarded_id =' . \IPS\Request::i()->id ) );

        $award = \IPS\awards\Awarded::constructFromData( \IPS\Db::i()->select( '*', 'awards_awarded', $where )->first() );

        \IPS\Output::i()->output = \IPS\Theme::i()->getTemplate( 'awards' )->award( $award );
    }

    protected function awarded()
    {
        $table = new \IPS\Helpers\Table\Db( 'awards_awarded', \IPS\Http\Url::internal( 'app=awards&module=awards&controller=awards&do=awarded&id=' . \IPS\Request::i()->id ), array( array( 'awarded_award=?', \IPS\Request::i()->id ) ) );

        $table->joins = array(
            array( 'select' => 'm.*', 'from' => array( 'core_members', 'm' ), 'where' => "m.member_id=awards_awarded.awarded_member" )
        );

        $table->sortBy        = 'awarded_date';
        $table->sortDirection = 'desc';

        $table->tableTemplate = array( \IPS\Theme::i()->getTemplate( 'awarded' ), 'table' );
        $table->rowsTemplate  = array( \IPS\Theme::i()->getTemplate( 'awarded' ), 'rows' );
        $table->limit         = 15;

        \IPS\Output::i()->output = \IPS\Theme::i()->getTemplate( 'awarded' )->awarded( (string) $table );
    }

    protected function edit()
    {
        try
        {
            $awarded = \IPS\awards\Awarded::load( \IPS\Request::i()->id );
        } catch ( \Exception $e ){}

        $form = new \IPS\Helpers\Form;
        $form->class .= 'ipsForm_vertical';

        $form->add( new \IPS\Helpers\Form\Editor( 'awarded_reason', $awarded->reason ? $awarded->reason : NULL, FALSE, array( 'app' => 'awards', 'key' => 'Awards', 'autoSaveKey' => 'awards-new-reason', 'attachIds' => ( $this->id === NULL ? NULL : array( $this->id ) ) ), NULL, NULL, NULL, 'reason_show' ) );

        if ( $values = $form->values() )
        {
            $awarded->reason = $values['awarded_reason'];
            $awarded->save();

            \IPS\Output::i()->redirect( isset( $_SERVER['HTTP_REFERER'] ) ? $_SERVER['HTTP_REFERER'] : \IPS\Http\Url::internal( '' ) );
        }

        \IPS\Output::i()->output = \IPS\Theme::i()->getTemplate( 'forms' )->edit( $form );

    }

    protected function remove()
    {
        try
        {
            $remove = \IPS\awards\Awarded::load( \IPS\Request::i()->id );
        } catch ( \Exception $e ){}

        $form = new \IPS\Helpers\Form;
        $form->class .= 'ipsForm_vertical';

        $form->add( new \IPS\Helpers\Form\TextArea( 'award_removed_reason', NULL, TRUE, array() ) );

        if ( $values = $form->values() )
        {
            $remove->remove( $values['award_removed_reason'], \IPS\Member::loggedIn() );

            \IPS\Output::i()->redirect( isset( $_SERVER['HTTP_REFERER'] ) ? $_SERVER['HTTP_REFERER'] : \IPS\Http\Url::internal( '' ), 'hola' );
        }
        \IPS\Output::i()->output = \IPS\Theme::i()->getTemplate( 'forms' )->edit( $form );

    }
}
