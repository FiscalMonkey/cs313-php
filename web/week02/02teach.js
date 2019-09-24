function getClicked() {
   alert("Clicked!");
}

function changeColor() {
   var newColor = $("#div1c").val();
   $("#div1").css("background-color", newColor);
}

function fadeOut() {
   $("#div3").fadeOut("slow");
}