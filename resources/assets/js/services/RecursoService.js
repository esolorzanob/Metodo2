angular.module('RecursoService', []).factory('Recurso', ['$resource',
  function ($resource) {
    return $resource('/api/recurso/:id', {
      id: '@id',
      recurso: '@recurso'
    }, {
        update: {
          method: 'PUT'
        },
        updateAll: {
          method: 'POST',
          url: 'api/recurso/updateAll'
        }
      });
  }
]);