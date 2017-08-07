ips.templates.set('templates.editor.newTab',"  <li data-fileid='{{fileid}}'>  <a href='#' class='ipsTabs_item' id='{{id}}'>{{title}} <span data-action='closeTab'><i class='fa fa-times'></i></span></a> </li>");ips.templates.set('templates.editor.tabPanel',"  <div data-fileid='{{fileid}}' id='ipsTabs_elTemplateEditor_tabbar_tab_{{fileid}}_panel' class='ipsTabs_panel' style='display: none' data-app='{{app}}' data-location='{{location}}' data-group='{{group}}' data-name='{{name}}' data-type='{{type}}' data-itemID='{{id}}' data-inherited-value='{{inherited}}'>  {{{content}}} </div>");ips.templates.set('templates.editor.tabContent',"  <input data-role='variables' type='hidden' name='variables_{{fileid}}' value=\"{{{variables}}}\"> <textarea data-fileid='{{fileid}}' id='editor_{{fileid}}'>{{{content}}}</textarea>");ips.templates.set('templates.editor.unsaved',"  <i class='fa fa-circle'></i>");ips.templates.set('templates.editor.saved',"  <i class='fa fa-times'></i>");ips.templates.set('templates.editor.diffHeaders',"  <div class='cTemplateMergeHeaders ipsAreaBackground_light'>  <div class='cTemplateMergeHeader'>   <div class='ipsPad_half'><strong>{{#lang}}theme_diff_original_header{{/lang}}</strong> <span class='ipsType_small ipsType_light'>{{#lang}}theme_diff_original_desc{{/lang}}</span></div>  </div>  <div class='cTemplateMergeHeader ipsPos_right'>   <div class='ipsPad_half'><strong>{{#lang}}theme_diff_custom_header{{/lang}}</strong> <span class='ipsType_small ipsType_light'>{{#lang}}theme_diff_custom_desc{{/lang}}</span></div>  </div> </div>");;
;(function($,_,undefined){"use strict";ips.controller.register('core.admin.templates.addForm',{initialize:function(){this.on('submit','form.ipsForm',this.submitForm);this.on(document,'fileListRefreshed.templates',this.closeDialog);},submitForm:function(e){e.preventDefault();var self=this;if(!$(e.currentTarget).attr('data-bypassValidation')){return;}
ips.getAjax()($(e.currentTarget).attr('action'),{dataType:'json',data:$(e.currentTarget).serialize(),type:'post'}).done(function(response){self.trigger('addedFile.templates',{type:self.scope.attr('data-type'),fileID:response.id,name:response.name});});},closeDialog:function(e,data){this.trigger('closeDialog');}});}(jQuery,_));;
;(function($,_,undefined){"use strict";ips.controller.register('core.admin.templates.conflict',{initialize:function(){this.on('click','.ipsButton',this.makeSelection);this.setup();},setup:function(){$('span[data-conflict-name] input[type=radio]').hide();},makeSelection:function(e){var span=$(e.target).closest('span');var radio=$(span).find('input[type=radio]');var name=$(span).attr('data-conflict-name');var id=$(radio).attr('name').replace(/conflict_/,'');if($(span).hasClass('ipsButton_disabled'))
{return false;}
else if($(span).hasClass('ipsButton_alternate'))
{$(radio).removeAttr('checked');$(span).removeClass('ipsButton_alternate').addClass('ipsButton_primary').find('strong').html(ips.getString('sc_use_this_version'));$('input[type=radio][name=conflict_'+id+']').closest('span.ipsButton[data-conflict-name='+(name=='new'?'old':'new')+']').removeClass('ipsButton_disabled');$('th span[data-conflict-id='+id+'][data-conflict-name='+name+']').removeClass('ipsPos_left ipsBadge ipsBadge_positive');ips.utils.anim.go('blindDown',this.scope.find('div[data-conflict-id='+id+']'));}
else
{$(radio).attr('checked','checked');$(span).removeClass('ipsButton_primary').addClass('ipsButton_alternate').find('strong').html(ips.getString('sc_remove_selection'));$('input[type=radio][name=conflict_'+id+']').closest('span.ipsButton[data-conflict-name='+(name=='new'?'old':'new')+']').addClass('ipsButton_disabled');$('th span[data-conflict-id='+id+'][data-conflict-name='+name+']').addClass('ipsPos_left ipsBadge ipsBadge_positive');this.scope.find('div[data-conflict-id='+id+']').slideUp();}}});}(jQuery,_));;
;(function($,_,undefined){"use strict";ips.controller.register('core.admin.templates.fileEditor',{_tabBar:null,_tabContent:null,_fileStore:{},_ajaxURL:'',_cmInstances:{},_currentHeight:0,_editorPreferences:{wrap:true,lines:false},initialize:function(){this.on(document,'openFile.templates',this.openFile);this.on(document,'variablesUpdated.templates',this.updateVariables);this.on('tabChanged',this.changedTab);this.on('click','[data-action="closeTab"]',this.closeTab);this.on('click','[data-action="save"]',this.save);this.on('click','[data-action="revert"]',this.revert);this.on('savedFile.templates',this.updateFile);this.on('revertedFile.templates',this.updateFile);this.on('openDialog',this.openedDialog);this.on('menuItemSelected',this.menuSelected);this.setup();},setup:function(){var self=this;this._tabBar=this.scope.find('#elTemplateEditor_tabbar');this._tabContent=this.scope.find('#elTemplateEditor_panels');this._currentHeight=this._tabBar.outerHeight();this._ajaxURL=this.scope.closest('[data-ajaxURL]').attr('data-ajaxURL');this._normalURL=this.scope.closest('[data-normalURL]').attr('data-normalURL');this._editorPreferences['wrap']=ips.utils.db.get('templateEditor','wrap');this._editorPreferences['lines']=ips.utils.db.get('templateEditor','lines');if(this._editorPreferences['wrap']){$('#elTemplateEditor_preferences_menu').find('[data-ipsMenuValue="wrap"]').addClass('ipsMenu_itemChecked');}
if(this._editorPreferences['lines']){$('#elTemplateEditor_preferences_menu').find('[data-ipsMenuValue="lines"]').addClass('ipsMenu_itemChecked');}
this._tabContent.find('[data-type]').each(function(i,item){var original=self._tabContent.find('[data-fileid="'+$(item).attr('data-fileid')+'"] input[data-role="variables"]');if(original.length){original.after($('<input/>').attr('type','hidden').attr('name',original.attr('name')).attr('value',original.attr('value')).attr('data-role','variables'))
original.remove();}
ips.loader.get(['core/interface/codemirror/diff_match_patch.js','core/interface/codemirror/codemirror.js']).then(function(){self._initCodeMirror($(item).attr('data-fileid'),$(item).attr('data-type'));});});},menuSelected:function(e,data){if(data.originalEvent){data.originalEvent.preventDefault();}
if(data.triggerID=='elTemplateEditor_preferences'){if(data.selectedItemID=='diff'){this.toggleDiff();}
else if(data.selectedItemID=='wrap'){this._changeEditorPreference(!ips.utils.db.get('templateEditor','wrap'),'wrap','lineWrapping');}else{this._changeEditorPreference(!ips.utils.db.get('templateEditor','lines'),'lines','lineNumbers');}}},_changeEditorPreference:function(toValue,type,cmName){if(toValue){$('#elTemplateEditor_preferences_menu').find('[data-ipsMenuValue="'+type+'"]').addClass('ipsMenu_itemChecked');}else{$('#elTemplateEditor_preferences_menu').find('[data-ipsMenuValue="'+type+'"]').removeClass('ipsMenu_itemChecked');}
this._editorPreferences[type]=toValue;ips.utils.db.set('templateEditor',type,toValue);for(var i in this._cmInstances){if(this._cmInstances[i]instanceof CodeMirror.MergeView){this._cmInstances[i].edit.setOption(cmName,toValue);this._cmInstances[i].left.orig.setOption(cmName,toValue);}else{this._cmInstances[i].setOption(cmName,toValue);}}},openedDialog:function(e,data){if(data.elemID=='elTemplateEditor_variables'||data.elemID=='elTemplateEditor_attributes'){this._insertVariablesIntoDialog(data);}},_insertVariablesIntoDialog:function(data){var active=this._getActiveTab();if(!active.tabPanel){return;}
var value=$.trim(active.tabPanel.find('[data-role="variables"]').val());data.dialog.find('[data-role="variables"]').val(value).end().find('[name="_variables_fileid"]').val(active.tabPanel.attr('data-fileid')).end().find('[name="_variables_type"]').val(active.tabPanel.attr('data-type'));},updateVariables:function(e,data){this._tabContent.find('[data-type="'+data.type+'"][data-fileid="'+data.fileID+'"]').find('[data-role="variables"]').val(data.value);},toggleDiff:function(){var self=this;var active=this._getActiveTab();var panel=active.tabPanel;var key=panel.attr('data-fileid');if(self._cmInstances[key]instanceof CodeMirror.MergeView){self.scope.find('#editor_'+key).val(this._cmInstances[key].edit.doc.getValue());panel.find('.CodeMirror-merge,.cTemplateMergeHeaders').remove();self._initCodeMirror(key,panel.attr('data-type'));}
else{self._cmInstances[key].save();panel.find('.CodeMirror').remove();panel.addClass('ipsLoading');ips.getAjax()(this._normalURL+'&do=diffTemplate',{dataType:'json',data:this._getParametersFromPanel(panel)}).done(function(response){self._cmInstances[key]=CodeMirror.MergeView(document.getElementById(panel.attr('id')),{value:self.scope.find('#editor_'+key).val(),origLeft:response,lineWrapping:self._editorPreferences['wrap'],lineNumbers:self._editorPreferences['lines'],mode:(panel.attr('data-type')=='templates'?'htmlmixed':'css'),});panel.removeClass('ipsLoading');var headers=$(ips.templates.render('templates.editor.diffHeaders'));panel.prepend(headers);var height=self._getTabContentHeight()-headers.outerHeight();self._cmInstances[key].edit.setSize(null,height);self._cmInstances[key].left.orig.setSize(null,height);$(self._cmInstances[key].left.gap).css('height',height);self._cmInstances[key].edit.on('change',function(doc,cm){self._setChanged(true,key);});});}},save:function(e){e.preventDefault();var self=this;var active=this._getActiveTab();var panel=active.tabPanel;var key=panel.attr('data-fileid');if(!active.tab||!active.tabPanel){Debug.warn('No active tab or tab panel');return;}
var save=this._getParametersFromPanel(panel);if(this._cmInstances[key]instanceof CodeMirror.MergeView){self.scope.find('#editor_'+key).val(this._cmInstances[key].edit.doc.getValue());}else{this._cmInstances[key].save();}
save['editor_'+key]=this.scope.find('#editor_'+key).val();if(panel.attr('data-type')=='templates'){save['variables_'+save.t_key]=panel.find('[data-role="variables"]').val();}
this.trigger('savingFile.templates');ips.getAjax()(this._normalURL+'&do=saveTemplate',{dataType:'json',data:save,type:'post'}).done(function(response){self.trigger('savedFile.templates',{key:key,oldID:parseInt(panel.attr('data-itemID')),newID:parseInt(response.item_id),status:'changed'});self._setChanged(false,key);self._updateToolbar(active.tab);}).fail(function(){ips.ui.alert.show({type:'alert',message:ips.getString('saveThemeError'),icon:'warn'});}).always(function(){self.trigger('saveFileFinished.templates');});},revert:function(e,bypass){e.preventDefault();if($(e.currentTarget).hasClass('ipsButton_disabled'))
{return false;}
var self=this;var active=this._getActiveTab();var panel=active.tabPanel;var key=panel.attr('data-fileid');var message=($(e.currentTarget).attr('data-actionType')=='revert')?ips.getString('skin_revert_confirm'):ips.getString('skin_delete_confirm');if(bypass!==true){ips.ui.alert.show({type:'confirm',message:message,icon:'warn',callbacks:{ok:function(){self.revert(e,true);}}});return;}
var save=this._getParametersFromPanel(panel);ips.getAjax()(this._normalURL+'&do=deleteTemplate&wasConfirmed=1',{dataType:'json',data:save,type:'post'}).done(function(response){if(_.isUndefined(response.type)){self._deletedFile(key,active);}else{if(response.template_id||response.css_id){self._revertedFile(response,key,active);}else{self._deletedFile(key,active);}}});},_revertedFile:function(response,key,active){this.trigger('revertedFile.templates',{key:key,oldID:parseInt(active.tabPanel.attr('data-itemID')),newID:parseInt(response.template_id||response.css_id),status:response.InheritedValue});$('#editor_'+key).val(response.template_content||response.css_content);if(this._cmInstances[key]instanceof CodeMirror.MergeView){this._cmInstances[key].edit.setValue(response.template_content||response.css_content);}else{this._cmInstances[key].setValue(response.template_content||response.css_content);}
this._setChanged(false,key);this._updateToolbar(active.tab);},_deletedFile:function(key,active){this.trigger('deletedFile.templates',{key:key,fileID:active.tabPanel.attr('data-itemID'),type:active.tabPanel.attr('data-type')});active.tab.find('[data-action="closeTab"]').click();},_getParametersFromPanel:function(panel){return{t_type:panel.attr('data-type'),t_item_id:panel.attr('data-itemID'),t_app:panel.attr('data-app'),t_location:panel.attr('data-location'),t_group:panel.attr('data-group'),t_name:panel.attr('data-name'),t_key:panel.attr('data-fileid')};},updateFile:function(e,data){this.scope.find('[data-itemID="'+data.oldID+'"]').attr('data-itemID',data.newID).attr('data-inherited-value',data.status);},closeTab:function(e){var tab=$(e.currentTarget).closest('.ipsTabs_item');this._doCloseTab(tab);},_doCloseTab:function(tab,bypass){var self=this;var tabParent=tab.closest('[data-fileid]');var key=tabParent.attr('data-fileid');var allTabs=this._tabBar.find('.ipsTabs_item').closest('[data-fileid]');var newTab=null;if(tabParent.attr('data-state')=='unsaved'&&bypass!=true){ips.ui.alert.show({type:'confirm',message:ips.getString('themeUnsavedContent'),icon:'warn',callbacks:{ok:function(){self._doCloseTab(tab,true);}}});return;}
var active=tab.hasClass('ipsTabs_activeItem');this.trigger('closedTab.templates',{fileID:key});delete(this._cmInstances[key]);if(active&&allTabs.length>1){if(allTabs.first().attr('data-fileid')==tabParent.attr('data-fileid')){newTab=tabParent.next();}else{newTab=tabParent.prev();}}
if(newTab){newTab.find('> a').click();}
ips.utils.anim.go('fadeOutDown fast',tabParent).done(function(){tabParent.remove();self._recalculatePanelWrapper();});this._tabContent.find('[data-fileid="'+key+'"]').remove();},changedTab:function(e,data){var tab=data.tab;if(!_.isUndefined(tab.closest('[data-fileid]').attr('data-fileid'))){this.trigger('fileSelected.templates',{fileID:tab.closest('[data-fileid]').attr('data-fileid')});}
this._updateToolbar(tab);},_updateToolbar:function(tab){var tabParent=tab.closest('[data-fileid]').attr('data-fileid');var tabPanel=this._tabContent.find('[data-fileid="'+tabParent+'"]');var status=tabPanel.attr('data-inherited-value');var type=tabPanel.attr('data-type');var revert=this.scope.find('[data-action="revert"]');var key=tabPanel.attr('data-fileid');switch(status){case'original':case'inherit':revert.addClass('ipsButton_disabled')
break;case'custom':revert.html(ips.getString('skin_delete')).removeClass('ipsButton_disabled').attr('data-actionType','delete').show();break;case'changed':revert.html(ips.getString('skin_revert')).removeClass('ipsButton_disabled').attr('data-actionType','revert').show();break;}
if(type=='templates'){$('#elTemplateEditor_variables').show();$('#elTemplateEditor_attributes').hide();}else{$('#elTemplateEditor_variables').hide();$('#elTemplateEditor_attributes').show();}
if(this._cmInstances[key]instanceof CodeMirror.MergeView){$('[data-ipsmenuvalue="diff"]').addClass('ipsMenu_itemChecked');}else{$('[data-ipsmenuvalue="diff"]').removeClass('ipsMenu_itemChecked');}},openFile:function(e,data){if(!this._tabBar.find('[data-fileid="'+data.meta.key+'"]').length){this._buildTab(data.meta);}else{this._tabBar.find('[data-fileid="'+data.meta.key+'"] > a').click();}},_buildTab:function(meta){var self=this;this._tabBar.append(ips.templates.render('templates.editor.newTab',{title:meta.title,fileid:meta.key,id:'tab_'+meta.key}));this._tabContent.append(ips.templates.render('templates.editor.tabPanel',{fileid:meta.key,name:meta.name,type:meta.type,app:meta.app,location:meta.location,group:meta.group,id:meta.id,inherited:meta.inherited}));this._recalculatePanelWrapper();this._tabBar.find('[data-fileid="'+meta.key+'"] > a').click();this._tabContent.addClass('ipsLoading ipsTabs_loadingContent');ips.getAjax()(this._ajaxURL+'&do=loadTemplate',{dataType:'json',data:{'t_app':meta.app,'t_location':meta.location,'t_group':meta.group,'t_name':meta.name,'t_key':meta.key,'t_type':meta.type}}).done(function(response){self._postProcessNewTab(response,meta);}).always(function(){self._tabContent.removeClass('ipsLoading ipsTabs_loadingContent');});},_postProcessNewTab:function(response,meta){var content=ips.templates.render('templates.editor.tabContent',{fileid:meta.key,content:response.template_content||response.css_content,variables:response.template_data||response.css_attributes});this._tabContent.find('[data-fileid="'+meta.key+'"]').html(content);this._initCodeMirror(meta.key,meta.type);},_initCodeMirror:function(key,type){var self=this;this._cmInstances[key]=CodeMirror.fromTextArea(document.getElementById('editor_'+key),{mode:(type=='templates'?'htmlmixed':'css'),lineWrapping:this._editorPreferences['wrap'],lineNumbers:this._editorPreferences['lines']});this._cmInstances[key].setSize(null,this._getTabContentHeight());this._cmInstances[key].on('change',function(doc,cm){self._setChanged(true,key);});},_setChanged:function(state,key){if(state==true){this._tabBar.find('[data-fileid="'+key+'"]').attr('data-state','unsaved').find('[data-action="closeTab"]').html(ips.templates.render('templates.editor.unsaved'));}else{this._tabBar.find('[data-fileid="'+key+'"]').attr('data-state','saved').find('[data-action="closeTab"]').html(ips.templates.render('templates.editor.saved'));}},_recalculatePanelWrapper:function(){var tabHeight=this._tabBar.outerHeight();if(tabHeight==this._currentHeight){return;}
this._tabContent.css({top:tabHeight+'px'});var contentHeight=this._getTabContentHeight();this._tabContent.find('.CodeMirror').css({height:contentHeight+'px'});this._currentHeight=tabHeight;},_getActiveTab:function(){var toReturn={tab:null,tabPanel:null};var tab=this._tabBar.find('.ipsTabs_item.ipsTabs_activeItem').first().parent();if(!tab.length){return toReturn;}
toReturn={tab:tab,tabPanel:this._tabContent.find('[data-fileid="'+tab.attr('data-fileid')+'"]')};return toReturn;},_getTabContentHeight:function(){return this._tabContent.outerHeight();}});}(jQuery,_));;
;(function($,_,undefined){"use strict";ips.controller.register('core.admin.templates.fileList',{_tabBar:null,_tabContent:null,initialize:function(){this.on('click','[data-action="openFile"]',this.openFile);this.on('click','[data-action="toggleBranch"]',this.toggleBranch);this.on(document,'fileSelected.templates',this.selectFile);this.on(document,'savedFile.templates revertedFile.templates',this.updateItemID);this.on(document,'savedFile.templates revertedFile.templates',this.fileChangedStatus);this.on(document,'addedFile.templates',this.refreshFileList);this.on(document,'deletedFile.templates',this.refreshFileList);this.setup();},setup:function(){this._tabBar=this.scope.find('#elTemplateEditor_typeTabs');this._tabContent=this.scope.find('#elTemplateEditor_fileList');},refreshFileList:function(e,data){var self=this;var type=data.type;var panel=this._tabContent.find('.cTemplateList[data-type="'+type+'"]');var activeItem=panel.find('.cTemplateList_activeNode > a').attr('data-key');if(!panel.length){this._tabBar.find('[data-type="'+type+'"]').click();}else{var open=this._getOpenNodes(panel);var url=this._tabBar.find('[data-type="'+type+'"]').attr('data-tabURL');ips.getAjax()(url).done(function(response){panel.html(response);self._openNodes(open,panel,activeItem);if(data.fileID){panel.find('[data-itemid="'+data.fileID+'"]').click();}
self.trigger('fileListRefreshed.templates');});}},_openNodes:function(toOpen,panel,activeItem){var selector=[];if(toOpen.apps.length){for(var i=0;i<toOpen.apps.length;i++){selector.push('[data-app="'+toOpen.apps[i]+'"]');}}
if(toOpen.locations.length){for(var i=0;i<toOpen.locations.length;i++){selector.push('[data-app="'+toOpen.locations[i][0]+'"] [data-location="'+toOpen.locations[i][1]+'"]');}}
if(toOpen.groups.length){for(var i=0;i<toOpen.groups.length;i++){var str='[data-app="'+toOpen.groups[i][0]+'"] ';str+='[data-location="'+toOpen.groups[i][1]+'"] ';str+='[data-group="'+toOpen.groups[i][2]+'"]';selector.push(str);}}
panel.find('.cTemplateList_activeBranch').removeClass('cTemplateList_activeBranch').addClass('cTemplateList_inactiveBranch').end().find(selector.join(',')).removeClass('cTemplateList_inactiveBranch').addClass('cTemplateList_activeBranch');if(activeItem){panel.find('[data-key="'+activeItem+'"]').click();}},_getOpenNodes:function(panel){var apps=[];var locations=[];var groups=[];panel.find('.cTemplateList_activeBranch').each(function(i,item){var el=$(item);if(el.attr('data-app')){apps.push(el.attr('data-app'));}
if(el.attr('data-location')){locations.push([el.closest('[data-app]').attr('data-app'),el.attr('data-location')]);}
if(el.attr('data-group')){groups.push([el.closest('[data-app]').attr('data-app'),el.closest('[data-location]').attr('data-location'),el.attr('data-group')]);}});return{apps:apps,locations:locations,groups:groups};},selectFile:function(e,data){if(data.fileID){this._makeActive(data.fileID);}},openFile:function(e){e.preventDefault();var elem=$(e.currentTarget);var meta={name:elem.attr('data-name'),key:elem.attr('data-key'),title:elem.text(),group:elem.closest('[data-group]').attr('data-group'),location:elem.closest('[data-location]').attr('data-location'),app:elem.closest('[data-app]').attr('data-app'),type:elem.closest('[data-type]').attr('data-type'),id:elem.closest('[data-itemID]').attr('data-itemID'),inherited:elem.closest('[data-inherited-value]').attr('data-inherited-value')};Debug.log(meta);this.trigger('openFile.templates',{meta:meta});},toggleBranch:function(e){e.preventDefault();var branchTrigger=$(e.currentTarget);var branchItem=branchTrigger.parent();if(branchItem.hasClass('cTemplateList_inactiveBranch')){ips.utils.anim.go('fadeInDown',branchItem.find(' > ul'));branchItem.removeClass('cTemplateList_inactiveBranch').addClass('cTemplateList_activeBranch');}else{branchItem.find(' > ul').hide();branchItem.removeClass('cTemplateList_activeBranch').addClass('cTemplateList_inactiveBranch');}},updateItemID:function(e,data){if(data.oldID!=data.newID){this.scope.find('[data-itemID="'+data.oldID+'"]').attr('data-itemID',data.newID);}},fileChangedStatus:function(e,data){this.scope.find('[data-key="'+data.key+'"]').attr('data-inherited-value',data.status);},_makeActive:function(fileID){var file=this.scope.find('[data-key="'+fileID+'"]');var fileType=file.closest('[data-type]').attr('data-type');var currentType=this._currentType();this.scope.find('[data-key]').parent().removeClass('cTemplateList_activeNode');file.parent().addClass('cTemplateList_activeNode');file.parents('li[data-group], li[data-location], li[data-app]').each(function(idx,parent){if($(parent).hasClass('cTemplateList_inactiveBranch')){$(parent).removeClass('cTemplateList_inactiveBranch').addClass('cTemplateList_activeBranch').find('> ul').show();}});if(fileType=='templates'&&currentType!='templates'){this._tabBar.find('[data-type="templates"]').click();}else if(fileType=='css'&&currentType!='css'){this._tabBar.find('[data-type="css"]').click();}},_currentType:function(){if(this._tabBar.find('[data-type="templates"]').hasClass('ipsTabs_activeItem')){return'templates';}
return'css';}});}(jQuery,_));;
;(function($,_,undefined){"use strict";ips.controller.register('core.admin.templates.main',{_timer:null,_textField:null,_lastValue:'',_ajax:null,initialize:function(){this.on('savingFile.templates',this.showLoading);this.on('saveFileFinished.templates',this.hideLoading);this._textField=$(this.scope).find('[data-role="templateSearch"]');this.on(document,'focus','[data-role="templateSearch"]',this.fieldFocus);this.on(document,'blur','[data-role="templateSearch"]',this.fieldBlur);this.on('menuItemSelected',this.menuSelected);this.on(document,'tabChanged',this._swapTab);},showLoading:function(e){ips.utils.anim.go('fadeIn',this.scope.find('[data-role="loading"]'));},hideLoading:function(e){ips.utils.anim.go('fadeOut',this.scope.find('[data-role="loading"]'));},fieldFocus:function(e){this._timer=setInterval(_.bind(this._timerFocus,this),700);},fieldBlur:function(e){clearInterval(this._timer);},_timerFocus:function(){var currentValue=this._textField.val();if(currentValue==this._lastValue){return;}
this._lastValue=currentValue;this._loadResults();},_swapTab:function(e,data){if(data.barID=='elTemplateEditor_typeTabs'){this._loadResults();}},menuSelected:function(e,data){if(data.originalEvent){data.originalEvent.preventDefault();}
this._loadResults();},_loadResults:function(){if(this._ajax){this._ajax.abort();}
if(this._lastValue){this._textField.addClass('ipsField_loading');}
$('#elTemplateEditor_fileList').find('li').addClass('ipsHide');var filters=[];$('#elTemplateFilterMenu_menu .ipsMenu_itemChecked').each(function(){filters.push($(this).attr('data-ipsMenuValue'));});var self=this;this._ajax=ips.getAjax()($(this.scope).attr('data-ajaxURL')+'&do=search'+$('#elTemplateEditor_typeTabs').find('.ipsTabs_activeItem').attr('data-type')+'&term='+encodeURIComponent(this._lastValue)+'&filters='+filters.join(',')).done(function(response){var i;for(i in response){$('#elTemplateEditor_fileList').find('[data-app="'+i+'"]').removeClass('ipsHide');var j;for(j in response[i])
{$('#elTemplateEditor_fileList').find('[data-app="'+i+'"] [data-location="'+j+'"]').removeClass('ipsHide');var k;for(k in response[i][j])
{$('#elTemplateEditor_fileList').find('[data-app="'+i+'"] [data-location="'+j+'"] [data-group="'+k+'"]').removeClass('ipsHide');var l;for(l in response[i][j][k])
{if(k=='.'){$('#elTemplateEditor_fileList').find('[data-app="'+i+'"] [data-location="'+j+'"] [data-name="'+response[i][j][k][l]+'"]').parent().removeClass('ipsHide');}else{$('#elTemplateEditor_fileList').find('[data-app="'+i+'"] [data-location="'+j+'"] [data-group="'+k+'"] [data-name="'+response[i][j][k][l]+'"]').parent().removeClass('ipsHide');}}}}}
self._textField.removeClass('ipsField_loading');});}});}(jQuery,_));;
;(function($,_,undefined){"use strict";ips.controller.register('core.admin.templates.variablesDialog',{initialize:function(){this.on('click','input[type="submit"]',this.submitChange);},submitChange:function(e){this.trigger('variablesUpdated.templates',{fileID:this.scope.find('[name="_variables_fileid"]').val(),type:this.scope.find('[name="_variables_type"]').val(),value:this.scope.find('[data-role="variables"]').val()});this.trigger('closeDialog');}});}(jQuery,_));;