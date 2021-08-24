var myVar = setInterval(function(){ myTimer() }, 1000);
var secondlimit = 0;

function myTimer() {
    document.getElementById("timer").innerHTML = 'Twój czas na stronie: ' + zeroPad(secondlimit,2);
    secondlimit = secondlimit  + 1;
    window.sessionStorage.setItem('timer', secondlimit);
}

function zeroPad(num, places) {
  var zero = places - num.toString().length + 1;
  return Array(+(zero > 0 && zero)).join("0") + num;
}

function saveData() {
  var input = document.getElementById("saveLocal");
  localStorage.setItem("local", input.value); 
}

function biggerFont() {
  document.getElementById("font").style.fontSize = "larger";
}

function writeFavourite() {
  var storagedData = document.createElement("P");
  storagedData.innerHTML = localStorage.getItem("local");
  document.getElementById("wody").appendChild(storagedData);
  document.getElementById("button-hide").style.display = "none";
}
