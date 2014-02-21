var myApp = angular.module('myApp', [], function($interpolateProvider) {
    $interpolateProvider.startSymbol('[[');
    $interpolateProvider.endSymbol(']]');
});

//Users
myApp.controller('UserCtrl', ['$scope', function ($scope) {
    $scope.nbUsers = 1;
    $scope.gender = 'both';
    $scope.view = {
	    getView: function() {
	        return "front/userForm.html";
	    }
	};    
}]);
//Posts
myApp.controller('PostCtrl', ['$scope', function ($scope) {
    $scope.postType = 'tweet';
    $scope.nbPosts = 1;
    $scope.view = {
        getView: function() {
            return "front/postForm.html";
        }
    };    
}]);

function ClipBoard(){
    // holdtext.innerText = copytext.innerText;
    // Copied = holdtext.createTextRange();
    // Copied.execCommand("Copy");
}

// Tab toggling
$(document).ready(function() {
    // GUI content tabs
	$('#myTab a').click(function (e) {
	  e.preventDefault();
	  $(this).tab('show');
	});
    // Copy to clipboard
    $('body').on('click', '.clipboard', function(e){
        ClipBoard();
    });
});