function formPasswordShowHide() {
  var x = document.getElementById("pasuwarudo");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}