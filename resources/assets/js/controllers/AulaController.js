angular.module('AulaController', []).controller('AulaController', ['$scope', '$location', '$routeParams', 'Aula', 'User', '$uibModal', '$timeout',
  function ($scope, $location, $routeParams, Aula, User, $uibModal, $timeout) {
    $scope.create = function () {
      var aula = new Aula($scope.aula);
      aula.$save(function (res) {
      //  $location.path('aulas/view/' + res.id);
       $scope.message = "El aula se ha creado con éxito";
      }, function (err) {
        console.log(err);
      });
    };

     $scope.findAll = function () {
       $scope.getUser();
      var splitPath = $location.path().split('/');
      var userId = splitPath[splitPath.length - 1];
      $scope.usuario = User.get({ userId: $scope.authenticatedUser.id }, function (user) {
        if ($scope.authenticatedUser.rol != "Admin"){
          $scope.show = false;
          $scope.message = "No esta autorizado para ver esta información."
         
        }else{
          $scope.show = true;
           $scope.aulas = Aula.query();
        }
      
      });
     

    };
           
    $scope.remove = function (aula) {
      aula.$remove(function (res) {
        if (res) {
          for (var i in $scope.aulas) {
            if ($scope.aulas[i] === aula) {
              $scope.aulas.splice(i, 1);
            }
          }
        }
      }, function (err) {
        console.log(err);
      })
    };

    $scope.update = function (aula) {
      aula.$update(function (res) {
      }, function (err) {
        console.log(err);
      });
    };
    
     $scope.edit = function () {
      Aula.updateAll({ aula: $scope.aula }, function (response) {
       if (response.match(/error/i)){
          $scope.error = response.message;
        }else{
          $scope.message = response.message;
        }
        $timeout(function () {
          $location.path('aula/list/');
        }, 2000);

      });
    }

    $scope.findOne = function () {
      var splitPath = $location.path().split('/');
      var id = splitPath[splitPath.length - 1];
      $scope.aula = Aula.get({id: id});
    };
    
     $scope.open = function (id) {
      var modalInstance = $uibModal.open({
        animation: $scope.animationsEnabled,
        templateUrl: 'myModalContent.html',
        controller: 'ModalInstanceController',
        size: 'sm',
        resolve: {
          id: function () {
            return id;
          }
        }
      });
      modalInstance.result.then(function (id) {
        console.log(id);
        Aula.delete({ id: id });
        $scope.message = "El aula fue borrada con éxito";
        $scope.findAll();
      }, function () {
        $log.info('Modal dismissed at: ' + new Date());
      });
    };
    
     $scope.getUser = function () {
      new User().$getByToken(function (user) {
        $scope.authenticatedUser = user;
      }, function (err) {
        console.log(err);
      });
    }

  }
  
  
]);
