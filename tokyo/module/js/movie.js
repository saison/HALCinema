// JavaScript Document
var flag=0;
$(function(){

		$("#coming").hide();
	
$("#nowMovie").click(
	function(){
		
		if(flag==1){
				$("#coming").hide();	
			$("#now").show(500);	
			flag=0;
		}
	
	}
);
$("#comeMovie").click(
	function(){
		
		if(flag==0){
			$("#coming").show(500);	
			$("#now").hide();	
			flag=1;
		}
	
	}
);

});//$(function