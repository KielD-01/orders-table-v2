application
    .directive('sessionUser', function () {

        return {
            restrict: 'E',
            scope: {user: '=user'},
            compile: (el, attr) => {
                return ($scope, el, attr) => {

                    console.log($scope.user);
                    let user = $scope.user;

                    el.html(`<div class="user-panel">
                <div class="pull-left image">
                    <img src="${user.avatar}" class="img-circle"/>
                </div>
                <div class="pull-left info">
                    <p>${user.first_name} ${user.last_name}</p>
                </div>
            </div>`)
                }
            }
        };

    });
