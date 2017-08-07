//<?php

class hook110 extends _HOOK_CLASS_
{

/* !Hook Data - DO NOT REMOVE */
public static function hookData() {
 return array_merge_recursive( array (
  'footer' => 
  array (
    0 => 
    array (
      'selector' => '#elFooterLinks',
      'type' => 'add_before',
      'content' => '<script type="text/javascript">     
        $.elevator();      
</script>
<div id="top" class="elevator"></div>
<div id="bottom" class="elevator"></div>',
    ),
  ),
), parent::hookData() );
}
/* End Hook Data */






}