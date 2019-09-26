var datahasil;
var Header,Waktu,Ketinggian,Temperature,Kelembaban,Tekanan,ArahAngin,KecAngin,Roll,Pitch,Yaw,Co2;
var Tarikan,acc_y,acc_z,gyro_x,gyro_y,gyro_z,humidity,latitude;
var chartTemp , chartKelem, chartTekan , chartArah , chartKece , chartCo2;
var param = {
    lintang 	: -6.976126,      //Bandung
    bujur 		: 107.630346, //Bandung
    setLintang : function(data){
        this.lintang = parseFloat(data);
    },
    setBujur : function(data){
        this.bujur = parseFloat(data);
    },
    getLintang : function(){
       return this.lintang;
    },
    getBujur : function(){
       return this.bujur  ;
    }
};
var lineCoordinatesArray = [];




var param1 = {
    
    
    ketinggian : 0 ,
    longitude : 0,
    Tarikan : 0, 
    kelembaban : 0,
    tekanan : 0,
    arahAngin : 0,
    kecAngin : 0,
    co2 : 0 ,
    Yaw :0,
    graph : {
            Tarikan : [],
            temperature : [],
            kelembaban : [],
            tekanan : [],
            arahAngin : [],
            kecAngin : [],
            Co2 : [],
            Yaw : []
      },
    setTarikan : function(data){
        this.tarikan = parseFloat(data)
    },
    setKetinggian : function(data){
        this.ketinggian = parseFloat(data);
    },
    setTemperature : function(data){
        this.temperature = parseFloat(data);
    },
    setKelembaban : function(data){
        this.kelembaban = parseFloat(data);
    },
    setTekanan : function(data){
        this.tekanan = parseFloat(data);
    },
    setArahAngin : function(data){
        this.arahAngin = parseFloat(data);
    },
    setKecAngin : function(data){
        this.kecAngin = parseFloat(data);
    },
    setCo2 : function(data){
        this.co2 = parseFloat(data);
    },
    setYaw : function(data){
        this.Yaw = parseFloat(data);
    },
    getHeader : function(){
        return this.Header;  
    },
    getTarikan : function(){
       return this.tarikan;
    },
    getTemperature : function(){
       return this.temperature  ;
    },
    getKelembaban : function(){
       return this.kelembaban  ;
    },
    getTekanan : function(){
        return   this.tekanan  ;
    },
    getArahAngin : function(){
        return this.arahAngin  ;
    },
    getKecAngin : function(){
        return this.kecAngin  ;
    },
    getCo2 : function(){
        return this.co2  ;
    },
    getYaw : function(){
        return this.Yaw ;
    }
};


//membuat graph 
Highcharts.setOptions({
    global: {
        useUTC: false
    }
});





chartTemp = new Highcharts.Chart({
    chart: {
        renderTo: 'chartTarikan',
        defaultSeriesType: 'spline',
        events: {
            load: function () {
    
                    var series = this.series[0] ,
                    shift = series.data.length > 50;
                    setInterval(function () {
                        var x = (new Date()).getTime(), // current time
                            y = param1.getKelembaban();
                        series.addPoint([x, y], true, true);
                    }, 1000);
    
                  
                }
        }
    },
    title: {
        text: ''
    },
    credits: {
        enabled: false
    },
    xAxis: {
        type: 'datetime',
        tickPixelInterval: 150,
        crosshair : true,
        maxZoom: 20 * 1000
    },
    yAxis: {
        minPadding: 0.2,
        maxPadding: 0.2,
        crosshair : true,
        title: {
            text: 'Kadar',
            margin: 5
        }
    },
    series: [
    {
        name: 'Kelembaban',
        data: (function () {
                var data = [],
                    time = (new Date()).getTime(),
                    i;
    
                for (i = -19; i <= 0; i += 1) {
                    data.push({
                        x: time + i * 1000,
                        y: param1.getKelembaban()
                    });
                }
                return data;
            }())
    }
    ]
    });
    

    chartTemp = new Highcharts.Chart({
        chart: {
            renderTo: 'chartkecAngin',
            defaultSeriesType: 'spline',
            events: {
                load: function () {
        
                        var series = this.series[0] ,
                        shift = series.data.length > 50;
                        setInterval(function () {
                            var x = (new Date()).getTime(), // current time
                                y = param1.getKecAngin();
                            series.addPoint([x, y], true, true);
                        }, 1000);
        
                      
                    }
            }
        },
        title: {
            text: ''
        },
        credits: {
            enabled: false
        },
        xAxis: {
            type: 'datetime',
            tickPixelInterval: 150,
            crosshair : true,
            maxZoom: 20 * 1000
        },
        yAxis: {
            minPadding: 0.2,
            maxPadding: 0.2,
            crosshair : true,
            title: {
                text: 'Gram',
                margin: 5
            }
        },
        series: [
        {
            name: 'Tarikan',
            data: (function () {
                    var data = [],
                        time = (new Date()).getTime(),
                        i;
        
                    for (i = -19; i <= 0; i += 1) {
                        data.push({
                            x: time + i * 1000,
                            y: param1.getKecAngin()
                        });
                    }
                    return data;
                }())
        }
        ]
        });
        
    

// bagian gauge

var gaugeTarikan = new RadialGauge({
    renderTo: 'gaugeTarikan',
    glow: false,
    glow: false,
    units: '%',
    title: 'Tarikan',
    minValue: 0,
    maxValue: 220,
    majorTicks: ['0', '50', '100', '150', '200', '250', '300', '350', '400', '450', '500', '550'],
    minorTicks: 5,
    strokeTicks: true,
    highlights: [{from: 80, to: 220, color: 'rgba(200, 50, 50, .75)'}],
            colorMajorTicks: "#ddd",
            colorMinorTicks: "#2F333E",
            colorTitle: "#eee",
            colorUnits: "#ccc",
            colorNumbers: "#eee",
            colorPlate: "#796AEE",
            borderShadowWidth: 0,
            borders: true,
            needleType: "arrow",
            needleWidth: 2,
            needleCircleSize: 7,
            needleCircleOuter: true,
            needleCircleInner: false,
            animationDuration: 1500,
            animationRule: "linear",
            colorBorderOuter: "#2F333E",
            colorBorderOuterEnd: "#2F333E",
            colorBorderMiddle: "#2F333E",
            colorBorderMiddleEnd: "#2F333E",
            colorBorderInner: "#2F333E",
            colorBorderInnerEnd: "#2F333E",
            colorNeedleShadowDown: "#333",
            colorNeedleCircleOuter: "#333",
            colorNeedleCircleOuterEnd: "#111",
            colorNeedleCircleInner: "#111",
            colorNeedleCircleInnerEnd: "#222",
            valueBoxBorderRadius: 1,
            colorValueBoxRect: "#2F333E",
            colorValueBoxRectEnd: "#2F333E"
}).draw();
  gaugeTarikan.draw();


var gaugeKelembaban = new RadialGauge({
    renderTo: 'gaugeKelembaban',
    glow: false,
    glow: false,
    units: '%',
    title: 'Kelembaban',
    minValue: 0,
    maxValue: 220,
    majorTicks: [ '100','150', '200', '250', '300', '350', '400', '450', '500', '550', '600', '650', '700'],
    minorTicks: 2,
    strokeTicks: true,
    highlights: [{from: 20, to: 40, color: 'rgba(200, 50, 50, .75)'}],
            colorMajorTicks: "#ddd",
            colorMinorTicks: "#2F333E",
            colorTitle: "#eee",
            colorUnits: "#ccc",
            colorNumbers: "#eee",
            colorPlate: "#796AEE",
            borderShadowWidth: 0,
            borders: true,
            needleType: "arrow",
            needleWidth: 2,
            needleCircleSize: 7,
            needleCircleOuter: true,
            needleCircleInner: false,
            animationDuration: 1500,
            animationRule: "linear",
            colorBorderOuter: "#2F333E",
            colorBorderOuterEnd: "#2F333E",
            colorBorderMiddle: "#2F333E",
            colorBorderMiddleEnd: "#2F333E",
            colorBorderInner: "#2F333E",
            colorBorderInnerEnd: "#2F333E",
            colorNeedleShadowDown: "#333",
            colorNeedleCircleOuter: "#333",
            colorNeedleCircleOuterEnd: "#111",
            colorNeedleCircleInner: "#111",
            colorNeedleCircleInnerEnd: "#222",
            valueBoxBorderRadius: 1,
            colorValueBoxRect: "#2F333E",
            colorValueBoxRectEnd: "#2F333E"
}).draw();
  gaugeKelembaban.draw();

  $(document).ready(function() { 
 


});

function updateData(){
    const socket = io.connect();

    

    socket.on('socketData',(data)=>{
        //untuk grafik

       
        param1.setKelembaban(data.dataHasil[2])
        param1.setTarikan(data.dataHasil[1])
        param1.setKecAngin(data.dataHasil[1])
        
        //maps
        //param.setLintang(data.dataHasil[0]);
		//param.setBujur(data.dataHasil[0]);

		redraw(param.getLintang(), param.getBujur());


//untuk gauge
       
        Tarikan = parseFloat(data.dataHasil[1]);
        Kelembaban=parseFloat(data.dataHasil[2]) 
        Header=parseFloat(data.dataHasil[0])

       

       
        //Tampil ke id class

        //$("#waktu").html(Waktu);
        $("#Tarikan").html(Tarikan);

        $("#Kelembaban").html(Kelembaban);
        $("#Header").html(Header);
        
        
   
        gaugeTarikan.value = Tarikan;

        gaugeKelembaban.value = Kelembaban;
        
    });

    //Make map
    map = new google.maps.Map(document.getElementById('map'), {
        zoom: 17,
        center: {lat: param.getLintang(), lng : param.getBujur(), alt: 0}
      });

      //make marker
      map_marker = new google.maps.Marker({position: {lat: param.getLintang(), lng: param.getBujur()}, map: map});
      map_marker.setMap(map);
   

      function redraw(Lintang, Bujur) {
        map.setCenter({lat: Lintang, lng : Bujur, alt: 0}); // biar map ketengah
        map_marker.setPosition({lat: Lintang, lng : Bujur, alt: 0}); // biar map ketengah

        pushCoordToArray(Lintang, Bujur); //masukin nilai lintan dan bujur ke array coordinates

        var lineCoordinatesPath = new google.maps.Polyline({
            path: lineCoordinatesArray,
            geodesic: true,
            strokeColor: '#ffeb3b',
            strokeOpacity: 1.0,
            strokeWeight: 2
          });

          lineCoordinatesPath.setMap(map); 
      }

      function pushCoordToArray(latIn, lngIn) {
        lineCoordinatesArray.push(new google.maps.LatLng(latIn, lngIn));
      }
}