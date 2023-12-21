<script>

var timer = 4000;

var i = 0;
var max = $('#c > li').length;
 
	$("#c > li").eq(i).addClass('active').css('left','25%');
	$("#c > li").eq(i + 1).addClass('active').css('left','50%');
	$("#c > li").eq(i + 2).addClass('active').css('left','75%');
	
 

	setInterval(function(){ 

		$("#c > li").removeClass('active');

		$("#c > li").eq(i).css('transition-delay','0.25s');
		$("#c > li").eq(i + 1).css('transition-delay','0.5s');
		$("#c > li").eq(i + 2).css('transition-delay','0.75s');

		if (i < max-3) {
			i = i+3; 
		}

		else { 
			i = 0; 
		}  

		$("#c > li").eq(i).css('left','25%').addClass('active').css('transition-delay','1.25s');
		$("#c > li").eq(i + 1).css('left','50%%').addClass('active').css('transition-delay','1.5s');
		$("#c > li").eq(i + 2).css('left','75%%').addClass('active').css('transition-delay','1.75s');
		
	
	}, timer);

    </script>