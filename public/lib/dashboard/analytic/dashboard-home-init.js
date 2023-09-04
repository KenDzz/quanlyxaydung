"use strict";

/*--================================--*/
// Users Line Chart
/*--================================--*/


function getRecentDates(numDays) {
    const currentDate = new Date(); // Lấy ngày hiện tại
    const recentDates = [];

    for (let i = 0; i < numDays; i++) {
      const date = new Date(currentDate); // Tạo một bản sao của ngày hiện tại
      date.setDate(currentDate.getDate() - i); // Trừ i ngày
      recentDates.push(date); // Thêm đối tượng Date vào mảng
    }

    // Sắp xếp mảng recentDates theo thứ tự tăng dần
    recentDates.sort((a, b) => a - b);

    // Chuyển đổi các đối tượng Date thành chuỗi ngày tháng năm đã định dạng
    const formattedDates = recentDates.map((date) => {
      const day = date.getDate();
      const month = date.getMonth() + 1; // Tháng trong JavaScript bắt đầu từ 0
      const year = date.getFullYear();
      return `${day}/${month}/${year}`;
    });

    return formattedDates;
  }


  function getData(type) {
    var id = $("#id-project-hidden").val();
    $.ajax({
        url: "/dataworkchart/"+type+"/"+id,
        method: "post",
        dataType: "json",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        beforeSend: function () {
        },
        complete: function () {
        },
    })
    .done(function (data) {
        if(type == 3){
            window.usersLineChart.data.datasets[0].data = data;
            window.usersLineChart.update(); // Cập nhật biểu đồ
        }else if(type == 1){
            window.sessionsLineChart.data.datasets[0].data = data;
            window.sessionsLineChart.update(); // Cập nhật biểu đồ

        }
    })
    .fail(function (jqXHR, ajaxOptions, thrownError) {
    });
  }


  function getDataCount() {
    var id = $("#id-project-hidden").val();
    $.ajax({
        url: "/dataworkchartcount/"+id,
        method: "post",
        dataType: "json",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        beforeSend: function () {
        },
        complete: function () {
        },
    })
    .done(function (data) {
        window.sessionsDeviceDount.data.datasets[0].data = data;
        window.sessionsDeviceDount.update(); // Cập nhật biểu đồ
    })
    .fail(function (jqXHR, ajaxOptions, thrownError) {
    });
  }


window.onload = function () {
	var ctx1 = document.getElementById('usersLineChart').getContext('2d');
    const recentDates = getRecentDates(7);
	window.usersLineChart = new Chart(ctx1, {
		type: 'line',
		data: {
            labels: recentDates,
			datasets: [{
				label: 'Công việc',
				fill: false,
				backgroundColor: '#5c76fb',
				borderColor: '#5c76fb',
				borderWidth: 1,
				data: [0, 0, 0, 0, 0, 0, 0],
			}]
		},
		options: {
			responsive: true,
			tooltips: {
				intersect: true,
				bodyFontSize: 13,
				bodyFontFamily: '"IBM Plex Sans", sans-serif',
			},
			hover: {
				intersect: true
			},
			scales: {
				yAxes: [{
					display: true,
					scaleLabel: {
						display: true,
						labelString: 'Visitors',
						fontColor: '#868DAA',
						fontSize: 13,
						fontStyle: "normal",
						fontFamily: '"IBM Plex Sans", sans-serif',
					},
					ticks: {
						fontColor: '#868DAA',
						fontSize: 13,
						fontStyle: "normal",
						fontFamily: '"IBM Plex Sans", sans-serif',
					},
					gridLines: {
						display: true,
						color: '#eee',
					},
				}],
				xAxes: [{
					display: true,
					ticks: {
						fontColor: '#868DAA',
						fontSize: 13,
						fontStyle: "normal",
						fontFamily: '"IBM Plex Sans", sans-serif',
					},
					gridLines: {
						display: true,
						color: '#eee',
					},
				}],

			},
			legend: {
				display: false,
			},
		}
	});

	/*--================================--*/
	// Session Line Chart
	/*--================================--*/

	var ctx2 = document.getElementById('sessionsLineChart').getContext('2d');
	window.sessionsLineChart = new Chart(ctx2, {
			type: 'line',
			data: {
				labels: recentDates,

				datasets: [{
					label: 'Công việc hoàn thành',
					fill: false,
					backgroundColor: '#5c76fb',
					borderColor: '#5c76fb',
					borderWidth: 1,
					data: [420, 550, 490, 660, 550, 730, 490],
				}]
			},
			options: {
				responsive: true,
				tooltips: {
					intersect: true,
					titleFontSize: 13,
					titleFontFamily: '"IBM Plex Sans", sans-serif',
					bodyFontSize: 13,
					bodyFontFamily: '"IBM Plex Sans", sans-serif',
				},
				hover: {
					intersect: true
				},
				scales: {
					yAxes: [{
						display: true,
						scaleLabel: {
							display: true,
							labelString: 'Visitors',
							fontColor: '#868DAA',
							fontSize: 13,
							fontStyle: "normal",
							fontFamily: '"IBM Plex Sans", sans-serif',
						},
						ticks: {
							fontColor: '#868DAA',
							fontSize: 13,
							fontStyle: "normal",
							fontFamily: '"IBM Plex Sans", sans-serif',
						},
						gridLines: {
							display: true,
							color: '#eee',
						},
					}],
					xAxes: [{
						display: true,
						ticks: {
							fontColor: '#868DAA',
							fontSize: 13,
							fontStyle: "normal",
							fontFamily: '"IBM Plex Sans", sans-serif',
						},
						gridLines: {
							display: true,
							color: '#eee',
						},
					}],

				},
				legend: {
					display: false,
				},
			},
		}

	);

    getData(3);
    getData(1);

	/*--================================--*/
	// Sessions Device Doughnut
	/*--================================--*/

	var value1 = 40;
	var value2 = 60;
	var data = {
		labels: [
			"Công việc đã hoàn thành",
			"Công việc chưa hoàn thành"
		],
		datasets: [{
			data: [value1, value2],
			backgroundColor: [
				"#3355FF",
				"#E0E7FD",
				"#4AC7EC",
				"#FF6384"
			]
		}]
	};

	window.sessionsDeviceDount = new Chart(document.getElementById('sessionsDeviceDount'), {
		type: 'doughnut',
		data: data,
		options: {
			responsive: true,
			legend: {
				display: true,
				position: 'bottom',
				labels: {
					boxWidth: 13,
					fontColor: '#868DAA',
					fontSize: 13,
					fontStyle: "normal",
					fontFamily: '"IBM Plex Sans", sans-serif',
				},
			},
			cutoutPercentage: 80,
			tooltips: {
				fontColor: '#868DAA',
				fontSize: 13,
				fontStyle: "normal",
				fontFamily: '"IBM Plex Sans", sans-serif',
				callbacks: {
					label: function (tooltipItem, data) {
						var dataset = data.datasets[tooltipItem.datasetIndex];
						var total = dataset.data.reduce(function (previousValue, currentValue, currentIndex, array) {
							return previousValue + currentValue;
						});
						var currentValue = dataset.data[tooltipItem.index];
						var percentage = Math.floor(((currentValue / total) * 100) + 0.5);

						return percentage + "%";
					}
				}
			}

		}
	});

    getDataCount();
};
