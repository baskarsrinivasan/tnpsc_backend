$(document).ready(function() 
{ 
	if(base_url()=='https://cloudzoot.com/demo/ontime/mypro/backend/admin/')
	{
		var base_url = base_url();
	}
	else
	{
		var base_url = base_url();		
	}
	var start = moment().subtract(29, 'days');
	var end = moment();
	var datatable_base_url = base_url+'dashboard/datatable/';
	var start_date = start.format('YYYY-MM-DD');
	var end_date = end.format('YYYY-MM-DD');



	var loader = base_url+'assets/images/ajax-loader_dark.gif';
	var datatable_url = datatable_base_url+start_date+'/'+end_date;
	var columns = [{ "data": "orderno" },{ "data": "name" },{ "data": "applicantname" },{ "data": "grandtotal" },{ "data": "receipt_no" },{ "data": "orderdate" }];
	var jsondata = function(sSource, aoData, fnCallback){$.ajax({'dataType':'json','type'    : 'POST','url'     : sSource,'data'    : aoData,'success' : fnCallback});};
    var fnSettings = {"bProcessing": true,"responsive": true,"fixedHeader":true,"sAjaxSource": datatable_url,"bJQueryUI": true,destroy: true,"sScrollX": "100%","sPaginationType": "full_numbers","iDisplayStart ":200,"order": [],"columns": columns,"oLanguage": {"sProcessing": "<img src="+loader+">",},fnServerData: jsondata};
    var datatable = $('#dmstable').DataTable(fnSettings);
    $('#stat1').hide();
    $('#stat2').hide();
    $('#stat3').hide();
    $('#stat4').hide();
    $('#arrow1').hide();
    $('#arrow2').hide();
    $('#arrow3').hide();
    $('#arrow4').hide();



	function base_url() {
	    var pathparts = location.pathname.split('/');
	    if (location.host == 'localhost') 
	    {
	        var url = location.origin+'/'+pathparts[1].trim('/')+'/';
	    }else{
	        var url = location.origin;
	    }
	    console.log("base_url "+url);
	    return url;
	}

	function getRandomColor() 
	{
		const colors = ['#F44336','#FFEBEE','#FFCDD2','#EF9A9A','#E57373','#EF5350','#E53935','#D32F2F','#C62828','#B71C1C','#FF8A80','#FF5252','#FF1744','#D50000','#FCE4EC','#F8BBD0','#F48FB1','#F06292','#EC407A','#E91E63','#D81B60','#C2185B','#AD1457','#880E4F','#FF80AB','#FF4081','#F50057','#C51162','#F3E5F5','#E1BEE7','#CE93D8','#BA68C8','#AB47BC','#9C27B0','#8E24AA','#7B1FA2','#6A1B9A','#4A148C','#EA80FC','#E040FB','#D500F9','#AA00FF','#EDE7F6','#D1C4E9','#B39DDB','#9575CD','#7E57C2','#673AB7','#5E35B1','#512DA8','#4527A0','#311B92','#B388FF','#7C4DFF','#651FFF','#6200EA','#E8EAF6','#C5CAE9','#9FA8DA','#7986CB','#5C6BC0','#3F51B5','#3949AB','#303F9F','#283593','#1A237E','#8C9EFF','#536DFE','#3D5AFE','#304FFE','#E3F2FD','#BBDEFB','#90CAF9','#64B5F6','#42A5F5','#2196F3','#1E88E5','#1976D2','#1565C0','#0D47A1','#82B1FF','#448AFF','#2979FF','#2962FF','#E1F5FE','#B3E5FC','#81D4FA','#4FC3F7','#29B6F6','#03A9F4','#039BE5','#0288D1','#0277BD','#01579B','#80D8FF','#40C4FF','#00B0FF','#0091EA','#E0F7FA','#B2EBF2','#80DEEA','#4DD0E1','#26C6DA','#00BCD4','#00ACC1','#0097A7','#00838F','#006064','#84FFFF','#18FFFF','#00E5FF','#00B8D4','#E0F2F1','#B2DFDB','#80CBC4','#4DB6AC','#26A69A','#009688','#00897B','#00796B','#00695C','#004D40','#A7FFEB','#64FFDA','#1DE9B6','#00BFA5','#E8F5E9','#C8E6C9','#A5D6A7','#81C784','#66BB6A','#4CAF50','#43A047','#388E3C','#2E7D32','#1B5E20','#B9F6CA','#69F0AE','#00E676','#00C853','#F1F8E9','#DCEDC8','#C5E1A5','#AED581','#9CCC65','#8BC34A','#7CB342','#689F38','#558B2F','#33691E','#CCFF90','#B2FF59','#76FF03','#64DD17','#F9FBE7','#F0F4C3','#E6EE9C','#DCE775','#D4E157','#CDDC39','#C0CA33','#AFB42B','#9E9D24','#827717','#F4FF81','#EEFF41','#C6FF00','#AEEA00','#FFFDE7','#FFF9C4','#FFF59D','#FFF176','#FFEE58','#FFEB3B','#FDD835','#FBC02D','#F9A825','#F57F17','#FFFF8D','#FFFF00','#FFEA00','#FFD600','#FFF8E1','#FFECB3','#FFE082','#FFD54F','#FFCA28','#FFC107','#FFB300','#FFA000','#FF8F00','#FF6F00','#FFE57F','#FFD740','#FFC400','#FFAB00','#FFF3E0','#FFE0B2','#FFCC80','#FFB74D','#FFA726','#FF9800','#FB8C00','#F57C00','#EF6C00','#E65100','#FFD180','#FFAB40','#FF9100','#FF6D00','#FBE9E7','#FFCCBC','#FFAB91','#FF8A65','#FF7043','#FF5722','#F4511E','#E64A19','#D84315','#BF360C','#FF9E80','#FF6E40','#FF3D00','#DD2C00','#EFEBE9','#D7CCC8','#BCAAA4','#A1887F','#8D6E63','#795548','#6D4C41','#5D4037','#4E342E','#3E2723','#FAFAFA','#F5F5F5','#EEEEEE','#E0E0E0','#BDBDBD','#9E9E9E','#757575','#616161','#424242','#212121','#ECEFF1','#CFD8DC','#B0BEC5','#90A4AE','#78909C','#607D8B','#546E7A','#455A64','#37474F','#263238','#000000'];
	    var color = colors[Math.floor(Math.random() * colors.length)];
	    return color;
	}

	function getReportRange() 
	{
		var start = moment();
	    var end = moment().add(30,'days');


	    function cb(start, end) {

	        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
			var start_date = start.format('YYYY-MM-DD');
			var end_date = end.format('YYYY-MM-DD');
			console.log("start_date "+start_date);
			console.log("end_date "+end_date);

			//Initiate Bargraph
			var difference = end.diff(start, 'days');
			if(difference < 31 || difference==0)
			{
				getLineGraphDateWise(start_date,end_date);
			}
			else
			{
				console.log("MONTH: "+start_date+" - "+end_date);
				getLineGraphMonthWise(start_date,end_date);
			}
			datatable.destroy();
			fnSettings.sAjaxSource  = datatable_base_url+start_date+'/'+end_date;
          	datatable = $('#dmstable').DataTable(fnSettings);
          	$('#report_range_text').empty();
          	$('#report_range_text').append('Showing report from <strong>'+start.format('MMMM D, YYYY')+'</strong> to <strong>'+end.format('MMMM D, YYYY')+'</strong>');
          	getCounts(start_date,end_date);
          	getChatbotCounts(start_date,end_date,'301');
          	typeCounts(start_date,end_date,'New','#statdata2');
          	typeCounts(start_date,end_date,'Re-visit','#statdata3');
	    }

	    $('#reportrange').daterangepicker({
	        startDate: start,
	        endDate: end,
	        ranges: {
	           'Today': [moment(), moment()],
	           'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
	           'Last 7 Days': [moment().subtract(6, 'days'), moment()],
	           'Last 30 Days': [moment().subtract(29, 'days'), moment()],
	           'This Month': [moment().startOf('month'), moment().endOf('month')],
	           'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
	        }
	    }, cb);

	    cb(start, end);
	}

	function getLineGraphDateWise(start,end) 
	{
		console.log(base_url+'/graph/appointments/areaDateWise_dashboard/'+start+'/'+end);
		var labels = [];
		var dataXXX = [];
		var dataYYY = [];
		var bgColor = [];

		$.ajax({
		    type: 'GET',
		    url: base_url+'/graph/appointments/areaDateWise_dashboard/'+start+'/'+end,
		    dataType: 'json',
		    success: function(field) 
		    {


		      for (var i = 0; i < field.length; i++) 
		      {
		        var d = new Date(field[i].appointment_date);
		        const dtf = new Intl.DateTimeFormat('en', { year: 'numeric', month: 'short', day: '2-digit' }) 
		        const [{ value: mo },,{ value: da },,{ value: ye }] = dtf.formatToParts(d) 
		        labels.push(da+" "+mo);
		        dataXXX.push(field[i].appointment_date);
		        dataYYY.push(field[i].total);
		        bgColor.push('#f8b425');

		      }
		      

		      var ctx = document.getElementById("myChart").getContext('2d');
		      var myChart = new Chart(ctx, {
		        type: 'line', 
		        fill: true,
		        backgroundColor: '#f8b425',      
		        data: {
		          labels: labels,
		          datasets: [{
		              label: 'Date',
		              data: dataXXX,
		            },
		            {
		              label: 'Appointments',
		              backgroundColor: '#ec4561',
		              borderColor: '#f8b425',
		              data: dataYYY,
		              backgroundColor: '#f8b4256e',
		            },
		          ]
		        },
		        options: {
		            scales: {
		              yAxes: [{
		                ticks: {
		                  beginAtZero: true,
		                  callback: function(value) {if (value % 1 === 0) {return value;}}
		                }
		              }]
		            },
		        }
		      });
		    }
		});
	}

	function getLineGraphMonthWise(start,end)
	{
		console.log(base_url+'/graph/appointments/areaMonthWise_dashboard/'+start+'/'+end);
		var labels = [];
		var dataXXX = [];
		var dataYYY = [];
		var bgColor = [];

		$.ajax({
		    type: 'GET',
		    url: base_url+'/graph/appointments/areaMonthWise_dashboard/'+start+'/'+end,
		    dataType: 'json',
		    success: function(field) 
		    {
			    for (var i = 0; i < field.length; i++) 
			    {
			        dataXXX.push(field[i].lable);
			        dataYYY.push(field[i].total);
			        bgColor.push('#f8b425');
			    }
		      	var ctx = document.getElementById("myChart").getContext('2d');
		      	let chartdata = {
                    labels: [...dataXXX],
                    datasets: [{
                        label: 'Month',
                        backgroundColor: [
				          'rgba(255, 99, 132, 0.2)',
				          'rgba(54, 162, 235, 0.2)',
				          'rgba(255, 206, 86, 0.2)',
				          'rgba(75, 192, 192, 0.2)',
				          'rgba(153, 102, 255, 0.2)',
				          'rgba(255, 159, 64, 0.2)'
				        ],
				        borderColor: [
				          'rgba(255, 99, 132, 1)',
				          'rgba(54, 162, 235, 1)',
				          'rgba(255, 206, 86, 1)',
				          'rgba(75, 192, 192, 1)',
				          'rgba(153, 102, 255, 1)',
				          'rgba(255, 159, 64, 1)'
				        ],
				        borderWidth: 1,
                        data: [...dataYYY]
                    }]
                };
                let barGraph = new Chart(ctx, {
                    type: 'bar',
                    data: chartdata,
                    options: {
				      scales: {
				        yAxes: [{
				          ticks: {
				            beginAtZero: true,
				            min:0
				          }
				        }]
				      }
				    }
                });
		    }
		});
	}

	function getCounts(start,end) {
		$.ajax({
		    type: 'GET',
		    url: base_url+'/graph/appointments/dateWiseCounts/'+start+'/'+end,
		    dataType: 'json',
		    success: function(data) {
		    	$('#statdata1').html(data);

		    },
		    error: function(){

		    }
		});
	}

	function getChatbotCounts(start,end) {
		$.ajax({
		    type: 'GET',
		    url: base_url+'/graph/appointments/sourceCounts/'+start+'/'+end+'/301',
		    dataType: 'json',
		    success: function(data) {
		    	$('#statdata4').html(data);

		    },
		    error: function(){

		    }
		});
	}

	function typeCounts(start,end,type,id) {

		console.log(base_url+'/graph/appointments/typeCounts/'+start+'/'+end+'/'+type);
		$.ajax({
		    type: 'GET',
		    url: base_url+'/graph/appointments/typeCounts/'+start+'/'+end+'/'+type,
		    dataType: 'json',
		    success: function(data) {
		    	console.log(type+''+data);
		    	$(id).html(data);

		    },
		    error: function(){

		    }
		});
	}

	




	getReportRange();

	
	
});