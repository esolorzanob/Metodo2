angular.module('UserController', []).controller('UserController', ['$scope', 'User', '$localStorage', '$location', '$uibModal', '$timeout',
  function ($scope, User, $localStorage, $location, $uibModal, $timeout) {
    $scope.usuario = {};
    $scope.login = function () {
      var user = new User($scope.usuario);
      user.$login(function (user) {
        $localStorage.token = user.token;
        $scope.getAuthenticatedUser(user);
         $location.path('users/view/' + user.id);
      }, function (err) {
        console.log(err.data.description);
        $scope.error = "Usuario y/o contraseña incorrectos";
      });
    };

    $scope.createNew = function () {
      if ($scope.usuario.password != $scope.usuario.passwordConfirmation) {
        $scope.error = "Las contraseñas no coinciden";
      } else if (!$scope.usuario.password.match(/[A-Z]/) || $scope.usuario.password.length < 8 || !$scope.usuario.password.match(/[\d]/)) {
        $scope.error = "La contraseña no cumple con los requerimientos mínimos";
      } else {
        var user = new User($scope.usuario);     
        user.$save(function (user) {
          $localStorage.token = user.token;
          $scope.getAuthenticatedUser(user);
          $location.path('users/view/' + user.id);
        }, function (err) {
          console.log(err);
        });
      }
    };
    
    $scope.create = function () {
      
      if ($scope.usuario.password != $scope.usuario.passwordConfirmation) {
        $scope.error = "Las contraseñas no coinciden";
      } else if (!$scope.usuario.password.match(/[A-Z]/) || $scope.usuario.password.length < 8 || !$scope.usuario.password.match(/[\d]/)) {
        $scope.error = "La contraseña no cumple con los requerimientos mínimos";
      } else {
        var user = new User($scope.usuario);     
        user.$save(function (user) {
         $scope.message = "El usuario se creó con éxito."
        }, function (err) {
          console.log(err);
        });
      }
    };

    $scope.findOne = function () {
      var splitPath = $location.path().split('/');
      var userId = splitPath[splitPath.length - 1];
      $scope.usuario = User.get({ userId: userId });
    };
    
    $scope.findAll = function(){
      $scope.users = User.query();
      
    };
    $scope.edit = function(){
      User.updateAll({usuario: $scope.usuario},function(response){
        $scope.error = response.message;
         $timeout(function () {
              $location.path('users/list/');
            }, 2000);
         
      });
    }
    
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
      User.delete({userId: id});
     $scope.message = "El usuario fue borrado con éxito";
     $scope.findAll();
      }, function () {
        $log.info('Modal dismissed at: ' + new Date());
      });
    };
  }
]);
