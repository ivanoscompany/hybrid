<script>
	$(document).ready(function () {
		$('#sidebarCollapse').on('click', function () {
			$('#sidebar').toggleClass('active');
		});
	});
	
	function lestAjax(p, f, m, d, b){
		$.ajax({
			method:'POST',
			url: "<?php echo set::url('ajax.php'); ?>",
			data:{
				PlugName:p,
				FileName:f,
				Method:m,
				DataResult:JSON.stringify(d)
			},
			success: function(result){
				if(b){
					$(b).html(result);
				}
			}
		});
	}
	
	function run(data){
		if(data){
			var Plugin = data.plugin;
			var Controller = data.controller;
			var Method = data.method;
			var Massive = data.massive;
			var Back = data.back;
			
			if(!Plugin){ Plugin = 'Index'; }
			if(!Controller){ Controller = 'index'; }
			if(!Method){ Method = 'run'; }
			if(!Back){ Back = 'body'; }
			if(!Massive){ Massive = {}; }
			
			lestAjax(Plugin, Controller, Method, Massive, Back);
		} else {
			lestAjax('Index', 'index', 'run', {}, 'body');
		}
	}
</script>