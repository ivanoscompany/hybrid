function run(
	metodName		= 'run',
	pluginName 		= 'Index',
	DateMassive 	= {}, 
	controllerName 	= 'Index'
){
	if(pluginName 		== ""){ pluginName 		= 'Index' }
	if(metodName 		== ""){ metodName 		= 'run' }
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
			$('body').html(result);
		}
	});
}
