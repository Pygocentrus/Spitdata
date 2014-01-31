var myApp = angular.module('myApp', [], function($interpolateProvider) {
    $interpolateProvider.startSymbol('[[');
    $interpolateProvider.endSymbol(']]');
});

myApp.controller('UserCtrl', ['$scope', function ($scope) {
    
    // Let's namespace the user details
    // Also great for DOM visual aids too
    $scope.user = {};
    $scope.user.details = {
      "username": "John DOE",
      "id": "89101112"
    };

    $scope.view = {
	    getView: function() {
	        return "front/customForm.html";
	    }
	};
    
}]);

// Tab toggling
$(document).ready(function(){
	$('#myTab a').click(function (e) {
	  e.preventDefault();
	  $(this).tab('show');
	});
});