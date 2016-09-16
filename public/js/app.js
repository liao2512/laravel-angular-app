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
	$scope.category = coursesCategory;
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
 
	$scope.deleteCourse = function(course) {
		$scope.loading = true;
 
		for (var i = 0; i < $scope.courses.length; i++) { 
		    if ($scope.courses[i].id == course.id) {
			    var courseToDelete = $scope.courses[i];
			}
		}
		
		$http.get('/course/destroy/' + courseToDelete.id)
			.success(function() {
				for (i = 0; i < $scope.courses.length; i++) { 
				    if ($scope.courses[i].id == course.id) {
					    $scope.courses.splice(i, 1);
					}
				    if ($scope.courses[i].position > course.position) {
					    $scope.courses[i].position--;
					}
				}
				$scope.loading = false;
			});;
	};
	
 
	$scope.init();
 
});

app.controller('registrationsController', function($scope, $http) {
 
	$scope.registrations = [];
	$scope.course = registrationsCourse;
	$scope.loading = false;
 
	$scope.init = function() {
		$scope.loading = true;
			$http.get('/api/registrations/' + registrationsCourse).
		success(function(data, status, headers, config) {
			$scope.registrations = data;
			$scope.loading = false;
 
		});
	}
	
	$scope.calculateAge = function calculateAge(birthday) { // birthday is a date
	    var ageDifMs = Date.now() - birthday.getTime();
	    var ageDate = new Date(ageDifMs); // miliseconds from epoch
	    return Math.abs(ageDate.getUTCFullYear() - 1970);
	}
 
	$scope.updateStatus = function(registration) {
		$scope.loading = true;
 
		$http.get('/registration/status/' + registration.id, {
			registration: registration.id
		}).success(function(data, status, headers, config) {
			registration = data;
			$scope.loading = false;
		});;
	};
 
	$scope.deleteRegistration = function(registration) {
		$scope.loading = true;
 
		for (i = 0; i < $scope.registrations.length; i++) { 
		    if ($scope.registrations[i].id == registration.id) {
			    var registrationToDelete = $scope.registrations[i];
			}
		}
		
		$http.get('/registration/destroy/' + registrationToDelete.id)
			.success(function() {
				for (i = 0; i < $scope.categories.length; i++) { 
					$scope.categories.splice(i, 1);
				}
				$scope.loading = false;
			});;
	};
 
	$scope.init();
 
});

app.controller('paymentsController', function($scope, $http) {
 
	$scope.payments = [];
	$scope.loading = false;
 
	$scope.init = function() {
		$scope.loading = true;
			$http.get('/api/payments/' + paymentsRegistration).
		success(function(data, status, headers, config) {
			$scope.payments = data;
			$scope.loading = false;
 
		});
	}
 
	$scope.updateStatus = function(payment) {
		$scope.loading = true;
 
		$http.get('/payment/status/' + payment.id, {
			payment: payment.id
		}).success(function(data, status, headers, config) {
			payment = data;
			$scope.loading = false;
		});;
	};
 
	$scope.deletePayment = function(payment) {
		$scope.loading = true;
 
		for (i = 0; i < $scope.payments.length; i++) { 
		    if ($scope.payments[i].id == payment.id) {
			    var paymentToDelete = $scope.payments[i];
			}
		}
		
		$http.get('/payment/destroy/' + paymentToDelete.id)
			.success(function() {
				for (i = 0; i < $scope.payments.length; i++) { 
					$scope.payments.splice(i, 1);
				}
				$scope.loading = false;
			});;
	};
 
	$scope.init();
 
});