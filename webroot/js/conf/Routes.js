const routes = {
    "login": {
        url: '/auth',
        views: {
            'content': {
                templateUrl: '/js/templates/Auth/login.html',
                controller: 'LoginController',
            }
        },
        data: {
            authorized: false
        }
    },
    "dashboard": {
        url: '/',
        views: {
            'content': {
                templateUrl: '/js/templates/Dashboard/index.html',
                controller: 'DashboardController',
            }
        },
        data: {
            authorized: true
        }
    },
    "request": {
        abstract: true,
        url: '/request'
    },
    "request.create": {
        url: '/create',
        views: {
            'content': {
                templateUrl: '/js/templates/Request/create.html',
                controller: 'RequestController'
            }
        },
        data: {
            authorized: true
        }
    },
    "cars_manufacturers": {
        url: '/vehicles/manufacturers',
        views: {
            'content': {
                templateUrl: '/js/templates/Vehicles/cars.html',
                controller: 'VehiclesController'
            }
        }
    },
    "car_general_models": {
        url: '/vehicle/:manufacturer',
        views: {
            'content': {
                templateUrl: '/js/templates/Vehicles/general-models.html',
                controller: 'VehiclesController'
            }
        }
    },
    "car_models": {
        url: '/vehicle/models/:general_model',
        views: {
            'content': {
                templateUrl: '/js/templates/Vehicles/models.html',
                controller: 'VehiclesController'
            }
        }
    },
    "model_modifications": {
        url: '/model/:model/modifications',
        views: {
            'content': {
                templateUrl: '/js/templates/Vehicles/models/modifications.html',
                controller: 'VehiclesController'
            }
        }
    },
    "parts_categories": {
        url: '/parts/:modification',
        views: {
            'content': {
                templateUrl: '/js/templates/Vehicles/parts/categories.html',
                controller: 'VehiclesController'
            }
        }
    },
};
