function login(){
	var user = $("#userName").val();
	var pass = $("#password").val();
	//alert();
	//var img = load('#golap',);
    if(user == ''){
		$("#userName").css({"border-color":"red"}).focus();
	return false;
	}
	if(pass == ''){
		$("#userName").css({"border-color":"green"});
		$("#password").css({"border-color":"red"}).focus();
	return false;
	}
	$.post("index.php/home/report/login_data",{user : user, pass: pass},function(data){
		//var img = load();
		$("#golap").html(data);
		//alert(data);
	});
};

function logout(){
	location.replace("home/report/logout_data");
}

$(document).ready(function(){
    $("#myBtn").click(function(){
		//alert();
        $("#myModal").modal({keyboard: true});
    });
    $("#myBtn2").click(function(){
        $("#myModal2").modal({keyboard: false});
    });
});
