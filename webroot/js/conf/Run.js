application.run(function ($rootScope, $http) {
    $rootScope.state = 'dashboard';
    $rootScope.language = 'en';
    $rootScope.texts = [];

    $rootScope
        .user = {
        first_name: 'Lorem',
        last_name: 'Ipsum',
        avatar: 'https://placehold.it/100x100',
    };

    $rootScope.vehicle = JSON.parse(localStorage.getItem('vehicle')) || {
        type: null,
        manufacturer: null,
        generalModel: null,
        model: null,
        modification: null
    };

    $rootScope.$watch('vehicle', function (value) {

        let nullable = true;

        angular.forEach(value, function (data, key) {
            if (data !== null) {
                nullable = false;
            }
        });

        if (!nullable) {
            localStorage.setItem('vehicle', JSON.stringify(value));
        }

    });

});
