application.service('VehicleTypesService', function ($http) {
    let service = this;

    service.getVehicleTypes = () => {
        return $http.get(`/api/vehicle/types`);
    }

});
