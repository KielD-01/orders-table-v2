application.service('ModelsService', function ($http) {
    let service = this;

    service.getModelsByTypeAndManufacturerAndModel = (type, manufacturer, model) => {
        return $http.get(`/api/exist/${type}/${manufacturer}/${model}`);
    };

});
