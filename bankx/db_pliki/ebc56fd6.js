angular.module("dbnext-config",["platform"]).config(["ebThemingProvider","layoutServiceProvider","translationsLoaderProvider","pathServiceProvider",function(a,b,c,d){var e="dbnext",f="config",g=e+"-"+f;c.addTranslationsPath(d.generateRootPath(g)+"/i18n/messages_{{language}}.json"),a.setDefaultTheme("dbnext"),b.setLayout("dbnext-layout")}]).run(["$rootScope","customerService",function(a,b){b.getUserData().then(function(b){a.$broadcast("externalDataReady",b)})}]);