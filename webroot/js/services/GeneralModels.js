application.service('GeneralModelsService', function ($http) {
    let service = this;

    service.getGeneralModelsByTypeAndManufacturer = (type, manufacturer) => {
        return $http.get(`/api/exist/${type}/${manufacturer}`);
    };

});
