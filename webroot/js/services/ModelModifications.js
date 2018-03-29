application.service('ModificationsService', function ($http) {
    let service = this;

    service.getModificationsByTypeAndModel = (type, model) => {
        return $http.get(`/api/mods/exist/${type}/${model}`);
    };

});
