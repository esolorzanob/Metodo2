angular.module('RecursoController', []).controller('RecursoController', ['$scope', '$location', '$routeParams', 'Recurso',
  function ($scope, $location, $routeParams, Recurso) {
    $scope.create = function () {
      var recurso = new Recurso({
        nombre: this.nopmbre,
        numeroSerie : this.numeroSerie,
        descripcion: this.descripcion,
        estado: this.descripcion,
        comentarios: this.comentarios
      });
      recurso.$save(function (res) {
      //  $location.path('recursos/view/' + res.id);
        $scope.recurso = '';
      }, function (err) {
        console.log(err);
      });
    };

    $scope.find = function () {
      $scope.recursos = Recurso.query();
    };
           
    $scope.remove = function (recurso) {
      recurso.$remove(function (res) {
        if (res) {
          for (var i in $scope.recursos) {
            if ($scope.recursos[i] === recurso) {
              $scope.recursos.splice(i, 1);
            }
          }
        }
      }, function (err) {
        console.log(err);
      })
    };

    $scope.update = function (recurso) {
      recurso.$update(function (res) {
      }, function (err) {
        console.log(err);
      });
    };

    $scope.findOne = function () {
      var splitPath = $location.path().split('/');
      var recursoId = splitPath[splitPath.length - 1];
      $scope.recurso = Recurso.get({recursoId: recursoId});
    };
  }
]);
