var datahasil;
var Header,Waktu,Ketinggian,Temperature,Kelembaban,Tekanan,ArahAngin,KecAngin,Roll,Pitch,Yaw,Co2;
var acc_x,acc_y,acc_z,gyro_x,gyro_y,gyro_z,humidity,latitude;
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
    humidity : 0, 
    kelembaban : 0,
    tekanan : 0,
    arahAngin : 0,
    kecAngin : 0,
    co2 : 0 ,
    Yaw :0,
    graph : {
            ketinggian : [],
            temperature : [],
            kelembaban : [],
            tekanan : [],
            arahAngin : [],
            kecAngin : [],
            Co2 : [],
            Yaw : []
      },
    sethumidity : function(data){
        this.humidity = parseFloat(data)
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
    getKetinggian : function(){
       return this.ketinggian;
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



// bagian gauge

var gaugeTemperature = new RadialGauge({
    renderTo: 'gaugeTemperature',
    glow: false,
    units: "°C",
    title: "Temperature",
    minValue: -50,
    maxValue: 50,
    majorTicks: [
        -50,
        -40,
        -30,
        -20,
        -10,
        0,
        10,
        20,
        30,
        40,
        50
    ],
    minorTicks: 2,
    strokeTicks: true,
    highlights: [
        {
            "from": -50,
            "to": 0,
            "color": "rgba(0,0, 255, .3)"
        },
        {
            "from": 0,
            "to": 50,
            "color": "rgba(255, 0, 0, .3)"
        }
    ],
    ticksAngle: 225,
    startAngle: 67.5,
    colorMajorTicks: "#ddd",
    colorMinorTicks: "#ddd",
    colorTitle: "#eee",
    colorUnits: "#ccc",
    colorNumbers: "#eee",
    colorPlate: "#222",
    borderShadowWidth: 0,
    borders: true,
    needleType: "arrow",
    needleWidth: 2,
    needleCircleSize: 7,
    needleCircleOuter: true,
    needleCircleInner: false,
    animationDuration: 1500,
    animationRule: "linear",
    colorBorderOuter: "#333",
    colorBorderOuterEnd: "#111",
    colorBorderMiddle: "#222",
    colorBorderMiddleEnd: "#111",
    colorBorderInner: "#111",
    colorBorderInnerEnd: "#333",
    colorNeedleShadowDown: "#333",
    colorNeedleCircleOuter: "#333",
    colorNeedleCircleOuterEnd: "#111",
    colorNeedleCircleInner: "#111",
    colorNeedleCircleInnerEnd: "#222",
    valueBoxBorderRadius: 0,
    colorValueBoxRect: "#222",
    colorValueBoxRectEnd: "#333"
}).draw();
gaugeTemperature.draw();


var gaugeArahAngin = new RadialGauge({
    renderTo: 'gaugeArahAngin',
    minValue: 0,
    maxValue: 360,
    majorTicks: [
        "N",
        "NE",
        "E",
        "SE",
        "S",
        "SW",
        "W",
        "NW",
        "N"
    ],
    minorTicks: 22,
    ticksAngle: 360,
    startAngle: 180,
    strokeTicks: false,
    highlights: false,
    colorPlate: "#222",
    colorMajorTicks: "#f5f5f5",
    colorMinorTicks: "#ddd",
    colorNumbers: "#ccc",
    colorNeedle: "rgba(240, 128, 128, 1)",
    colorNeedleEnd: "rgba(255, 160, 122, .9)",
    valueBox: false,
    valueTextShadow: false,
    colorCircleInner: "#fff",
    colorNeedleCircleOuter: "#ccc",
    needleCircleSize: 15,
    needleCircleOuter: false,
    animationRule: "linear",
    needleType: "line",
    needleStart: 75,
    needleEnd: 99,
    needleWidth: 3,
    borders: true,
    borderInnerWidth: 0,
    borderMiddleWidth: 0,
    borderOuterWidth: 10,
    colorBorderOuter: "#222",
    colorBorderOuterEnd: "#222",
    colorNeedleShadowDown: "#222",
    borderShadowWidth: 0,
    animationDuration: 1500
})
gaugeArahAngin.draw();



  var gaugeKelembaban= new RadialGauge({
    renderTo: 'gaugeKelembaban',
    glow: false,
    glow: false,
    units: '%',
    title: 'Kelembaban',
    minValue: 0,
    maxValue: 220,
    majorTicks: ['0', '20', '40', '60', '80', '100', '120', '140', '160', '180', '200', '220'],
    minorTicks: 5,
    strokeTicks: true,
    highlights: [{from: 180, to: 220, color: 'rgba(200, 50, 50, .75)'}],
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



  var gaugekecAngin = new RadialGauge({
    renderTo: 'gaugekecAngin',
    glow: false,
    glow: false,
    units: '%',
    title: 'Kecepatan angin',
    minValue: 0,
    maxValue: 220,
    majorTicks: ['0', '20', '40', '60', '80', '100', '120', '140', '160', '180', '200', '220'],
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
  gaugekecAngin.draw();


  var gaugeTekanan = new RadialGauge({
    renderTo: 'gaugeTekanan',
    glow: false,
    glow: false,
    units: '%',
    title: 'bujur',
    minValue: 0,
    maxValue: 220,
    majorTicks: ['0', '20', '40', '60', '80', '100', '120', '140', '160', '180', '200', '220'],
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
  gaugeTekanan.draw();

  var gaugeacc_x = new RadialGauge({
    renderTo: 'gaugeacc_x',
    glow: false,
    glow: false,
    units: '%',
    title: 'ACC_X',
    minValue: 0,
    maxValue: 220,
    majorTicks: ['0', '20', '40', '60', '80', '100', '120', '140', '160', '180', '200', '220'],
    minorTicks: 2,
    strokeTicks: true,
    highlights: [{from: 200, to: 220, color: 'rgba(200, 50, 50, .75)'}],
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
  gaugeacc_x.draw();

  var gaugeacc_y = new RadialGauge({
    renderTo: 'gaugeacc_y',
    glow: false,
    glow: false,
    units: '%',
    title: 'ACC_Y',
    minValue: 0,
    maxValue: 220,
    majorTicks: ['0', '20', '40', '60', '80', '100', '120', '140', '160', '180', '200', '220'],
    minorTicks: 2,
    strokeTicks: true,
    highlights: [{from: 20, to: 160, color: 'rgba(200, 50, 50, .75)'}],
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
  gaugeacc_y.draw();

  var gaugeacc_z = new RadialGauge({
    renderTo: 'gaugeacc_z',
    glow: false,
    glow: false,
    units: '%',
    title: 'ACC_Z',
    minValue: 0,
    maxValue: 1000,
    majorTicks: ['0', '100', '200', '300', '400', '500', '600', '700', '800', '900', '1000'],
    minorTicks: 2,
    strokeTicks: true,
    highlights: [{from: 20, to: 220, color: 'rgba(200, 50, 50, .75)'}],
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
  gaugeacc_z.draw();


  $(document).ready(function() { 
 


});

function gaugedData(){
    const socket = io.connect();

    

    socket.on('socketData',(data)=>{
        //untuk grafik
        //param1.setTemperature(data.dataHasil[4]);
        //param1.setKelembaban(data.dataHasil[1]);
        //param1.setTekanan(data.dataHasil[3])
        //param1.setArahAngin(data.dataHasil[1])
        //param1.setKecAngin(data.dataHasil[11])

        
        //maps
        //param.setLintang(data.dataHasil[0]);
		//param.setBujur(data.dataHasil[0]);

		//redraw(param.getLintang(), param.getBujur());


//untuk gauge
        ArahAngin = parseFloat(data.dataHasil[4]);
        Tekanan = parseFloat(data.dataHasil[3]);
        Kelembaban = parseFloat(data.dataHasil[3]);
        Temperature = parseFloat(data.dataHasil[1]);
        acc_x = parseFloat(data.dataHasil[5]);
        acc_y = parseFloat(data.dataHasil[6]);
        acc_z = parseFloat(data.dataHasil[7]);
        gyro_x = parseFloat(data.dataHasil[8]);
        gyro_y = parseFloat(data.dataHasil[9]);
        gyro_z = parseFloat(data.dataHasil[10]);
        kecAngin=parseFloat(data.dataHasil[11]) 


        // no minus in Altitude
        if (Ketinggian < 0) {
            Ketinggian = 0;
        }

       
        //Tampil ke id class
        $("#ArahAngin").html(ArahAngin);
        //$("#waktu").html(Waktu);
        $("#Tekanan").html(Tekanan);
        $("#Kelembaban").html(Kelembaban);
        $("#Temperature").html(Temperature);
        $("#acc_x").html(acc_x);
        $("#acc_y").html(acc_y);
        $("#acc_z").html(acc_z);
        $("#gyro_x").html(gyro_x);
        $("#gyro_y").html(gyro_y);
        $("#gyro_z").html(gyro_z);
        $("#kecAngin").html(kecAngin);
        
        
        gaugeTemperature.value = Temperature;
        gaugekecAngin.value = kecAngin;
        gaugeKelembaban.value = Kelembaban;
        gaugeTekanan.value = Tekanan;
        gaugeacc_x.value= acc_x;
        gaugeacc_y.value= acc_y;
        gaugeacc_z.value= acc_z;
        gaugeArahAngin.value = ArahAngin;


    });

}