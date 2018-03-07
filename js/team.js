$(document).ready(function(){

	$('table.table-team').css('color','white');
	$('table.table-team').css('background','#2c3e50');

	if($(window).width() > 992)
	{	
				$('table.table-team').css("width","100%");
				$('table.table-team').css("font-size","14px");
	}
	else if($(window).width() < 768)
	{
				$('table.table-team').css("font-size","10px");
				$('table.table-team').css("width","100%");
	}
	else
	{
				$('table.table-team').css("width","100%");
				$('table.table-team').css("font-size","12px");
	}

	$(window).resize(function(){
		if($(window).width() > 992)
			{	
				$('table.table-team').css("width","100%");
				$('table.table-team').css("font-size","14px");
			}
		else if($(window).width() < 768)
			{
				$('table.table-team').css("font-size","10px");
				$('table.table-team').css("width","100%");
			}
		else
			{
				$('table.table-team').css("width","100%");
				$('table.table-team').css("font-size","12px");
			}
	});
});

function subs(id)
{
	var datastring = 'id='+id;
	$.ajax({
		type:'POST',
		url:'f_getsubs.php',
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
}


