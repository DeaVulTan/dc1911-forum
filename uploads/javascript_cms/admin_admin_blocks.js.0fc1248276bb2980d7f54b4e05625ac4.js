;(function($,_,undefined){"use strict";ips.controller.register('cms.admin.blocks.form',{initialize:function(){this.on('change','#elSelect_block_template_use_how',this.toggle);this.on('click','[data-role=viewTemplate]',this.viewTemplate);if(this.scope.find('input[name=block_type]:hidden').val()=='plugin')
{this.on('click','a[id$=form_tab__content]',this.refreshPreview);this.on('click','span[data-role=refreshPreview]',this.refreshPreview);}
$('#elCodemirror_block_content-input').attr('loaded','false');},refreshPreview:function(){if(!$('#elPages_block_preview_form').length)
{$('<form />').attr('method','post').attr('id','elPages_block_preview_form').attr('target','elpages_block_preview').addClass('ipsHide').appendTo($('body'));}
var iframe=$('#elpages_block_preview');var form=$('#elPages_block_preview_form');form.find('input[type=hidden]').remove();var newSrc=iframe.attr('data-base-url');if(!iframe.hasClass('ipsLoading')){iframe.addClass('ipsLoading');}
var fields='';$.each(this.scope.find('form').serializeArray(),function(i,item)
{if(item.name=='block_content')
{item.value=$('#elCodemirror_block_content-input').data('CodeMirrorInstance').getValue();}
$('<input type="hidden" />').attr("name",item.name).attr("value",item.value).appendTo(form);fields+=item.name+",";Debug.log("Adding "+item.name+" = "+item.value);});form.attr('action',newSrc+'&__nocache='+Math.random().toString(36).substr(2,9)+"&_sending="+fields);Debug.log(form);form.submit();iframe.load(function()
{iframe.removeClass('ipsLoading');iframe.removeClass('loading');iframe.contents().find("a").each(function(index)
{$(this).on("click",function(event)
{event.preventDefault();event.stopPropagation();});});});},viewTemplate:function(e){var span=$(e.currentTarget);var dialogRef=ips.ui.dialog.create({title:this.scope.find('input[name=block_plugin]').val(),url:'?app=cms&module=pages&controller=ajax&do=loadTemplate&show=modal&t_location=block&block_app='+this.scope.find('input[name=block_plugin_app]').val()+'&block_key='+this.scope.find('input[name=block_plugin]').val()+'&t_key='+this.scope.find('#elSelect_block_template_id').val(),forceReload:true,remoteSubmit:true});dialogRef.show();},toggle:function(e){var thisToggle=$(e.currentTarget);if(thisToggle.val()==='copy'&&$('#elCodemirror_block_content-input').attr('loaded')=='false')
{var save={'t_location':'block','t_key':this.scope.find('#elSelect_block_template_id').val(),'block_key':this.scope.find('input[name=block_plugin]').val(),'block_app':this.scope.find('input[name=block_plugin_app]').val()};var self=this;ips.getAjax()('?app=cms&module=pages&controller=ajax&do=loadTemplate&show=json&noencode=1',{dataType:'json',data:save,type:'post'}).done(function(response){$('#elCodemirror_block_content-input').data('CodeMirrorInstance').setValue(response.template_content);$('input[name=template_params]').val(response.template_params);$('#elCodemirror_block_content-input').attr('loaded','true');});}}});}(jQuery,_));;