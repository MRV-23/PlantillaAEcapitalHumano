
    /*
     * BAR CHART
     * ---------
     */
   var dataSoporteTecnico = [['Problemas con el correo electrónico', 10], ['February', 8], ['March', 4], ['April', 13], ['May', 17], ['June', 9], ['July', 50], ['Augost', 9]];

    var bar_data = {
      data : dataSoporteTecnico,
      color: '#3c8dbc'
    }
    $.plot('#bar-chart', [bar_data], {
      grid  : {
        borderWidth: 1,
        borderColor: '#f3f3f3',
        tickColor  : '#f3f3f3'
      },
      series: {
        bars: {
          show    : true,
          barWidth: 0.5,
          align   : 'center'
        }
      },
      xaxis : {
        mode      : 'categories',
        tickLength: 0
      }
    });
    /* END BAR CHART */

    /*
     * BAR CHART
     * ---------
     */

    var bar_data2 = {
        data : [['Correo electrónico', 10], ['Compaq', 8], ['Nominq', 4], ['Spark', 13], ['May', 17], ['June', 9], ['July', 50], ['Augost', 9]],
        color: '#3c8dbc'
      }
      $.plot('#bar-chart2', [bar_data2], {
        grid  : {
          borderWidth: 1,
          borderColor: '#f3f3f3',
          tickColor  : '#f3f3f3'
        },
        series: {
          bars: {
            show    : true,
            barWidth: 0.5,
            align   : 'center'
          }
        },
        xaxis : {
          mode      : 'categories',
          tickLength: 0
        }
      });
      /* END BAR CHART */

    /*
     * DONUT CHART
     * -----------
     */

    

    var donutData = [
      { label: 'Rogelio', data: 30, color: '#3c8dbc' },
      { label: 'Ulises', data: 20, color: '#0073b7' },
      { label: 'Juan', data: 50, color: '#00c0ef' }
    ]
    $.plot('#donut-chart', donutData, {
      series: {
        pie: {
          show       : true,
          radius     : 1,
          innerRadius: 0.3,
          label      : {
            show     : true,
            radius   : 2 / 3,
            formatter: labelFormatter,
            threshold: 0.1
          }

        }
      },
      legend: {
        show: false
      }
    })
    /*
     * END DONUT CHART
     */

     /*
     * DONUT CHART
     * -----------
     */
    donutData2 = [{ 
      label: 'Miguel', 
      data: 0, 
      color: '#3c8dbc' },{ 
      label: 'Salvador', 
      data: 0, 
      color: '#0073b7'}
    ];
    
    function recargar(){
            $.ajax({
              type: "POST",
              url: ruta_server + "controllers/AjaxTickets.php",
              dataType: "json",
              data: { GraficaPastelGiro : true}
          }).done(function(respuesta) {
            console.log(respuesta);
              donutData2 = [{ 
              label: 'Miguel', 
              data: respuesta[0], 
              color: '#3c8dbc' },{ 
              label: 'Salvador', 
              data: respuesta[1], 
              color: '#0073b7'}
            ];

           valores();

          }).fail(function(error) {console.log('Ocurrio un error:', error);}); 
    }
    
    function valores(){
      $.plot('#donut-chart2', donutData2, {
        series: {
          pie: {
            show       : true,
            radius     : 1,
            innerRadius: 0.3,
            label      : {
              show     : true,
              radius   : 2 / 3,
              formatter: labelFormatter,
              threshold: 0.1
            }
          }
        },
        legend: {
          show: false
        }
      });
    }
  
  function labelFormatter(label, series) {
    return '<div style="font-size:15px; text-align:center; padding:2px; color: #fff; font-weight: 600;">'
      + label
      + '<br>'
      + Math.round(series.percent) + '%</div>'
  }

  valores();

  socket.on('GraficasTicktesDonaGiro',() =>{
    recargar();
  });
