function getClicked() {
   alert("Clicked!");
}

function changeColor() {
   var newColor = document.getElementById("div1c").value;
   document.getElementById("div1").style.backgroundColor = newColor;
}