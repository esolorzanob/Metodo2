angular.module('AulaService', []).factory('Aula', ['$resource',
  function ($resource) {
    return $resource('/api/aula/:id', {
      id: '@id',
      aula: '@aula'
    }, {
        update: {
          method: 'PUT'
        },
        updateAll: {
          method: 'POST',
          url: 'api/aula/updateAll'
        }
      });
  }
]);