
(function (app) {
   app.factory("accountmngService", [
	"$cookies", function($cookies) {		
		var accountInfor={};
		var roles = [];
		return {			
			clearCookieData: function() {
				accountInfor = "";
				$cookies.remove("accountInfor");
			},

			setAccountInfor : (account)=>{
				accountInfor = account;
				$cookies.put("accountInfor",JSON.stringify(accountInfor));
			},

			getAccountInfor : ()=>{
				accountInfor = $cookies.get("accountInfor");
				return $.parseJSON( accountInfor);
			},
			setRoles : (roles)=>{
				roles = roles;
				$cookies.put("roles",JSON.stringify(roles));
			},
			getRoles : ()=>{
				roles = $cookies.get('roles');
				return$.parseJSON(roles);
			}
		}
	}
]);
})(angular.module('myIOTApp'));