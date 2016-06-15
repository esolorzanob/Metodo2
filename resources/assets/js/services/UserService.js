angular.module('UserService', []).factory('User', ['$resource',
  function ($resource) {
    return $resource('/api/user/:userId', {
      userId: '@id',
      usuario: '@usuario'
    }, {
      updateAll: {
        method: 'POST',
        url: 'api/user/updateAll'
      },
      login: {
        method: 'POST',
        url: '/api/user/login'
      },
      getByToken: {
        method: 'GET',
        url: '/api/user/getByToken'
      },
      delete: {
        method: 'POST',
        url: 'api/user/delete',
      }
    });
  }
]);
