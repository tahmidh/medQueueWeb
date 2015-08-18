<!--main js file start-->
<script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/selectnav.min.js"></script>
<script type="text/javascript" src="js/owl.carousel.js"></script>
<script type="text/javascript" src="js/jquery.bxslider.js"></script>
<script type="text/javascript" src="js/jsDatePick.min.1.3.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
<script type="text/javascript" src="app.js"></script>
<script type="text/javascript">
$(document).ready(function($) {
//color picker for body background
		$('#picker').colpick({
			layout:'hex',
			submit:0,
			colorScheme:'dark',
			onChange:function(hsb,hex,rgb,el,bySetColor) {
				$(el).css('border-color','#'+hex);
				$('body').css('background-color','#'+hex);
				//$(el).css('background-color','#'+hex);
				// Fill the text box just if the color was set using the picker, and not the colpickSetColor function.
				if(!bySetColor) $(el).val(hex);
			}
			}).keyup(function(){
				$(this).colpickSetColor(this.value);
    	  });
});		  
</script>
<script type="text/javascript" src="css/colorpicker/js/colpick.js"></script>
<!--main js file end-->
</body>
</html>
