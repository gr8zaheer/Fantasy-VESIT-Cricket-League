$(document).ready(function(){
	$('.click_select').click(function(event){
		console.log(4);
		var index = $('.click_select').index(this);
		var id = Number($('.p_id:eq('+index+')').html());
		var name = String($('.p_name:eq('+index+')').html());
		var team = String($('.p_team:eq('+index+')').html());
		var price = Number($('.p_price:eq('+index+')').html());
		var points = Number($('.p_points:eq('+index+')').html());
		var position = String($('.p_position:eq('+index+')').html());
		var datastring = 'id='+ id;
		$.ajax({
			type : 'post',
			url : 'f_addplayer.php',
			data : datastring,
			cache:false,
			
                      beforeSend:function(){
			swal({ title:'Please Wait',html:'<i class="fa fa-spinner fa-spin fa-3x"></i>',allowOutsideClick:false, allowEscapeKey:false, allowEnterKey:false, showConfirmButton:false  });
		},
			success : function(msg){
				var feedback = String(msg);
				if(feedback=='success')
				{
					bootbox.hideAll();
					clicked();
					show();
					showDetails();
					showNumber();
					showSquad();
				}
				else if(feedback=='not enough balance')
				{
					bootbox.hideAll();
					failed();
				}
				else if(feedback=='Number Exceeded')
				{
					bootbox.hideAll();
					Exceeded();
				}
			}
	});
		
		event.preventDefault();
	});

	if($(window).width() > 992)
	{	
		$('table#player_table,.select-info').css("width","30vw");
		$('table#player_table,.select-info').css("margin-left","-15px");
		$('table#player_table').css("font-size","11px");
	}
	else if($(window).width() < 768)
	{
		$('table#player_table,.select-info').css("margin-left","-10px");
		$('table#player_table').css("font-size","7px");
		$('table#player_table,select-info').css("width","70vw");
	}
	else
	{
		$('table#player_table,.select-info').css("width","74vw");
		$('table#player_table').css("font-size","10px");
		$('table#player_table,.select-info').css("margin-left","0px;");
	}

	$(window).resize(function(){
		if($(window).width() > 992)
			{	
				$('table#player_table,.select-info').css("width","30vw");
				$('table#player_table,.select-info').css("margin-left","-15px");
				$('table#player_table').css("font-size","11px");
			}
		else if($(window).width() < 768)
			{
				$('table#player_table,.select-info').css("margin-left","-10px");
				$('table#player_table').css("font-size","7px");
				$('table#player_table,select-info').css("width","70vw");
			}
		else
			{
				$('table#player_table,.select-info').css("width","74vw");
				$('table#player_table').css("font-size","12px");
				$('table#player_table,.select-info').css("margin-left","0px;");
			}
	});

	$('table#player_table tr.click td span.click_select').css("color","#00cc00")

	$('table#player_table tr.click').hover(function(){
		$(this).css("background-color","#4d0038");
	},function(){
		$(this).css("background-color","#800060");
	});

	$('table#table_squad tr.click').hover(function(){
		$(this).css("background-color","#4d0038");
	},function(){
		$(this).css("background-color","#800060");
	});

	$('table#player_table tr.click td span.p_info').hover(function(){
		$(this).css("color","grey");
	},function(){
		$(this).css("color","white");
	});

	$('table#player_table tr.click td span.click_select').hover(function(){
		$(this).css("color","#00ff00");
	},function(){
		$(this).css("color","#00cc00");
	});

	$('table#player_table tr td').css("cursor","pointer");

	$('.p_info').click(function(){
		var index = $('.p_info').index(this);
		var id = Number($('.p_id:eq('+index+')').html());
		info(id);
	});
});