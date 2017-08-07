;(function($,_,undefined){"use strict";ips.controller.register('cms.admin.pages.embed',{initialize:function(){this.on('change','input[type="checkbox"]',this.toggleInherit);this.on('mouseenter','textarea',this.mouseEnterTextarea);},mouseEnterTextarea:function(e){$(e.currentTarget).select();},toggleInherit:function(e){var toggle=this.scope.find('input[type="checkbox"]');var textbox=this.scope.find('[data-role="blockCode"]');if(toggle.is(':checked')){textbox.val(textbox.val().replace("></div>"," data-inheritStyle='true'></div>"));}else{textbox.val(textbox.val().replace(" data-inheritStyle='true'></div>","></div>"));}}});}(jQuery,_));;
;(function($,_,undefined){"use strict";ips.controller.register('cms.admin.pages.form',{initialize:function(){this.on('change','#check_page_ipb_wrapper',this.toggleIPSWrapper);this.on('change','#elSelect_page_wrapper_template',this.toggleTemplate);this.on('click','[data-role=viewTemplate]',this.viewTemplate);if(this.scope.find('#elSelect_page_wrapper_template').val()=='_none_')
{this.scope.find('[data-role=viewTemplate]').hide();}
if($('#check_page_ipb_wrapper').prop('checked'))
{$('.ipsCmsIncludesMessage').hide();}
else
{$('.ipsCmsIncludesMessage').show();}},viewTemplate:function(e){var span=$(e.currentTarget);var template=this.scope.find('#elSelect_page_wrapper_template').val().split('__');var dialogRef=ips.ui.dialog.create({title:this.scope.find('#elSelect_page_wrapper_template option:selected').text(),url:'?app=cms&module=pages&controller=ajax&do=loadTemplate&show=modal&t_location=page&t_key='+template[2],forceReload:true,remoteSubmit:true});dialogRef.show();},toggleTemplate:function(e){var thisToggle=$(e.currentTarget);if(thisToggle.val()=='_none_')
{this.scope.find('[data-role=viewTemplate]').hide();}
else
{this.scope.find('[data-role=viewTemplate]').show();}},toggleIPSWrapper:function(e){var thisToggle=$(e.currentTarget);if(thisToggle.prop('checked'))
{$('.ipsCmsIncludesMessage').hide();}
else
{$('.ipsCmsIncludesMessage').show();}}});}(jQuery,_));;