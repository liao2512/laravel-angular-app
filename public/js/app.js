var app = angular.module('admiApp', [], function($interpolateProvider) {
	$interpolateProvider.startSymbol('<%');
	$interpolateProvider.endSymbol('%>');
});
 
app.controller('categoriesController', function($scope, $http) {
 
	$scope.categories = [];
	$scope.loading = false;
 
	$scope.init = function() {
		$scope.loading = true;
		$http.get('/api/categories').
		success(function(data, status, headers, config) {
			$scope.categories = data;
			$scope.loading = false;
 
		});
	}
 
	$scope.updateStatus = function(category) {
		$scope.loading = true;
 
		$http.get('/category/status/' + category.id, {
			category: category.id
		}).success(function(data, status, headers, config) {
			category = data;
			$scope.loading = false;
		});;
	};
 
	$scope.deleteCategory = function(category) {
		$scope.loading = true;
 
		for (i = 0; i < $scope.categories.length; i++) { 
		    if ($scope.categories[i].id == category.id) {
			    var categoryToDelete = $scope.categories[i];
			}
		}
		
		$http.get('/category/destroy/' + categoryToDelete.id)
			.success(function() {
				for (i = 0; i < $scope.categories.length; i++) { 
				    if ($scope.categories[i].id == category.id) {
					    $scope.categories.splice(i, 1);
					}
				    if ($scope.categories[i].position > category.position) {
					    $scope.categories[i].position--;
					}
				}
				$scope.loading = false;
			});;
	};
 
	$scope.init();
 
});

app.controller('coursesController', function($scope, $http) {
 
	$scope.courses = [];
	$scope.loading = false;
 
	$scope.init = function() {
		$scope.loading = true;
			$http.get('/api/courses/' + coursesCategory).
		success(function(data, status, headers, config) {
			$scope.courses = data;
			$scope.loading = false;
 
		});
	}
 
	$scope.updateStatus = function(course) {
		$scope.loading = true;
 
		$http.get('/course/status/' + course.id, {
			course: course.id
		}).success(function(data, status, headers, config) {
			course = data;
			$scope.loading = false;
		});;
	};
 
	$scope.deleteCategory = function(category) {
		$scope.loading = true;
 
		for (i = 0; i < $scope.categories.length; i++) { 
		    if ($scope.categories[i].id == category.id) {
			    var categoryToDelete = $scope.categories[i];
			}
		}
		
		$http.get('/category/destroy/' + categoryToDelete.id)
			.success(function() {
				for (i = 0; i < $scope.categories.length; i++) { 
				    if ($scope.categories[i].id == category.id) {
					    $scope.categories.splice(i, 1);
					}
				    if ($scope.categories[i].position > category.position) {
					    $scope.categories[i].position--;
					}
				}
				$scope.loading = false;
			});;
	};
 
	$scope.init();
 
});