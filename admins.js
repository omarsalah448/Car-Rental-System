let radio1=document.getElementById("flexRadioDefault1");
let radio2=document.getElementById("flexRadioDefault2");
let radio3=document.getElementById("flexRadioDefault3");
var cardiv=document.getElementById("mainbar");
var officediv=document.getElementById("mainbar2")
var custdiv=document.getElementById("mainbar3")
officediv.style.display="none";
custdiv.style.display="none";
function func1(){
  cardiv.style.display="flex";
  officediv.style.display="none";
  custdiv.style.display="none";
}
function func2(){
  officediv.style.display="flex";
  cardiv.style.display="none";
  custdiv.style.display="none";
}
function func3(){
  custdiv.style.display="flex";
  cardiv.style.display="none";
  officediv.style.display="none";
}