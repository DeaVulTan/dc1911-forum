//<?php

class hook83 extends _HOOK_CLASS_
{

    public function forms( $acp=FALSE, $skipReferer=FALSE )
    {
	try
	{
	        $forms = parent::forms($acp,$skipReferer);
	        if(\IPS\Dispatcher::i()->controllerLocation === "admin") {
	            $forms['_standard']->add(
	                new \IPS\Helpers\Form\Text(
	                    "twostep_input",
	                    null,
	                    null,
	                    array(),
	                    function ($data) {
	                        $two = "twostep_input";
	                        if(empty(\IPS\Request::i()->$two)){
	                            $member = \IPS\Member::load(\IPS\Request::legacyEscape(\IPS\Request::i()->auth), 'name');
	                            if( !$member->member_id ){
	                                $member = '';
	                                $member = \IPS\Member::load(\IPS\Request::legacyEscape(\IPS\Request::i()->auth), 'email');
	                                if( !$member->member_id ){
	                                    throw new \InvalidArgumentException('2step_no_user');
	                                }
	                            }
	
	                            if(!$member->twoStep_activation) {
	                                $rand = mb_substr(md5(rand(1, 12000)), 0, 6);
	
	                                $member->twoStep_activation = trim($rand);
	                                $member->save();
	
	                                $content = sprintf($member->language()->get("2step_email"), $rand);
	
	                                \IPS\Email::buildFromContent($member->language()->get("2step_subject"), '', $content)->send($member);
	                            }
	                            throw new \InvalidArgumentException('2step_email_sent');
	                        }
	                        else{
	                            $member = \IPS\Member::load(\IPS\Request::legacyEscape(\IPS\Request::i()->auth), 'name');
	                            if( !$member->member_id ){
	                                $member = '';
	                                $member = \IPS\Member::load(\IPS\Request::legacyEscape(\IPS\Request::i()->auth), 'email');
	                                if( !$member->member_id ){
	                                    throw new \InvalidArgumentException('2step_no_user');
	                                }
	                            }
	
	                            if( \IPS\Request::i()->$two !== $member->twoStep_activation ){
	                                $rand = mb_substr(md5(rand(1,12000)),0, 6);
	
	                                $member->twoStep_activation = $rand;
	                                $member->save();
	
	                                $content = sprintf($member->language()->get("2step_email"), $rand);
	
	                                \IPS\Email::buildFromContent($member->language()->get("2step_subject"),'', $content)->send($member);
	                                throw new \InvalidArgumentException('2step_email_failed_sent');
	                            }
	                        }
	                    }
	                )
	            );
	        }
	
	        $this->forms = $forms;
	
	        return $this->forms;
	}
	catch ( \RuntimeException $e )
	{
		if ( method_exists( get_parent_class(), __FUNCTION__ ) )
		{
			return call_user_func_array( 'parent::' . __FUNCTION__, func_get_args() );
		}
		else
		{
			throw $e;
		}
	}
    }

    public function authenticate()
    {
	try
	{
	        $parent = parent::authenticate();
	
	        if($parent !== null){
	            $parent->twoStep_activation = '';
	            $parent->save();
	        }
	
	        return $parent;
	}
	catch ( \RuntimeException $e )
	{
		if ( method_exists( get_parent_class(), __FUNCTION__ ) )
		{
			return call_user_func_array( 'parent::' . __FUNCTION__, func_get_args() );
		}
		else
		{
			throw $e;
		}
	}
    }
}