application.service('PartCategoriesService', function ($http) {
    let service = this;

    service.getPartCategories = (type, model, modification) => {
        return $http.get(`/api/parts/exist/${type}/${model}/${modification}`);
    }

});
