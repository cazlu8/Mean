 <!DOCTYPE html>
 <html ng-app="app">
 <head>
 <script src="angular.min.js" type="text/javascript" charset="utf-8" async defer></script>
<script scr="bootstrap.css"></script>
<meta charset="utf-8">
 	<title>Angular</title>
 </head>
 <body>
 <div ng-controller="myController as ctrl">
 	<div>
 	<p>first name:<input ng-model="ctrl.firstName"></p>
 		<p>last name:<input ng-model="ctrl.lastName"></p>	
 	</div>
{{ctrl.firstName+""+ctrl.lastName}}tem {{(ctrl.firstName+.ctrl.lastName).length}} letras


 </div>
 </body>
 </html>
