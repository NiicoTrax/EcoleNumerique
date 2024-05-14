document.body.onload = addElement;

function addElement() {
  var newDiv = document.createElement("div");
  
  var newContent = document.createTextNode("Ce div a été ajouté en utilisant javascript");

  newDiv.appendChild(newContent);

  var currentDiv = document.getElementById("div1");
  document.body.insertBefore(newDiv, currentDiv);
}




var divSupprime = document.getElementById ('aSupprimer');
document.body.removeChild(divSupprime);



