document.body.onload = addElement;

function addElement() {
  var newDiv = document.createElement("div");
  
  var newContent = document.createTextNode("Ce div a été ajouté en utilisant javascript");

  newDiv.appendChild(newContent);

  var currentDiv = document.getElementById("div1");
  document.body.insertBefore(newDiv, currentDiv);
}




document.getElementById('viewport').appendChild(monDiv);


var divSupprime = document.getElementById ('aSupprimer');
document.body.removeChild(divSupprime);



