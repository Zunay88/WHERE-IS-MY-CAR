var app = angular.module('App', []);

app.controller('IncidenceController', ['$scope', '$http', function ($scope, $http) {

    // List of incidence
    $scope.incidents = [];

    // Incidence Object
    $scope.incidence = {};

    // Incidence Details
    $scope.incidence_details = {};
$
    // Errors Array
    $scope.errors = [];

    // Search Array
    $scope.search_incidents = {};

    // read records
    $scope.listIncidents = function () {
        $http.get('script/list.php', {})
            .then(function success(e) {
                $scope.incidents = e.data.incidents;
            }, function error(e) {

            });
    };
    $scope.listIncidents();

    // search records
  $scope.searchIncidents = function () {
      $http.get('script/search.php', {})
          .then(function success(e) {
              $scope.search_incidents = e.data.search_incidents;

              var modal_element = angular.element('#search_new_incidence_modal');
              modal_element.modal('hide');

          }, function error(e) {

          });
  };
  $scope.searchIncidents();

    // Add new incidence
    $scope.addIncidence = function () {
        $http.post('script/create.php', {
            incidence: $scope.incidence
        })
            .then(function success(e) {

                $scope.errors = [];

                $scope.incidents.push(e.data.incidence);

                var modal_element = angular.element('#add_new_incidence_modal');
                modal_element.modal('hide');

            }, function error(e) {
                $scope.errors = e.data.errors;
            });
    };

    // open edit incidence details popup
    $scope.edit = function (index) {
        $scope.incidence_details = $scope.incidents[index];
        var modal_element = angular.element('#modal_update_incidence');
        modal_element.modal('show');
    };

    // update the incidence
    $scope.updateIncidence = function () {
        $http.post('script/update.php', {
            incidence: $scope.incidence_details
        })
            .then(function success(e) {

                $scope.errors = [];

                var modal_element = angular.element('#modal_update_incidence');
                modal_element.modal('hide');

            }, function error(e) {
                $scope.errors = e.data.errors;
            });
    };

    // delete the incidence
    $scope.delete = function (index) {

        var conf = confirm("¿Estás seguro de eliminar la incidencia?");

        if (conf == true) {
            $http.post('script/delete.php', {
                incidence: $scope.incidents[index]
            })
                .then(function success(e) {

                    $scope.errors = [];

                    $scope.incidents.splice(index, 1);

                }, function error(e) {
                    $scope.errors = e.data.errors;
                });
        }
    };
}]);
