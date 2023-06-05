/*
Alvee Jalal 
4/8/23
IT 202 
006
Unit 3 Project Assignment Dessert Shop Phase 5
ahj24@njit.edu 
*/

"use strict";
const delete_dessert = evt =>
{
    //alert with confirmation for deletion
const confirmDelete = confirm("Are you sure?");

//if they click okay, delete the record
if(confirmDelete)
{
    $("form").submit();
}
//if they click cancel, DONT delete the record
else{


evt.preventDefault();
}
}

//adding event listener to be ready when the page is loaded
document.addEventListener("DOMContentLoaded", () =>
{
    //object for all the buttons
const deleteButtons = document.querySelectorAll("#delete_dessert");
for (let deleteButton of deleteButtons)
{
//add click event listener to each button
deleteButton.addEventListener("click",delete_dessert);
}
});


