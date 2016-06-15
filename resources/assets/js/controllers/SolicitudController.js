angular.module('SolicitudController', []).controller('SolicitudController', ['$scope', '$location', '$routeParams', 'Solicitud',
  function ($scope, $location, $routeParams, Solicitud) {
    $scope.create = function () {
      var solicitud = new Solicitud({
        body: this.body
      });
      solicitud.$save(function (res) {
        $location.path('solicitudes/view/' + res.id);
        $scope.body = '';
      }, function (err) {
        console.log(err);
      });
    };

    $scope.find = function () {
      $scope.solicitudes = Solicitud.query();
    };
    
   /* $scope.test = function () {
      $("[name='my-checkbox']").bootstrapSwitch();
    };*/

    $scope.remove = function (solicitud) {
      solicitud.$remove(function (res) {
        if (res) {
          for (var i in $scope.solicitudes) {
            if ($scope.solicitudes[i] === solicitud) {
              $scope.solicitudes.splice(i, 1);
            }
          }
        }
      }, function (err) {
        console.log(err);
      })
    };

    $scope.update = function (solicitud) {
      solicitud.$update(function (res) {
      }, function (err) {
        console.log(err);
      });
    };

    $scope.findOne = function () {
      var splitPath = $location.path().split('/');
      var solicitudId = splitPath[splitPath.length - 1];
      $scope.solicitud = Solicitud.get({solicitudId: solicitudId});
    };
    
  }
]);
