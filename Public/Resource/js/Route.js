function RouteSettings(pluginName, controllerName, metodName, className, DateMassive){
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
function run(Massive, DateMassive){
	if(Massive == undefined || Massive == ""){
		Massive = 'Index';
	}
	checkPluginName = Massive.split("/");
	if(checkPluginName.length == 1){
		splitClass = Massive.split("<");
		pluginName = splitClass[0];
		controllerName = 'Index';
		metodName = 'run'; 
		className = splitClass[1];
		if(className === undefined){
			className = 'body';
		}
		RouteSettings(pluginName, controllerName, metodName, className, DateMassive);
	} else {
		pluginNameSplit = checkPluginName[1].split("<");
		pluginName = checkPluginName[0];
		if(pluginNameSplit[1] === undefined || pluginNameSplit[1] == ""){
			className = 'body';
		}else {
			className = pluginNameSplit[1];
		}
		if(pluginNameSplit[0]==""){
			controllerName = 'Index';
			metodName = 'run'; 
			RouteSettings(pluginName, controllerName, metodName, className, DateMassive);
		} else {
			splitControllerName = pluginNameSplit[0].split("@");
			if(splitControllerName.length == 1){
				controllerName = splitControllerName;
				metodName = 'run';
				RouteSettings(pluginName, controllerName, metodName, className, DateMassive);
			} else {
				if(splitControllerName[1] == "" && splitControllerName[0] == ""){
					controllerName = 'Index';
					metodName = 'run';
					RouteSettings(pluginName, controllerName, metodName, className, DateMassive);
				} else if(splitControllerName[0] == ""){
					controllerName = 'Index';
					metodName = splitControllerName[1];
					RouteSettings(pluginName, controllerName, metodName, className, DateMassive);
				} else if(splitControllerName[1] == ""){
					controllerName = splitControllerName[0];
					metodName = 'run';
					RouteSettings(pluginName, controllerName, metodName, className, DateMassive);
				} else {
					controllerName = splitControllerName[0];
					metodName = splitControllerName[1];
					RouteSettings(pluginName, controllerName, metodName, className, DateMassive);
				}
			}
		}
	}

}
