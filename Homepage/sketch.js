var mapimg;
var mapdata, datarray;

var clat = 41.9509;
var clong = 12.6399;

var lat = 41.12559576;
var long = 16.86736689;


var zoom = 4.95;

function preload(){
    mapimg = loadImage('MappaItalia/Italia.png');
    mapdata = loadJSON('https://raw.githubusercontent.com/pcm-dpc/COVID-19/master/dati-json/dpc-covid19-ita-regioni-latest.json');
}

function mercatoreX(long){
    long = radians(long);
    var a = (256/PI)*pow(2,zoom);
    var b = long+PI;
    return a*b;

}

function mercatoreY(lat){
    lat = radians(lat);
    var a = (256/PI)*pow(2,zoom);
    var b = tan(PI/4 + lat/2);    
    var c = PI-log(b);
    return a*c;
}

function setup(){
    var it_canvas = createCanvas(570,675);
    it_canvas.parent('#centro');
    translate(width/2,height/2);
    imageMode(CENTER);
    image(mapimg,0,0);

    var cx = mercatoreX(clong);
    var cy = mercatoreY(clat);

    datarray = json2array(mapdata);

    for(var i=0; i<datarray.length; i++){

        var lat = mapdata[i].lat;
        var long = mapdata[i].long;
        var positivi = sqrt(mapdata[i].totale_positivi)/1.5;

        var x = mercatoreX(long) - cx;
        var y = mercatoreY(lat) - cy;
        
        stroke(127,51,0); // colore della circoferenza
        fill(235, 184, 29); //colore interno del cerchio
        ellipse(x,y,positivi,positivi);    
    }
}

function json2array(json){
    var result = [];
    var keys = Object.keys(json);
    keys.forEach(function(key){
        result.push(json[key]);
    });
    return result;
}


function draw() {
} 


