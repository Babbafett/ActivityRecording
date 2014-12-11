// hide some elements
$(document).ready(function() {
	$("#formSelectProject").hide();
	$("#formSelectJob").hide();
	$("#recordData").hide();
});

// register event handler for customer select
$('#selectCustomer').change(function() {
	handleSelectCustomer();
});

function handleSelectCustomer() {
	// alert( "Handler for .change() called." );

	// if customer is changed, delete job select option
	$("#formSelectJob").hide();
	$('#divSelectJob').html('');
	$("#recordData").hide();
	
	$.ajax({
		url : '../php/getProjects.php',
		type : 'POST',
		data : {
			'k_id' : $('#selectCustomer').val()
		},
		success : function(data) {
			if (data) {
				$("#formSelectProject").show();
				$('#divSelectProject').html(data);
				// register event handler for project select
				$("#selectProject").change(function() {
					handleSelectProject();
				});
			} else {
				alert(data);
			}
		}
	});
}

function handleSelectProject() {
	
	// if project is changed, delete job select option
	$("#formSelectJob").hide();
	$('#divSelectJob').html('');
	$("#recordData").hide();
	
	$.ajax({
		url : '../php/getJobs.php',
		type : 'POST',
		data : {
			'p_id' : $('#selectProject').val()
		},
		success : function(data) {
			if (data) {
				$("#formSelectJob").show();
				$('#divSelectJob').html(data);
				// register event handler for job select
				$("#selectJob").change(function() {
					handleSelectJob();
				});
			} else {
				alert(data);
			}
		}
	});
}

function handleSelectJob() {
//	alert( "Handler for .change() called." );
	$("#recordData").show();
}