var myApp = angular.module('myApp', [], function($interpolateProvider) {
    $interpolateProvider.startSymbol('[[');
    $interpolateProvider.endSymbol(']]');
});

//Users
myApp.controller('UserCtrl', ['$scope', function ($scope) {
    $scope.nbContent = 1;
    $scope.typeContent = 'both';
    $scope.typeData = "user"
    $scope.view = {
	    getView: function() {
	        return "front/userForm.html";
	    }
	};
}]);
//Posts
myApp.controller('PostCtrl', ['$scope', function ($scope) {
    $scope.typeContent = 'tweet';
    $scope.nbContent = 1;
    $scope.typeData = "post"
    $scope.view = {
        getView: function() {
            return "front/postForm.html";
        }
    };
}]);
//Contents
myApp.controller('ContentCtrl', ['$scope', function ($scope) {
    $scope.typeContent = 'item';
    $scope.nbContent = 1;
    $scope.typeData = "content"
    $scope.view = {
        getView: function() {
            return "front/contentForm.html";
        }
    };
}]);
// Images
myApp.controller('ImagesCtrl', ['$scope', function ($scope) {
    $scope.dirname = 'articles';
    $scope.width = 600;
    $scope.height = 400;
    $scope.extension = 'png';
    $scope.nbrImages = 4;
    $scope.zip = '';
    $scope.view = {
        getView: function() {
            return "front/imagesForm.html";
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

        //
        $('#myTab a').removeClass('active');
        $(this).addClass('active');

        // Instanciate copy to clipboard feature
        $('.clipboard').each(function(i){
            var that = $(this);
            that.clipboard({
                path: '../../ui/swf/jquery.clipboard.swf',
                copy: function() {
                    that.attr('value', 'COPIED !');
                    setTimeout(function(){
                        that.attr('value', 'COPY URL TO CLIPBOARD');
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
                    that.attr('value', 'COPIED !');
                    setTimeout(function(){
                        that.attr('value', 'COPY URL TO CLIPBOARD');
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