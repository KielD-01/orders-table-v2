application.controller('AppController', function ($rootScope, $scope, $http) {

    $http
        .get(`/api/translations/${$rootScope.language}`)
        .then(response => {
            $rootScope.texts = response.data.texts
        });

});
