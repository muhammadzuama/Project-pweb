var keyword=document.getElementById('keyword');
var tombolCari=document.getElementById('tombol-cari');
var container=document.getElementById('container');

keyword.addEventListener('keyup',function() {

    var xhr = new XMLHttpRequest();


    xhr.onreadystatechange=function(){
        if (xhr.readyState==4 && xhr.status== 200){
            console.log('ajax ok');
        }
    }

    xhr.open('GET','ajax/coba.txt', true);
    xhr.send();


})