// Step 1: Find the math heading and store it in a variable
var math = $("#math-heading");
console.log(math); 

// Step 2: Modify the math heading to add an exclamation at the end
math.text(math.text() + " ...amazing!");

// Step 3: Find the science heading and store it in a variable
var science = $("#science-heading");
console.log(science); 

// Modify the science heading to add an exclamation at the end
science.text(science.text() + " ...incredible!");
