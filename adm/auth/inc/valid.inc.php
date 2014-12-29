		<link rel="stylesheet" href="adm/auth/css/validationEngine.jquery.css" type="text/css" media="screen" title="no title" charset="utf-8" />
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js" type="text/javascript"></script>
		<script src="adm/auth/script/jquery.validationEngine-en.js" type="text/javascript"></script>
		<script src="adm/auth/script/jquery.validationEngine.js" type="text/javascript"></script>
		
		<!-- AJAX SUCCESS TEST FONCTION	
			<script>function callSuccessFunction(){alert("success executed")}
					function callFailFunction(){alert("fail executed")}
			</script>
		-->
		
		<script>	
		$(document).ready(function() {

			
			$("#contact-form").validationEngine()
		
			
			//$.validationEngine.loadValidation("#date")
			//alert($("#contact-form").validationEngine({returnIsValid:true}))
			//$.validationEngine.buildPrompt("#date","This is an example","error")	 		 // Exterior prompt build example
			//$.validationEngine.closePrompt(".formError",true) 							// CLOSE ALL OPEN PROMPTS
		});
		
		// JUST AN EXAMPLE OF CUSTOM VALIDATI0N FUNCTIONS : funcCall[validate2fields]
		function validate2fields(){
			if($("#first-name").val() =="" ||  $("#last-name").val() == ""){
				return false;
			}else{
				return true;
			}
		}
	</script>