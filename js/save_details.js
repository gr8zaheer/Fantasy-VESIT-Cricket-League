

$(document).ready(function () {
    //Disable full page
    /*$("body").on("contextmenu",function(e){
        return false;
    });*/
});



function register_details(){
	var reg_name = /^[A-Z][a-z]*$/;
	var reg_mail = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
	var mob_no = /^[0-9]{10}$/;
	var fname = $("#fname").val();
	var lname = $("#lname").val();
	var mail = $("#mail").val();
	var username = $("#username").val();
	var phone = $("#phone").val();
	var Class = $("#Class").val();
	var Question = $("#Question").val();
	var Answer = $("#Answer").val();
	var pwd = $('#pwd').val();
	var cpwd = $('#cpwd').val();

	if(fname=="")
	{
		$("#status").html('<p class="alert alert-warning" role="alert"><b>First name cant be empty</b></p>');
		$("#fname").focus();
	}

	else if(lname=="")
	{
		$("#status").html('<p class="alert alert-warning" role="alert"><b>Last name cant be empty</b></p>');
		$("#lname").focus();
	} 

	else if(mail=="")
	{
		$("#status").html('<p class="alert alert-warning" role="alert"><b>Email id cant be empty</b></p>');
		$("#mail").focus();
	} 

	else if(!mail.match(reg_mail))
	{
		$("#status").html('<p class="alert alert-warning" role="alert"><b>Enter valid email id</b></p>');
		$("#mail").focus();
	} 

	else if(username=="")
	{
		$("#status").html('<p class="alert alert-warning" role="alert"><b>Username cant be empty</b></p>');
		$("#username").focus();
	}

	else if(phone=="")
	{
		$("#status").html('<p class="alert alert-warning" role="alert"><b>Mobile no. cant be empty</b></p>');
		$("#phone").focus();
	} 

	else if(!phone.match(mob_no))
	{
		$("#status").html('<p class="alert alert-warning" role="alert"><b>Enter valid mobile number</b></p>');
		$("#phone").focus();
	}

	else if(Class=="")
	{
		$("#status").html('<p class="alert alert-warning" role="alert"><b>Class cant be empty</b></p>');
		$("#Class").focus();
	}

	else if(Class=="")
	{
		$("#status").html('<p class="alert alert-warning" role="alert"><b>Answer cant be empty</b></p>');
		$("#Answer").focus();
	}

	else if(Question=="")
	{
		$("#status").html('<p class="alert alert-warning" role="alert"><b>Security Question cant be empty</b></p>');
		$("#Question").focus();
	}

	else if(Answer=="")
	{
		$("#status").html('<p class="alert alert-warning" role="alert"><b>Answer cant be empty</b></p>');
		$("#Answer").focus();
	}

	else if(pwd=="")
	{
		$("#status").html('<p class="alert alert-warning" role="alert"><b>Password cant be empty</b></p>');
		$("#pwd").focus();
	}

	else if(cpwd=="")
	{
		$("#status").html('<p class="alert alert-warning" role="alert"><b>Password cant be empty</b></p>');
		$("#cpwd").focus();
	}	

	else if(pwd != cpwd)
	{
		$("#status").html('<p class="alert alert-danger" role="alert"><b>Confirm Password dont match</b></p>');
		$("#pwd").focus();
		$("#cpwd").focus();
	} 

	else
	{
		var dataString = 'fname='+ fname + '&lname=' + lname + '&mail=' + mail  + '&username=' + username + '&phone=' + phone + '&Class=' + Class + '&Question='+ Question + '&Answer='+ Answer + '&pwd=' + pwd;
		$.ajax(
		{
			type: "post",
			url: "f_signup.php",
			data: dataString,
			cache:false,
			beforeSend:function()
			{
				$("#status").html("<p><i class='fa fa-spinner' aria-hidden='true'></i>Loading...Please Wait</p>")
			},
			success:function(msg){
				var response = String(msg);
				if(response=="Signed Up Successfully")
				{
					$("#status").html("<p class='alert alert-success' role='alert'><i class='fa fa-check' aria-hidden='true'></i>&nbsp;&nbsp;" + msg + "</p>")
				}
				else
				{
					$("#status").html("<p class='alert alert-warning' role='alert'>" + msg + "</p>")
				}	
			}
		}
		);
	}
}


function register_login()
{
	var reg_mail = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
	var mail = $("#login_email").val();
	var pwd = $('#login_pwd').val();

	if(mail=="")
	{
		$("#loginStatus").html('<p class="alert alert-warning" role="alert"><b>Email id cant be empty</b></p>');
		$("#mail").focus();
	} 

	else if(!mail.match(reg_mail))
	{
		$("#loginStatus").html('<p class="alert alert-warning" role="alert"><b>Enter valid email id</b></p>');
		$("#mail").focus();
	}

	else
	{
		var response;
		var dataString = 'login_email='+ mail + '&login_pwd=' + pwd;
		$.ajax(
		{
			type: "post",
			url: "f_login.php",
			data: dataString,
			cache:false,
			beforeSend:function()
			{
				$("#loginStatus").html("<p><i class='fa fa-spinner' aria-hidden='true'></i>Verifying.....</p>")
			},
			success:function(msg){
				response = String(msg);
				if(response=="You have successfully logged in")
				{
				$("#loginStatus").html("<p class='alert alert-success' role='alert'>" + msg + "</p>");
				window.open('home.php','_self')
				}

				else
				{
					$("#loginStatus").html("<p class='alert alert-danger' role='alert'>" + msg + "</p>");
				}

			}
		}
		);
	}
}


function admins_login()
{
	var reg_mail = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
	var mail = $("#login_email").val();
	var pwd = $('#login_pwd').val();

	if(mail=="")
	{
		$("#loginStatus").html('<p class="alert alert-warning" role="alert"><b>Email id cant be empty</b></p>');
		$("#mail").focus();
	} 

	else if(!mail.match(reg_mail))
	{
		$("#loginStatus").html('<p class="alert alert-warning" role="alert"><b>Enter valid email id</b></p>');
		$("#mail").focus();
	}

	else
	{
		var response;
		var dataString = 'login_email='+ mail + '&login_pwd=' + pwd;
		$.ajax(
		{
			type: "post",
			url: "f_admin_login.php",
			data: dataString,
			cache:false,
			beforeSend:function()
			{
				$("#loginStatus").html("<p><i class='fa fa-spinner' aria-hidden='true'></i>Verifying.....</p>")
			},
			success:function(msg){
				response = String(msg);
				if(response=="You have successfully logged in")
				{
				$("#loginStatus").html("<p class='alert alert-success' role='alert'>" + msg + "</p>");
				window.open('adminhome.php','_self')
				}

				else
				{
					$("#loginStatus").html("<p class='alert alert-danger' role='alert'>" + msg + "</p>");
				}

			}
		}
		);
	}
}

function verify()
{
	var mail = $('#verify_email').val();
	var mobile = $('#verify_mobile').val();
	var dataString = 'mail='+mail+'&mobile='+mobile;

	$.ajax({
		type: "post",
		url: "f_verify.php",
		data: dataString,
		cache:false,
		beforeSend:function(){
			bootbox.dialog({
				message:'<h3 class="text-center">Please wait...</h3>',
				closeButton:false
			});
		},
		success:function(msg){
		       
			var feedback = String(msg);
			if(feedback == 'Success')
			{
			$('#reset_details').load('d_displayquestion.php');
			 bootbox.hideAll();
			}
			else
			alert(feedback);	
		}
	});
	return false;
}

function verify_ans()
{
	var answer = String($('#ver_ans').val());
	var dataString = 'answer='+answer;
	$.ajax({
		type: "post",
		url: "f_verifyans.php",
		data: dataString,
		cache:false,
		beforeSend:function(){
			bootbox.dialog({
				message:'<h3 class="text-center">Please wait...</h3>',
				closeButton:false
			});
		},
		success:function(msg){
			var feedback = String(msg);
			if(feedback == 'Success')
			{
			$('#reset_details').load('d_displayreset.php');
			bootbox.hideAll();
			}
			else
			alert(feedback);	
		}
	});
	return false;
}

function resetpwd()
{
	var pwd = String($('#reset_pwd').val());
	var cpwd = String($('#reset_cpwd').val());
	if(pwd == '')
	{
		$("#reset_pwd").focus();
		$("#reset_status").html('<p class="alert alert-warning">Password cant be empty</p>');
	}
	else if(cpwd == '')
	{
		$("#reset_cpwd").focus();
		$("#reset_status").html('<p class="alert alert-warning">Confirm password cant be empty</p>');
	}
	else if(pwd != cpwd)
	{
		$("#reset_status").html('<p class="alert alert-danger">Password dont match</p>');
	}
	else
	{
	var dataString = 'pwd='+pwd;

	$.ajax({
		type: "post",
		url: "f_resetpwd.php",
		data: dataString,
		cache:false,
		beforeSend:function(){
			bootbox.dialog({
				message:'<h3 class="text-center">Please wait...</h3>',
				closeButton:false
			});
		},
		success:function(msg){
			var feedback = String(msg);
			if(feedback == 'Success')
			{
			$('#reset_details').load('goback.html');
			bootbox.hideAll();
			}
			else
			alert(feedback);	
		}
	});
	}
	return false;
}


function f_logout()
 {
        $.ajax(
        {
          url:"f_logout.php",
          success:function(msg)
          {
            var response = String(msg);
            if(response=='successful')
            {
              window.open('index.php','_self');
            }
          }

        }
        );
 } 