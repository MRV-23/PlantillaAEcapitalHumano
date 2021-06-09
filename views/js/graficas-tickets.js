
class GraficasTickets{

     static recargarSoporteBarras(){
          $.ajax({
            type: "POST",
            url: ruta_server + "controllers/AjaxTickets.php",
            dataType: "json",
            data: { GraficaBarrasSoporte : true}
        }).done(function(respuesta) {
          let bar_data = {
            data : [[respuesta[0][0],respuesta[0][1]], [respuesta[1][0],respuesta[1][1]], [respuesta[2][0],respuesta[2][1]], [respuesta[3][0],respuesta[3][1]], [respuesta[4][0],respuesta[4][1]], [respuesta[5][0],respuesta[5][1]]],
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
        }).fail(); 
      }

    static recargarGiroBarras(){
        $.ajax({
          type: "POST",
          url: ruta_server + "controllers/AjaxTickets.php",
          dataType: "json",
          data: { GraficaBarrasGiro : true}
      }).done(function(respuesta) {
        let bar_data = {
          data : [[respuesta[0][0] +' ('+respuesta[0][2]+')',respuesta[0][1]], [respuesta[1][0] + ' ('+ respuesta[1][2] +')',respuesta[1][1]], [respuesta[2][0] + ' ('+ respuesta[2][2] +')',respuesta[2][1]], [respuesta[3][0] + ' ('+ respuesta[3][2] +')',respuesta[3][1]], [respuesta[4][0] + ' ('+ respuesta[4][2] +')' ,respuesta[4][1]], [respuesta[5][0] +' ('+ respuesta[5][2] +')',respuesta[5][1]]],
          color: '#3c8dbc'
        }
        $.plot('#bar-chart2', [bar_data], {
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
      }).fail(); 
    }

      static recargarGiroPastel(){
          $.ajax({
            type: "POST",
            url: ruta_server + "controllers/AjaxTickets.php",
            dataType: "json",
            data: { GraficaPastelGiro : true}
        }).done(function(respuesta) {
            let donutData = [{ 
            label: 'Miguel', 
            data: respuesta[0], 
            color: '#3c8dbc' },{ 
            label: 'Salvador', 
            data: respuesta[1], 
            color: '#0073b7'}
          ];

          $.plot('#donut-chart2', donutData, {
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

        }).fail(); 
      }


      static recargarSistemasPastel(){
        $.ajax({
          type: "POST",
          url: ruta_server + "controllers/AjaxTickets.php",
          dataType: "json",
          data: { GraficaPastelSoporte : true}
      }).done(function(respuesta) {
          let donutData = [{ 
          label: 'Rogelio', 
          data: respuesta[0], 
          color: '#3c8dbc' },{ 
          label: 'Ulises', 
          data: respuesta[1], 
          color: '#0073b7'},{ 
          label: 'Juan', 
          data: respuesta[2], 
          color: '#00c0ef'}
        ];

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
        });

      }).fail(); 
    }

     

      static iniciar(){

        //GraficasTickets.recargarGiroPastel();
        socket.on('GraficasTicktesDonaGiro',() =>{
          GraficasTickets.recargarGiroPastel();
        });

        //GraficasTickets.recargarSistemasPastel();
        socket.on('GraficasTicktesDonaSistemas',() =>{
          GraficasTickets.recargarSistemasPastel();
        });

        //GraficasTickets.recargarSoporteBarras();
        socket.on('GraficasTicktesBarrasSistemas',() =>{
          GraficasTickets.recargarSoporteBarras();
        });

        //GraficasTickets.recargarSoporteBarras();
        socket.on('GraficasTicktesBarrasGiro',() =>{
          GraficasTickets.recargarGiroBarras();
        });

      }

  }

  function labelFormatter(label, series) {
    return '<div style="font-size:15px; text-align:center; padding:2px; color: #fff; font-weight: 600;">' + label + '<br>' + Math.round(series.percent) + '%</div>'
  }

  GraficasTickets.iniciar();