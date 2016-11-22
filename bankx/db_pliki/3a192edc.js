var dbnextSharedModule=angular.module("dbnext-shared",["platform"]).config(["translationsLoaderProvider","pathServiceProvider",function(a,b){a.addTranslationsPath(b.generateRootPath("dbnext-shared")+"/i18n/messages_{{language}}.json")}]).run(function(){});dbnextSharedModule.directive("dbExportToFile",["pathService","ebTheming","formService","gate","userService","httpService","domService","$window","translate","$timeout",function(a,b,c,d,e,f,g,h,i,j){return{restrict:"E",replace:!0,scope:{href:"@",exportParams:"=",exportButton:"="},templateUrl:a.generateTemplatePath("dbnext-shared")+"/directives/dbExportToFile/dbExportToFile.html",link:function(a,i,k){a.linkExportToFile={},a.exportSelect={},a.exportOptions=["CSV","TXT"],b.applyTheme(i),a.exportDataToFile=function(b){angular.element(document.querySelector(":focus")).triggerHandler("blur"),b.$valid?(a.exportParams.formatType=a.exportSelect.selection.toLowerCase(),d.getHref(a.href).then(function(b){e.getIdentityDetails().then(function(c){a.linkExportToFile.link=f.appContext+b+f.serializeParams(angular.extend({customerId:c.id,accessProfileId:c.accessProfileId},a.exportParams),!0),a.linkExportToFile.target=g.isIE()?"":"_blank",h.open(a.linkExportToFile.link,a.linkExportToFile.target)})}),a.switchBool("exportClick")):(c.dirtyFields(b),a.linkExportToFile.link="#",c.scrollTo("exportFooter"))},a.exportToPdf=function(){a.exportParams.formatType="pdf",d.getHref(a.href).then(function(b){e.getIdentityDetails().then(function(c){a.linkExportToFile.link=f.appContext+b+f.serializeParams(angular.extend({customerId:c.id,accessProfileId:c.accessProfileId},a.exportParams),!0),a.linkExportToFile.target=g.isIE()?"":"_blank",h.open(a.linkExportToFile.link,a.linkExportToFile.target)})})},a.switchBool=function(b){a[b]=!a[b],l(),c.scrollTo("exportFooter")};var l=function(){a.exportSelect={},j(function(){a.ExportToFileForm.$setPristine(),a.ExportToFileForm.$setUntouched(),a.ExportToFileForm.$submitted=!1,a.ExportToFileFormMobile.$setPristine(),a.ExportToFileFormMobile.$setUntouched(),a.ExportToFileFormMobile.$submitted=!1})}}}}]),dbnextSharedModule.directive("dbLinesJoin",["pathService",function(a){return{restrict:"EA",replace:!1,transclude:!0,scope:{ebLines:"=",ebLinesOptions:"=?",ebMaxLength:"@"},templateUrl:a.generateTemplatePath("dbnext-shared")+"/directives/dbLinesJoin/dbLinesJoin.html",link:function(a,b,c){(angular.isUndefined(a.ebLinesOptions)||angular.isUndefined(a.ebLinesOptions.joint))&&(a.ebLinesOptions={joint:""}),angular.isUndefined(a.ebMaxLength)&&(a.ebMaxLength=35),a.$watch("ebLines",function(b,c){var d=b;if(null!=d&&angular.isArray(d))for(var e=d[0],f=1;f<d.length;f++){var g=d[f-1].length==a.ebMaxLength?"":a.ebLinesOptions.joint;e=e+g+d[f]}a.lines=e||d})}}}]),dbnextSharedModule.directive("dbTabs",["pathService","ebTheming","$state","$timeout",function(a,b,c,d){return{restrict:"E",replace:!0,scope:{model:"=ebModel",tabs:"=ebTabs"},templateUrl:a.generateTemplatePath("dbnext-shared")+"/directives/dbTabs/dbTabs.html",link:function(a,e,f){b.applyTheme(e),a.swipeTab=function(b){var d=a.findTabIndex("state",c.current.name);if(d>=0)switch(b){case"left":a.currentTabNo<a.tabs.length-1&&a.changeTab(a.currentTabNo+1);break;case"right":a.currentTabNo>0&&a.changeTab(a.currentTabNo-1)}},a.calculateTabsWidth=function(){a.tabsWidth=0;for(var b=0;b<a.tabElements.length;b++)a.tabsWidth+=void 0==a.tabElements[b]?0:a.tabElements[b].getBoundingClientRect().width},a.changeTab=function(b){a.currentTabNo!=b&&a.moveTabs(b),angular.isDefined(a.currentTabNo)&&angular.element(a.tabElements[a.currentTabNo]).removeClass("active"),angular.element(a.tabElements[b]).addClass("active"),a.currentTabNo=b,a.$emit("activeTabChanged",{active:a.tabs[b]}),c.go(a.tabs[b].state)},d(function(){a.tabsContainer=e.querySelectorAll("#db-tabs-inner")[0],a.tabElements=e.querySelectorAll("#db-tabs-primary"),a.calculateTabsWidth();var b=a.findTabIndex("state",c.current.name);b>=0&&a.changeTab(b)}),a.moveTabs=function(b){if(window.innerWidth<a.tabsWidth){switch(b){case 0:var c=0;break;case a.tabs.length-1:var c=Math.round(window.innerWidth-a.tabsWidth);break;default:var c=Math.round(window.innerWidth-a.tabsWidth)/2}angular.extend(a.tabsContainer.style,{"-webkit-transform":"translateX("+c+"px)","-moz-transform":"translateX("+c+"px)","-ms-transform":"translateX("+c+"px)","-o-transform":"translateX("+c+"px)",transform:"translateX("+c+"px)"})}else angular.extend(a.tabsContainer.style,{"-webkit-transform":"translateX(0px)","-moz-transform":"translateX(0px)","-ms-transform":"translateX(0px)","-o-transform":"translateX(0px)",transform:"translateX(0px)"})},a.findTabIndex=function(b,c){for(var d=0;d<a.tabs.length;d++)if(c==a.tabs[d][b])return d;return-1},a.findActiveTabIndex=function(){for(var b=0;b<a.tabs.length;b++)if(angular.element(a.tabElements[b])[0].className.indexOf("active")>-1)return b;return-1};window.innerWidth,window.innerHeight;a.$on("changeTab",function(b,c){a.swipeTab(c.direction)}),a.$on("updateTab",function(b,c){var d=a.findTabIndex("id",c.id);a.tabs[d].count=c.count,a.calculateTabsWidth()}),a.$on("$stateChangeStart",function(b,c,d,e,f){var g=a.findActiveTabIndex(),h=a.findTabIndex("state",c.name);h>-1&&g!=h&&(angular.element(a.tabElements[h]).addClass("active"),g>-1&&angular.element(a.tabElements[g]).removeClass("active"))})}}}]),angular.module("dbnext-shared").run(["$templateCache",function(a){a.put("templates/dbnext-shared/0.0.2/directives/dbExportToFile/dbExportToFile.html",'<div class="export"><div class="under-list-option second-option"><div class="export-option"><a ng-click="exportToPdf()"><span eb-themable class="eb-icon eb-icon-print export-icon options-icon"></span> <span class="option-label" eb-msg="accounts.list.options.downloadList"></span></a></div></div><!-- desktop --><div class="export-desktop"><div class="under-list-option first-option"><div class="export-option" ng-hide="exportClick" ng-click="switchBool(\'exportClick\')"><span eb-themable class="eb-icon eb-ico-details export-icon eb-dbnext-theme"></span> <span>{{\'db.shared.directive.export_to_file.label.export\'|translate}}</span></div><div class="export-body" ng-hide="!exportClick"><form name="ExportToFileForm" ng-submit="exportDataToFile(ExportToFileForm)" novalidate><div><div class="export-option export-cancel" ng-click="switchBool(\'exportClick\')"><span>{{\'db.shared.directive.export_to_file.label.cancel\'|translate}}</span></div><ui-select name="fileType" eb-themable search-enabled="false" ng-model="exportSelect.selection" theme="select2" ng-model="exportSelect.selection" ng-required="true"><ui-select-match placeholder="{{\'db.shared.directive.export_to_file.select.option.placeholder\'|translate}}"><span>{{exportSelect.selection}}</span></ui-select-match><ui-select-choices class="block-choices" repeat="exportOption in exportOptions track by $index"><div class="block-choices" value="exportOption">{{exportOption}}</div></ui-select-choices></ui-select><div eb-validation-messages class="validation-messages" eb-name="fileType"><div eb-message-key="same"><span eb-msg="db.shared.directive.export_to_file.validation.same"></span></div><div eb-message-key="required"><span eb-msg="db.shared.directive.export_to_file.validation.required"></span></div></div></div><div class="export-submit-button"><eb-button id="submit" type="submit" class="positive primary eb-button eb-dbnext-theme"><span>{{\'db.shared.directive.export_to_file.button.export\'|translate}}</span></eb-button></div></form></div></div></div><!-- mobile --><div class="export-mobile"><div class="under-list-option first-option"><div class="export-option" ng-hide="exportClick" ng-click="switchBool(\'exportClick\')"><span eb-themable class="eb-icon eb-ico-details export-icon eb-dbnext-theme"></span> <span>{{\'db.shared.directive.export_to_file.label.export\'|translate}}</span></div></div><div class="export-body" ng-hide="!exportClick"><form name="ExportToFileFormMobile" ng-submit="exportDataToFile(ExportToFileFormMobile)" novalidate><div><div class="export-option export-cancel" ng-click="switchBool(\'exportClick\')"><span>{{\'db.shared.directive.export_to_file.label.cancel\'|translate}}</span></div><ui-select name="fileType" eb-themable search-enabled="false" ng-model="exportSelect.selection" theme="select2" ng-model="exportSelect.selection" ng-required="true"><ui-select-match placeholder="{{\'db.shared.directive.export_to_file.select.option.placeholder\'|translate}}"><span>{{exportSelect.selection}}</span></ui-select-match><ui-select-choices class="block-choices" repeat="exportOption in exportOptions track by $index"><div class="block-choices" value="exportOption">{{exportOption}}</div></ui-select-choices></ui-select><div eb-validation-messages class="validation-messages" eb-name="fileType" style="padding-left: 0px !important"><div eb-message-key="same"><span eb-msg="db.shared.directive.export_to_file.validation.same"></span></div><div eb-message-key="required"><span eb-msg="db.shared.directive.export_to_file.validation.required"></span></div></div></div><div class="export-submit-button"><eb-button id="submit" type="submit" class="positive primary eb-button eb-dbnext-theme"><span>{{\'db.shared.directive.export_to_file.button.export\'|translate}}</span></eb-button></div></form></div></div><div id="exportFooter"></div></div>'),a.put("templates/dbnext-shared/0.0.2/directives/dbLinesJoin/dbLinesJoin.html",'<div><div ng-if="lines.length > 0">{{lines}}</div><div ng-if="lines.length == 0">—</div></div>'),a.put("templates/dbnext-shared/0.0.2/directives/dbTabs/dbTabs.html",'<div class="db-tabs"><div class="db-tabs-group"><div class="db-tabs-inner" id="db-tabs-inner"><div ng-repeat="tab in tabs" id="db-tabs-primary" ng-model="model" ng-click="changeTab($index)" btn-radio="tab.id"><span eb-msg="{{tab.label}}"></span><div class="unseen-amount-box" ng-show="tab.count > 0">{{tab.count}}</div></div></div></div></div>')}]);