<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script type="text/javascript" src="chat.js"></script>
<div id="page-wrap" onload="setInterval('chat.update()', 1000)">
    <form action="index.php" method="post">
    <span id="name-area"></span>
	<input type="submit" name="logout" value="logout">
	</form>
    
    <div id="chat-wrap"><div id="chat-area"></div></div>
    
    <form id="send-message-area">
        <p>Your message: </p>
        <textarea id="sendie" maxlength = '100' ></textarea>
    </form>  
	<script type="text/javascript">
		var name = '<?php echo $_SESSION["userInfo"]["username"]; ?>';
		//display name on page
		$("span#name-area").html("You are logged in as: " + name);   
		// kick off chat
		var chat =  new Chat();
		$(function() {
			chat.getState(); 
			// watch textarea for key presses
			$("#sendie").keydown(function(event) {  
				var key = event.which;  
				if (key >= 33) {
					var maxLength = $(this).attr("maxlength");  
					var length = this.value.length;                 
					// don't allow new content if length is maxed out
					if (length >= maxLength) {  
						event.preventDefault();  
					}
				}                                                                                                                                                                                                       });
				// watch textarea for release of key press
				$('#sendie').keyup(function(e) {
					if (e.keyCode == 13) {
						var text = $(this).val();
						var maxLength = $(this).attr("maxlength");  
						var length = text.length;
						// send
						if (length <= maxLength + 1) {
							chat.send(text, name);
							$(this).val("");
						} else {
							$(this).val(text.substring(0, maxLength));
						}
					}
				});
			});
	</script>
</div>
