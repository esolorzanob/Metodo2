angular.module('UserService', []).factory('User', ['$resource',
  function ($resource) {
    return $resource('/api/user/:userId', {
      userId: '@id',
      usuario: '@usuario',
      email: '@email',
      password: '@password'
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
      },
      getByEmail: {
        method: 'GET', 
        isArray: true,                  
        url: '/api/user/getByEmail'
      },
       resetPassword: {
        method: 'POST',              
        url: '/api/user/resetPassword'
      },
      changePassword: {
        method: 'POST',              
        url: '/api/user/changePassword'
      }
    });
  }
]);
