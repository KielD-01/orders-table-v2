application.config(function ($stateProvider, $interpolateProvider, $locationProvider) {

    $locationProvider
        .hashPrefix('@');

    $interpolateProvider
        .startSymbol('[[')
        .endSymbol(']]');

    angular.forEach(routes, function (ctx, route) {
        $stateProvider.state(route, ctx);
    });
});
