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
//Contents
myApp.controller('ContentCtrl', ['$scope', function ($scope) {
    $scope.contentType = 'item';
    $scope.nbContents = 1;
    $scope.view = {
        getView: function() {
            return "front/contentForm.html";
        }
    };
}]);

// Tab toggling
$(document).ready(function() {
    // GUI content tabs
	$('#myTab a').click(function (e) {
	    e.preventDefault();

        // Display tab content
	    $(this).tab('show');

        // Instanciate copy to clipboard feature
        $('.clipboard').each(function(i){
            var that = $(this);
            that.clipboard({
                path: '../../ui/swf/jquery.clipboard.swf',
                copy: function() {
                    that.attr('value', 'Copied !');
                    setTimeout(function(){
                        that.attr('value', 'Copy to clipboard');
                    }, 2000);
                    return $('.liveUrl_'+that.data('id')).val();
                }
            });
        });
	});

    // Copy to clipboard first instance
    setTimeout(function(){
        $('.clipboard').each(function(i){
            var that = $(this);
            that.clipboard({
                path: '../../ui/swf/jquery.clipboard.swf',
                copy: function() {
                    that.attr('value', 'Copied !');
                    setTimeout(function(){
                        that.attr('value', 'Copy to clipboard');
                    }, 2000);
                    return $('.liveUrl_'+that.data('id')).val();
                }
            });
        });
    }, 1000);

    // Copy to clipboard
    // $('body').on('click', '.clipboard', function(e){
    //     $(this).clipboard({
    //         path: '../../ui/swf/jquery.clipboard.swf',
    //         copy: function() {
    //             var that = $(this);
    //             that.attr('value', 'Copied !');
    //             setTimeout(function(){
    //                 that.attr('value', 'Copy to clipboard');
    //             }, 2000);
    //             return $('.liveUrl_'+that.data('id')).val();
    //         }
    //     });
    // });
});