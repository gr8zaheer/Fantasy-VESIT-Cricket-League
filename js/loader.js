$(document).ready(
	function()
	{
		$('.loader').load('Endpage.php');

		$('ul#options li a').click(function(){
			var link = $(this).attr('href');
			$('.loader').load(link+'.php'); 
			return false;
		});

                /*$("body").on("contextmenu",function(e){
                return false;
        });*/
     }
);

function wait()
{
	bootbox.dialog({
		size:'small',
		message:'<h3 style="text-align:center;padding:30px;">Please Wait...</h3>',
		closeButton:false
	});
}

function show()
{
	var cat = $('#category').val();
	var datastring = 'cat='+cat;
	$.ajax({
		type : 'post',
		url : 'd_getplayers.php',
		data : datastring,
		cache:false,
		success : function(msg){
			$('#display').html(msg);
		}
	});
	return false;
}

function showDetails()
{
	$.ajax({
		type : 'post',
		url : 'd_getdetails.php',
		cache:false,
		success : function(msg){
			$('.money-players').html(msg);
		}
	});
	return false;
}

function showNumber()
{
	$.ajax({
		type : 'post',
		url : 'd_getnumber.php',
		cache:false,
		success : function(msg){
			$('.number-players').html(msg);
		}
	});
	return false;
}

function showSquad()
{
	$.ajax({
		type : 'post',
		url : 'd_getsquad.php',
		cache:false,
		success : function(msg){
			$('.squad-players').html(msg);
		}
	});
	return false;
}

function showTeam()
{
	$.ajax({
		type : 'post',
		url : 'd_getteamlist.php',
		cache:false,
		success : function(msg){
			$('.team_subs').html(msg);
		}
	});
	return false;
}

function showTeamDetails()
{
	$.ajax({
		type : 'post',
		url : 'd_getteamdetails.php',
		cache:false,
		success : function(msg){
			$('.team_info').html(msg);
		}
	});
	return false;
}

function showTransferList()
{
	$.ajax({
		type : 'post',
		url : 'd_gettransfers.php',
		cache:false,
		success : function(msg){
			$('#transfer_display').html(msg);
		}
	});
	return false;
}

function clicked()
{
	swal({
		type:'success',
		title: 'Player Added Successfully'
	});
}

function failed()
{
	swal({
		type:'error',
		title: 'Not Enough Balance'
	});
}

function removed()
{
	swal({
		type:'success',
		title: 'Player Removed'
	});
}

function oops()
{
	swal({
		type:'success',
		title: 'Player Removed'
	});
}

function Exceeded()
{
	swal({
		type:'warning',
		title:'Maximum number of players for this position selected'
	});
}


function openteam()
{
	$('.loader').load('d_getteam.php');
}

function info(id)
{
	var datastring = 'id='+id;
	$.ajax({
		type:'POST',
		url:'f_getinfo.php',
		data:datastring,
		beforeSend:function(){
			swal({ title:'Please Wait',html:'<i class="fa fa-spinner fa-spin fa-3x"></i>',allowOutsideClick:false, allowEscapeKey:false, allowEnterKey:false, showConfirmButton:false  });
		},
		success:function(msg){
			swal.close();
			swal({
                        html:''+msg+''
			});
		}
	});
	return false;
}

function swap(swap_id)
{
	var datastring = 'swap_id='+swap_id; 
	$.ajax({
		type:'POST',
		url:'f_swap.php',
		data:datastring,
		beforeSend:function(){
                        bootbox.hideAll();
			swal({ title:'Please Wait',html:'<i class="fa fa-spinner fa-spin fa-3x"></i>',allowOutsideClick:false, allowEscapeKey:false, allowEnterKey:false, showConfirmButton:false  });
		},
		success:function(msg)
		{
			var feedback = String(msg);
			if(feedback == 'success')
			{
				swal.close();
				swal({
					title:'Substitution Successful',
					type:'success'
				});
				showTeamDetails();
				showTeam();
			}
			else
			{
				swal.close();
				bootbox.alert({message:msg});
			}
		}
	});
}

function transfer_swap(swap_id)
{
	var datastring = 'swap_id='+swap_id; 
	$.ajax({
		type:'POST',
		url:'f_transferswap.php',
		data:datastring,
		beforeSend:function()
		{
                        bootbox.hideAll();
			swal({ title:'Please Wait',html:'<i class="fa fa-spinner fa-spin fa-3x"></i>',allowOutsideClick:false, allowEscapeKey:false, allowEnterKey:false, showConfirmButton:false  });
		},
		success:function(msg)
		{
			var feedback = String(msg);
			if(feedback == 'success')
			{
				bootbox.hideAll();
				swal({
					title:'Transfer Successful',
					type:'success'
				});
				showTeamDetails();
				showTeam();
				showTransferList();
			}
			else if(feedback == 'not enough balance')
			{
				bootbox.hideAll();

				failed();
			}
			else
			{
				bootbox.hideAll();
				bootbox.alert({
					message:msg
				});
			}
		}
	});
}

function cap(id)
{
	var datastring = 'id='+id; 
	$.ajax({
		type:'POST',
		url:'f_cap.php',
		data:datastring,
		beforeSend:function()
		{
			swal({ title:'Please Wait',html:'<i class="fa fa-spinner fa-spin fa-3x"></i>',allowOutsideClick:false, allowEscapeKey:false, allowEnterKey:false, showConfirmButton:false  });
		},
		success:function(msg)
		{
			var feedback = String(msg);
			if(feedback == 'success')
			{
				swal.close();
				swal({
					html:'<h3 class="text-center">Captain Changed<br><i class="fa fa-check" aria-hidden="true" style="color:green;3"></i></h3>',
					type:'success'
				});
				showTeamDetails();
				showTeam();
				showTransferList();
			}
			else
			{
				alert(msg);
			}
		}
	});
}