application.controller('VehiclesController', function ($rootScope, $scope, $stateParams, $state, VehicleTypesService, ManufacturersService, GeneralModelsService, ModelsService, ModificationsService, PartCategoriesService) {

    $scope.initialized = false;

    $scope.types = [];
    $scope.models = [];
    $scope.toogled = [];
    $scope.modification = {};
    $scope.manufacturers = [];
    $scope.generalModels = [];
    $scope.partCategories = [];
    $scope.categories = [];

    $scope.hoveredModel = 0;
    $scope.selectedType = null;
    $scope.hoveredManufacturer = 0;
    $scope.hoveredGeneralModel = 0;
    $scope.hoveredModification = 0;

    $scope.getVehicleTypes = function () {
        VehicleTypesService.getVehicleTypes()
            .then(function (success) {
                $scope.types = success.data.vehicleTypes;
            });
    };

    /**
     *
     * @param type
     */
    $scope.getManufacturersByType = function (type) {

        if (!$scope.initialized) {
            $scope.initialized = true;
        }

        $scope.selectedType = type;

        ManufacturersService.getManufacturersByType(type)
            .then(function (success) {
                $scope.manufacturers = success.data.data;
                $rootScope.vehicle = {
                    type: type,
                    manufacturer: null,
                    generalModel: null,
                    model: null,
                    modification: null
                };
            });
    };

    /**
     *
     * @param manufacturer
     */
    $scope.getGeneralModelsByManufacturer = function (manufacturer) {

        GeneralModelsService.getGeneralModelsByTypeAndManufacturer($rootScope.vehicle.type, manufacturer)
            .then(function (success) {

                $scope.generalModels = success.data.data.models;

                $rootScope.vehicle = {
                    type: $rootScope.vehicle.type,
                    manufacturer: manufacturer,
                    generalModel: null,
                    model: null,
                    modification: null
                };
            });
    };

    $scope.getModels = function (generalModel) {
        ModelsService.getModelsByTypeAndManufacturerAndModel($rootScope.vehicle.type, $rootScope.vehicle.manufacturer, generalModel)
            .then(function (success) {

                $scope.models = success.data.data.models;

                $rootScope.vehicle = {
                    type: $rootScope.vehicle.type,
                    manufacturer: $rootScope.vehicle.type,
                    generalModel: generalModel,
                    model: null,
                    modification: null
                };
            });
    };

    $scope.getModifications = function (model) {
        ModificationsService.getModificationsByTypeAndModel($rootScope.vehicle.type, model)
            .then(function (success) {
                $scope.modification = success.data.data;

                $rootScope.vehicle = {
                    type: $rootScope.vehicle.type,
                    manufacturer: $rootScope.vehicle.type,
                    generalModel: $rootScope.vehicle.generalModel,
                    model: model,
                    modification: null
                };
            });
    };

    $scope.getPartCategories = function (modification) {
        PartCategoriesService.getPartCategories($rootScope.vehicle.type, $rootScope.vehicle.model, modification)
            .then(function (success) {

                $scope.partCategories = success.data.data;
                $scope.categories = [];

                $rootScope.vehicle = {
                    type: $rootScope.vehicle.type,
                    manufacturer: $rootScope.vehicle.type,
                    generalModel: $rootScope.vehicle.generalModel,
                    model: $rootScope.vehicle.model,
                    modification: modification
                };

                $scope.parseCategories($scope.partCategories.tree);
            });
    };

    $scope.parseCategories = function (tree) {

        console.log(tree);

        angular.forEach(tree.children, function (data) {
            if (Array.isArray(data.children) && data.children.length > 0) {
                console.log(`We are in ${data.description}`);
                $scope.parseCategories(data);
            } else {
                if ($scope.categories.indexOf(data.description) === -1) {
                    $scope.categories.push(data.description);
                }
            }
        });
    };

    /**
     *
     * @param id
     */
    $scope.setHoveredManufacturer = function (id) {
        $scope.hoveredManufacturer = id;
    };

    $scope.unsetHoveredManufacturer = function () {
        $scope.hoveredManufacturer = 0;
    };

    /**
     *
     * @param id
     */
    $scope.setHoveredGeneralModel = function (id) {
        $scope.hoveredGeneralModel = id;
    };

    $scope.unsetHoveredGeneralModel = function () {
        $scope.hoveredGeneralModel = 0;
    };

    /**
     *
     * @param id
     */
    $scope.setHoveredModel = function (id) {
        $scope.hoveredModel = id;
    };

    $scope.unsetHoveredModel = function () {
        $scope.hoveredModel = 0;
    };

    /**
     *
     * @param id
     */
    $scope.setHoveredModification = function (id) {
        $scope.hoveredModification = id;
    };

    $scope.unsetHoveredModification = function () {
        $scope.hoveredModification = 0;
    };

    switch ($state.current.name) {
        case 'cars_manufacturers':
            $scope.getVehicleTypes();
            break;
        case 'car_general_models':
            $scope.getGeneralModelsByManufacturer($stateParams.manufacturer);
            break;
        case 'car_models':
            $scope.getModels($stateParams.general_model);
            break;
        case 'model_modifications':
            $scope.getModifications($stateParams.model);
            break;
        case 'parts_categories':
            $scope.getPartCategories($stateParams.modification);
            break;
    }

});
