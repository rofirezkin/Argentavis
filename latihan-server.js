const SerialPort = require('serialport')
const Delimiter = require('@serialport/parser-delimiter')
const port = new SerialPort('/dev/tty-usbserial1')

const parser = port.pipe(new Delimiter({ delimiter: '\n' }))
parser.on('data', console.log)