if($(window).width() > 992)
	{	
				$('table#trans_table').css("width","100%");
				$('table#trans_table').css("font-size","12px");
	}
	else if($(window).width() < 768)
	{
				$('table#trans_table').css("font-size","10px");
				$('table#trans_table').css("width","100%");
	}
	else
	{
				$('table#trans_table').css("width","100%");
				$('table#trans_table').css("font-size","12px");
	}

	$(window).resize(function(){
		if($(window).width() > 992)
			{	
				$('table#trans_table').css("width","100%");
				$('table#trans_table').css("font-size","12px");
			}
		else if($(window).width() < 768)
			{
				$('table#trans_table').css("font-size","10px");
				$('table#trans_table').css("width","100%");
			}
		else
			{
				$('table#trans_table').css("width","100%");
				$('table#trans_table').css("font-size","12px");
			}
	});


function info2(id)
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


function transfer(id)
{
	var datastring = 'id='+id;
	$.ajax({
		type:'POST',
		url:'f_gettrans.php',
		data:datastring,
		beforeSend:function(){
			swal({ title:'Please Wait',html:'<i class="fa fa-spinner fa-spin fa-3x"></i>',allowOutsideClick:false, allowEscapeKey:false, allowEnterKey:false, showConfirmButton:false  });
		},
		success:function(msg){
			swal.close();
			bootbox.dialog({
				message:msg,
			});
		}
	});
	return false;
}
