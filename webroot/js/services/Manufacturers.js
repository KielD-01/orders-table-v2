application.service('ManufacturersService', function ($http) {
    let service = this;

    service.getManufacturersByType = (type) => {
        return $http.get(`/api/exist/${type}`);
    };

});
