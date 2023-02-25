$(document).ready(function(){
	$(".get-tattoo-btt").on('click',function(){
		let tattoo_id = $(this).attr("data-tattoo-id");
		$.ajax({
			type:'GET',
			url:'/cart/add/' + tattoo_id,
			success:function(data){
				if(data == 1){
					let message = new MessageOnTop("Tattoo was added to cart");
					message.Create(message.CONFIG.SUCCESS_BOOTSTRAP_CLASS);
					let sd = $(".nav-shop__circle").text().replace(/[^0-9]/gi,'');
					var num = parseInt(sd) + 1;
					$(".nav-shop__circle").text(num);
					return;
				}
				if(data == -2){
					let message = new MessageOnTop("Maybe tattoo was added");
					message.Create(message.CONFIG.DANGER_BOOTSTRAP_CLASS);
					return;
				}
				if(data == -1){
					let message = new MessageOnTop("This tattoo is not exist");
					message.Create(message.CONFIG.ALERT_BOOTSTRAP_CLASS);
					return;
				}
				if(data == -3){
					let message = new MessageOnTop("Maximum 5 tattoo in once");
					message.Create(message.CONFIG.ALERT_BOOTSTRAP_CLASS);
					return;
				}
			},
			error:function(jqXHR,exception){
				console.log(jqXHR.responseText);
			}
		});
	});
});


function MessageOnTop(message){
	this.message = message;
}

MessageOnTop.prototype.CONFIG = {
	ALERT_BOOTSTRAP_BASIC: "alert alert-dismissible",
	ALERT_BOOTSTRAP_CLASS: "alert-warning",
	DANGER_BOOTSTRAP_CLASS: "alert-danger",
	SUCCESS_BOOTSTRAP_CLASS:"alert-success",
	timeToExist: 2000,
	effectTime:500,
	usingEffect:true
}

MessageOnTop.prototype.Create = function(type){
	var div = document.createElement("div");

	$(div).addClass(this.CONFIG.ALERT_BOOTSTRAP_BASIC + " " +  type);

	$(div).addClass("fixed-top");

	$(div).html(this.message);

	var closeButton = document.createElement("button");
	$(closeButton).attr("type","button");
	$(closeButton).addClass("close");
	$(closeButton).attr("data-dismiss","alert");
	$(closeButton).html("&times;");

	$(div).append(closeButton);

	$('body').append(div);

	var that = this;

	setTimeout(function(){
		that.Destroy(div);
	},this.CONFIG.timeToExist);
}

MessageOnTop.prototype.Destroy = function(messageContainer){
	if(this.CONFIG.usingEffect){
		$(messageContainer).fadeOut(this.CONFIG.effectTime,function(){
			$(messageContainer).remove();
		});
	}else{
		$(messageContainer).remove();
	}
}