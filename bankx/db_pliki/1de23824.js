var isTransactionalPartBoot=!0,cbpApp=angular.module("cbpApp",[].concat(function(){var a=[],b=document.getElementsByTagName("script"),c={bootapp:!0,cbp:!0},d=function(a){var b=/(web-components\/|webcomponents\/)(cbp-)?(.*?)(-web-component|-wc)?\/(.*?)\//i;return b.exec(a)};if(b&&b.length>0)for(var e in b)if("string"==typeof b[e].src){var f=ebProfiles.obtainModuleDataFromSrc?ebProfiles.obtainModuleDataFromSrc(b[e].src):d(b[e].src),g=3,h=5;if(f&&"object"==typeof f&&f.length&&f[g]&&f[h]){var i=f[g],j=f[h];c[i]||(a.push(i),webComponentRegistry[i]={name:i,simpleName:i,version:j},c[i]=!0,i.indexOf("authentication")!=-1&&(isTransactionalPartBoot=!1))}}return isTransactionalPartBoot&&ebPlatformApp.config(ebPlatformAppConfig).run(ebPlatformAppRun),a}())).config(["$compileProvider","$httpProvider","$animateProvider","tmhDynamicLocaleProvider","pathServiceProvider","httpServiceProvider",function(a,b,c,d,e,f){a.debugInfoEnabled(!1),b.useApplyAsync(!0),c.classNameFilter(/animate-on/),d.localeLocationPattern(f.appContext+e.generateRootPath()+"/l10n/angular-locale_{{locale}}-pl-formatters.js")}]).run(["$rootScope","translate","events","tmhDynamicLocale","language",function(a,b,c,d,e){a.touchDevice=!1,Modernizr.touch&&(a.touchDevice=!0),a.nativeInputDate=!1,Modernizr.inputtypes.date&&Modernizr.touch&&(a.nativeInputDate=!0),b.requestTranslations(),a.applicationReady=!1;var f=function(){a.applicationReady=!0};c.listener(a,"eb.language.translationsLoadSuccess",f),c.listener(a,"eb.language.translationsLoadError",f),d.set(e.get())}]);