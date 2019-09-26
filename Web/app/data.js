var datahasil;
var Tarikan, Kelembaban, Header;




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


function updateData(){
    const socket = io.connect();

    
    socket.on('socketData',(data)=>{


//untuk gauge
        Header = parseFloat(data.dataHasil[0]);
        Tarikan = parseFloat(data.dataHasil[1]);
        Kelembaban= parseFloat(data.dataHasil[2])


            if(Tarikan>50){
                $(document).ready(function(){
                    window.innerHTML(alert("BAHAYA CUYYY!!!"));  
                });                  
                document.getElementById("ubah").style.animationName = "example";
                 document.getElementById("ubah").innerHTML="<strong>BAHAYA!!!</strong>";
                 document.getElementById("text").innerHTML="<h6>pergeseran lempeng tanah semakin besar, Menjauhhh <h6>";
                 document.getElementById("text").style.backgroundColor='#ffb3b3 ';
                 socket.close();                             
                }
        

      else if (Kelembaban<320){
        document.getElementById("ubah").style.backgroundColor='#ff4d4d ';
        document.getElementById("ubah").innerHTML="Siaga 3";
        document.getElementById("text").innerHTML="<strong>pergeseran lempeng tanah meluas, warga disarankan untuk tidak beraktivitas di dekat tanah tinggi</strong>";
      
    
       }
       else if (Kelembaban<450){
    
        document.getElementById("ubah").style.backgroundColor='#ff6666 ';
        document.getElementById("ubah").innerHTML="Siaga 2";
        document.getElementById("text").innerHTML="<strong>pergeseran lempeng tanah mencakup dua titik, keadaan masih cukup aman</strong>";
        document.getElementById("text").style.backgroundColor='#ffff99 ';
    }
       else if (Kelembaban<550){

        document.getElementById("ubah").style.backgroundColor='#ff9999 ';
        document.getElementById("ubah").innerHTML="Siaga 1";
        document.getElementById("text").innerHTML="<strong>Hanya Sedikit Pergeseran Lempeng Tanah, Keadaan Masih Cukup Aman</strong>";
        document.getElementById("text").style.backgroundColor='#80ff80';

       }
       else if (Kelembaban>600){
        
        document.getElementById("ubah").style.animationName = "exampleNO";
        document.getElementById("ubah").style.backgroundColor='#ffcccc';
        document.getElementById("ubah").innerHTML="Keadaan Aman";
        document.getElementById("text").innerHTML="<strong> keadaan aman ... :)</strong>";     
        document.getElementById("text").style.backgroundColor='#80ff80' ;

       }

       else{
        
       }

        //Tampil ke id class
        $("#Kelembaban").html(Kelembaban);
        //$("#waktu").html(Waktu);
        $("#Header").html(Header);
        $("#Tarikan").html(Tarikan);
  
    });


}