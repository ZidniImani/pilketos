<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../asset/css/bootstrap.min.css" />
  <script src="../asset/js/jquery.min.js"></script>
  <script src="../asset/js/bootstrap.min.js"></script>
  <script type="text/javascript">
  	var app = angular.module("test",[]);

app.controller("Ctrl1",function($scope){
 
  // initial values
  $scope.val1 = 34;
  $scope.val2 = 54;
  $scope.val3 = $scope.val1 + $scope.val2;
  
  $scope.$watch('[val1,val2]', function (newValue, oldValue) {
    
    $scope.val3 = parseInt($scope.val1) + parseInt($scope.val2);
    
  });
 

})
.directive('toggle', function(){
  return {
    restrict: 'A',
    link: function(scope, element, attrs){
      if (attrs.toggle=="tooltip"){
        $(element).tooltip();
      }
      if (attrs.toggle=="popover"){
        $(element).popover();
      }
    }
  };
})
.directive("progressBar", ["$timeout", function ($timeout) {
    return {
        restrict: "EA",
        scope: {
            total: '=total',
            complete: '=complete',
          	barClass: '@barClass',
          	completedClass: '=?'
        },
        transclude: true,
        link: function (scope, elem, attrs) {

            scope.label = attrs.label;
            scope.completeLabel = attrs.completeLabel;
            scope.showPercent = (attrs.showPercent) || false;
            scope.completedClass = (scope.completedClass) || 'progress-bar-danger';
          
          	scope.$watch('complete', function () {
              
              //change style at 100%
              var progress = scope.complete/scope.total;
              if (progress >= 1) {
                $(elem).find('.progress-bar').addClass(scope.completedClass);
              }
              else if (progress < 1) {
                $(elem).find('.progress-bar').removeClass(scope.completedClass);              
              }

            });

        },
        template:
            "<span class='small'>{{total}} {{label}}</span>" +
            "<div class='progress'>"+
      "   <div class='progress-bar {{barClass}}' title='{{complete/total * 100 | number:0 }}%' style='width:{{complete/total * 100}}%;'>{{showPercent ? (complete/total*100) : complete | number:0}} {{completeLabel}}</div>" +
            "</div>"
    };
}])

//$(document).ready(function(){});
  </script>
</head>
<body>

<ng ng-app="test">
<div class="container" ng-controller="Ctrl1">

  <h2>AngularJS - Progress Bar with Bootstrap</h2>
  <p class="small">Multiple Directive Instances in Single Controller</p>
  
  <hr>
  
  <div class="row">
    
    <div class="col-md-4">
      <div progress-bar="" id="hoursChart" class="" data-total="50" data-complete-label=" hrs" data-complete="val1" data-label="Tech Hours" title="Tech Hours Progress" data-toggle="tooltip"></div>
      <label>Tech Hours Complete</label><input class="form-control" value="{{val1}}" ng-model="val1">
  	</div>
    <div class="col-md-4">
      <div progress-bar="" id="hoursChart2" class="" data-total="150" data-bar-class="progress-bar-warning" data-show-percent="true" data-complete="val2" data-label="Work Hours" title="Work Hours Progress" data-toggle="tooltip"></div>
      <label>Work Hours Complete</label><input class="form-control" ng-model="val2">
    </div>
    <div class="col-md-4">
      <div progress-bar="" id="hoursChart3" class="" data-total="200" data-bar-class="progress-bar-success" data-show-percent="true" data-complete="val3" data-complete-label="%" data-label="Total Hours" title="Total Hours Progress" data-toggle="tooltip"></div>
      <label>Total Hours Completed</label><input readonly="" class="form-control" ng-model="val3">
    </div>
    
  
  </div>
  
  
</div>
</ng>  
</body>
</html>