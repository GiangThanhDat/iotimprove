
(function (app) {
   app.factory("accountmngService", [
	"$cookies", function($cookies) {
		var userName = "";
		var accountInfor={};
		return {
			setCookieData: function(username) {
				userName = username;
				$cookies.put("userName", username);
			},
			getCookieData: function() {
				userName = $cookies.get("userName");
				return userName;
			},
			clearCookieData: function() {
				userName = "";
				$cookies.remove("userName");
			},

			setAccountInfor : (account)=>{
				accountInfor = account;
				$cookies.put("accountInfor",JSON.stringify(accountInfor));
			},

			getAccountInfor : ()=>{
				accountInfor = $cookies.get("accountInfor");
				return $.parseJSON( accountInfor);
			}
		}
	}
]);
})(angular.module('myIOTApp'));