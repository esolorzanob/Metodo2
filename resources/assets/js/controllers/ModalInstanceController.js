angular.module('ModalInstanceController',[]).controller('ModalInstanceController',  function ($scope, $uibModalInstance, id) {
  
  $scope.id = id;   

  $scope.ok = function () {   
    $uibModalInstance.close(id);
  };

  $scope.cancel = function () {
    $uibModalInstance.dismiss('cancel');
  };
});
