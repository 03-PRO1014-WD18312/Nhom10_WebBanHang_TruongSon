
//slide
var album=[];
for(var i=0;i<6;i++){
    album[i]=new Image();
    album[i].src="./img/banner"+i+".jpg";
}
 var interval=setInterval(slideshow,2000);
index=0;
function slideshow(){
    index++;
    if(index>4){
        index=0;
    }
    document.getElementById("banner").src=album[index].src;
   
    
}

// nut chuyen doi an hien nut 
const info1 = document.getElementById('info-1');
const info2 = document.getElementById('info-2');
const info3 = document.getElementById('info-3');

const button1 = document.getElementById('button-1');
const button2 = document.getElementById('button-2');
const button3 = document.getElementById('button-3');

button1.addEventListener('click', function() {
    info1.classList.add('show');
    info2.classList.remove('show');
    info3.classList.remove('show');
    button1.classList.add('highlight');
    button2.classList.remove('highlight');
    button3.classList.remove('highlight');
});

button2.addEventListener('click', function() {
    info1.classList.remove('show');
    info2.classList.add('show');
    info3.classList.remove('show');
    button1.classList.remove('highlight');
    button2.classList.add('highlight');
    button3.classList.remove('highlight');
});

button3.addEventListener('click', function() {
    info1.classList.remove('show');
    info2.classList.remove('show');
    info3.classList.add('show');
    button1.classList.remove('highlight');
    button2.classList.remove('highlight');
    button3.classList.add('highlight');
});

