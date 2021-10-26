var lista = ["planta1.jpg","planta2.jpg","planta3.jpg", "zombie1.jpg","zombie2.jpg","zombie3.jpg"];
const x = document.getElementById("imagen")
const x2 = document.getElementById("imagen2")
const x3 = document.getElementById("imagen3")
const x4 = document.getElementById("imagen4")
var r = document.getElementById("resultat")

var cont=0;


function fun() {
   
    x.src = lista[Math.floor(Math.random()*6)];
   x2.src = lista[Math.floor(Math.random()*6)];
   x3.src = lista[Math.floor(Math.random()*6)];
   x4.src = lista[Math.floor(Math.random()*6)];

   r.innerText= contador()


  }
function contador(){

    if(x.src == x2.src || x.src == x3.src || x.src == x4.src || x2.src == x3.src  || x2.src == x4.src || x3.src == x4.src ){
        cont +=1;
    }

    return cont;
}
