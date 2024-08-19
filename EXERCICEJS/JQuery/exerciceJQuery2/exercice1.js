// Change the <li> tags to include the word 'horn'
$("li").text("Horn");

// Change the main title to talk about unicorns
$("#page-heading").text("All about unicorns");

// Change all <span> tags with the class 'animal' to 'unicorns'
$("span.animal").text("unicorns");

// Change other texts to talk about unicorns
$("p:contains('All horses gallop on 4 legs.')").text("All unicorns gallop on 4 legs.");
$("p:contains('You can feed carrots to horses.')").text("You can feed carrots to unicorns.");
$("p:contains('Never walk behind horses.')").text("Never walk behind unicorns.");
$("p:contains('Their most notable body parts:')").text("Their most notable body parts:");
$("li:contains('Strong legs')").text("Strong legs");
$("li:contains('Long mane')").text("Long mane");
$("li:contains('Hooved feet')").text("Hooved feet");
