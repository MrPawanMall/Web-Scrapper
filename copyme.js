//Developed by Giri Annamalai M 
//This is simple jquery plugin to copy the text inside a text box or textarea.
//Its simple code to starters who want to create jquery plugins on their own.
//Happy Coding!
 
	$.fn.copyme = function() {
	 			$('span[id^="success-alert"]').remove();
	 				this.select();
	 				 $(this).focus();
                      document.execCommand("copy");
                     document.getSelection().removeAllRanges();
                 $(this).after('<span id="success-alert" style="color: green;position: absolute;top: 30%;left: 28%;font-size: 45px;font-weight: bolder;text-shadow: #000 0px 0px 1px;"><br><span class="glyphicon glyphicon-copy"></span> Copied to clipboard</span>');
    			//$('#success-alert').css( "color", "green" );
    			$('#success-alert').delay(1000).fadeOut();
	};
	
