const { min } = require("lodash");

function getServerTime(){
    return $.ajax({async: false}).getResponseHeader('Date');
}

function realTime(){
    var clock = new Date();

    var hours = clock.getHours();
    var minutes = clock.getMinutes();
    var seconds = clock.getSeconds();


    hours = ("0" + hours).slice(-2);
    minutes = ("0" + minutes).slice(-2);
    seconds = ("0" + seconds).slice(-2);


    document.getElementById("clock").innerHTML = hours + " : " +minutes+ " : " +seconds;

    var jam = setTimeout(realTime, 500);
}