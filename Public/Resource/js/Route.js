function run(
	pluginName 		= 'Index', 
	controllerName 	= 'Index',
	metodName		= 'run',
	className 		= 'body', 
	DateMassive 	= {}
){
	if(pluginName 		== ""){ pluginName 		= 'Index' }
	if(metodName 		== ""){ metodName 		= 'run' }
	if(className 		== ""){ className 		= 'body' }
	if(DateMassive 		== ""){ DateMassive 	= {} }
	if(controllerName 	== ""){ controllerName 	= 'Index' }
	$.ajax({
		method:'POST',
		url: "ajax.php",
		data:{
			PlugName:pluginName,
			FileName:controllerName,
			Method:metodName,
			DataResult:JSON.stringify(DateMassive)
		},
		success: function(result){
			$(className).html(result);
		}
	});
}
