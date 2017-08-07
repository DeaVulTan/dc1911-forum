//<?php

class hook79 extends _HOOK_CLASS_
{

/* !Hook Data - DO NOT REMOVE */
public static function hookData() {
 return array_merge_recursive( array (
  'review' => 
  array (
    0 => 
    array (
      'selector' => 'div[data-controller=\'core.front.core.comment\'].ipsComment_content.ipsType_medium[itemprop=\'review\'][itemtype=\'http://schema.org/Review\'] > div.ipsComment_header.ipsPhotoPanel.ipsPhotoPanel_small.ipsPhotoPanel_notPhone > div > strong.ipsType_medium',
      'type' => 'add_after',
      'content' => '{template="reviewVotersLink" group="plugins" location="global" app="core" params="$review->id, $review->mapped(\'item\')"}',
    ),
  ),
), parent::hookData() );
}
/* End Hook Data */

}