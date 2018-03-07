$(document).ready(function(){

	$('.remove-player').css("color","red");

	$('.remove-player').hover(function(){
		$(this).css("color","#b30000");
	},function(){
		$(this).css("color","red");
	});

	$('.s_info').hover(function(){
		$(this).css("color","#4dc3ff");
	},function(){
		$(this).css("color","white");
	});

	$('.remove-player').click(function(event){
		var index = $('.remove-player').index(this);
		var id = Number($('.s_id:eq('+index+')').html());
		var datastring = 'id='+ id;
		$.ajax({
			type : 'post',
			url : 'f_remove.php',
			data : datastring,
			cache:false,
			beforeSend:function(){
			swal({ title:'Please Wait',html:'<i class="fa fa-spinner fa-spin fa-3x"></i>',allowOutsideClick:false, allowEscapeKey:false, allowEnterKey:false, showConfirmButton:false  });
		},
			success : function(msg){
				var feedback = String(msg);
				if(feedback=='deleted')
				{
                                        swal.close();
					removed();
					show();
					showDetails();
					showNumber();
					showSquad();
				}
				else if(feedback=='not successful')
				{
					oops();
				}
			}
	});
		event.preventDefault();
	});

	$('table#table-squad').css('color','white');
	$('table#table-squad').css('border-radius','3px');

	$('#table-wrapper').css('background','#2c3e50');

	if($(window).width() > 992)
	{	
				$('table#table-squad').css("width","100%");
				$('table#table-squad').css("font-size","14px");
	}
	else if($(window).width() < 768)
	{
				$('table#table-squad').css("font-size","10px");
				$('table#table-squad').css("width","100%");
	}
	else
	{
				$('table#table-squad').css("width","100%");
				$('table#table-squad').css("font-size","12px");
	}

	$(window).resize(function(){
		if($(window).width() > 992)
			{	
				$('table#table-squad').css("width","100%");
				$('table#table-squad').css("font-size","14px");
			}
		else if($(window).width() < 768)
			{
				$('table#table-squad').css("font-size","10px");
				$('table#table-squad').css("width","100%");
			}
		else
			{
				$('table#table-squad').css("width","100%");
				$('table#table-squad').css("font-size","12px");
			}
	});

	$('button.make_team').click(function(){
			if($(this).hasClass('disabled').toString() == 'false')
			{
				$(this).addClass('disabled');
				$.ajax({
					type : 'post',
					url : 'f_changestatus.php',
					cache:false,

					beforeSend : function()
					{
						$('button.make_team').html("<span class='fa fa-spinner'></span>&nbsp;Please Wait");
					},
					success : function(msg)
					{
						var feedback = String(msg);
						if(feedback == 'Success')
						{
							location.reload();
						}
						else
						{
							swal({
								type : 'info',
                                                                html : ''+msg+''
							});
						}
					}
			});
		}
});

$('li#team_squad a').click(function(){
	$('.loader').load('d_getteam.php'); 
	return false;
});


$('.s_info').click(function(){
	var index = $('.s_info').index(this);
	var id = Number($('.s_id:eq('+index+')').html());
	info(id);
});

});

function wait()
{
	swal({ title:'Please Wait',html:'<i class="fa fa-spinner fa-spin fa-3x"></i>',allowOutsideClick:false, allowEscapeKey:false, allowEnterKey:false, showConfirmButton:false  });
}
