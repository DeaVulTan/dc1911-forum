//<?php

class hook103 extends _HOOK_CLASS_
{
  	public function save()
	{
		try
		{
			if ( !$this->member_id AND \IPS\Settings::i()->memberFeatures_su )
			{
				$this->pp_setting_count_comments = TRUE;
			}
		
			if ( !$this->member_id AND \IPS\Settings::i()->memberFeatures_visitors )
			{
				$this->members_bitoptions['pp_setting_count_visitors'] = TRUE;
			}
		
			if ( !$this->member_id AND \IPS\Settings::i()->memberFeatures_pmpopup )
			{
				$this->members_bitoptions['show_pm_popup'] = TRUE;
			}
	
	       	if ( !$this->member_id AND \IPS\Settings::i()->memberFeatures_vs )
			{
				$this->members_bitoptions['view_sigs'] = TRUE;
			}
	
			parent::save();
	}
	catch ( \RuntimeException $e )
	{
		return call_user_func_array( 'parent::' . __FUNCTION__, func_get_args() );
	}
    }
}