



/*
    terminal based kita butuhkan : 
    1. port itu nomornya ?
    2. baudratenya berapa ?
    3. data yang masuk itu ada pemisahnya (Spasi, koma, bintang, dll)
*/

const serialPort = require('serialport'); //membutuhkan port untuk colok arduino
const portNumber = "COM9"; //menyesuaikan dengan port tempat colok arduino
//const PortNumber = process.argv[2]; 
//mengambil data di concsole pada pernyataan ke 3, argunmen ke 2 di command
console.log("Port Number : "+portNumber); //liatin port number
const baudPort = new serialPort(portNumber ,{baudRate:57600}); //baudrate sudah jadi ketentuan. 57600 itu yang sering dipake.

//parser agar tidak buffer
const parsers = serialPort.parsers;
const parser = new parsers.Readline({
    delimeter : '\r\n' //r itu tab, n itu enter
}); //delimiter itu tanda titik, koma, bintang untuk pemisah

baudPort.pipe(parser); //pipe berfungsi untuk mengirim output dari satu program ke program lain untuk diproses lebih jauh lagi
/*
Pipe dikasi input, diproses, trus hasilkan output. Nanti output ini jadi input buat proses berikutnya.
*/

//akses data masuk ke node js
baudPort.on('open',()=>{ //menyatakan kalau port dalam keadaan terbuka
    console.log('Connected at : '+portNumber); //memberi informasi kalau arduino tersambung ke port sekian
    let timeOut = 3000; //hitungan dalam milisecond

    setTimeout(()=>{
    baudPort.write('1', (err)=>{ //input yang dimasukan dari arduino
        if (err){ //ketentuan, tidak dapat dirubah
            console.log(err); //ketentuan, tidak dapat dirubah
        }else { 
            console.log('Node connected'); //informasi kalau program jalan
        }
    })
    }, timeOut);//timeout itu selisih waktu setelah program dieksekusi
})
const express = require('express');
const app = express(); //buat nembak ke browser
const server = require('http').createServer(app);
const io = require('socket.io').listen(server);
const path = require('path');

app.use(express.static(path.join(__dirname, 'Web')));
const portListen = 8000;
server.listen(portListen);

//buat socket event
let clientCount = 0;
io.on('connection', (socket)=>{
    clientCount++;
    console.log('New client connected. '+ clientCount);
    //event yang munculkan data dari arduino pake 'data'. 'data' menyatakan identitas
    parser.on('data', (data)=>{
        //panggil parsing
        let hasilParsing = parsingRawData(data," ");
        socket.emit('socketData', {dataHasil : hasilParsing});
        console.log(data);

    });
});

//event yang munculkan data dari arduino pake 'data'. 'data' menyatakan identitas
parser.on('data',(data)=>{
    let parsingResult = parsingRawData(data);
    // console.log(parsingResult);
    console.log(data);
});


/**
 * 
 * @param {String} data 
 * @returns
 *  [<latitude>, <longitude>, <humidity>, <temperature>, <acc_x>, <acc_x>, <acc_x>, <gyro_x>, <gyro_y>, <gyro_z>]
 */
function parsingRawData (data) {
	const regex = /([0-9|\.|-]*)/g;
	let hasilParsing = [];
		data.match(regex).forEach(element => {
			if (element != '')
				hasilParsing.push(element);
		});
		return hasilParsing;
}

 

/*
Note:
1. String itu kumpulan kalimat
2. Array itu kumpulan data

Bagian ini
    // let parsingResult = parsingRawData(data,"*");
    // console.log(parsingResult);
Maksudnya itu hasil parsing ngerubah data string jadi array setelah dipisah terlebih dahulu
* sebagai pemisah
*/
