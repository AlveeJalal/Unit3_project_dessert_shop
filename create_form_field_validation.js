/*
Alvee Jalal 
4/18/23
IT 202 
006
Unit 3 Project Assignment Dessert Shop Phase 5
ahj24@njit.edu 
*/
"use strict";
//selector for fields
const select  = selector => document.querySelector(selector);

// event handler for validating form fields
const validateFields = evt => {

    //selecting all the fields
    const dessertCode = select("#dessertCode");
    const dessertName = select("#dessertName");
    const dessertDescription = select("#dessertDescription");
    const dessertPrice = select("#dessertPrice");

    //valid condition initially true
    let isValid = true;

        //if dessertCode field is blank, give a message that it shouldn't be blank
        if(dessertCode.value == "")
    {
        dessertCode.nextElementSibling.nextElementSibling.textContent = "DessertCode field should not be blank!";
        alert("DessertCode field should not be blank!");
        isValid = false;
    }
            //if dessertCode is less than 4 characters, give a message that it should be a minimum of 4
    if(dessertCode.value.length<4)
    {
        dessertCode.nextElementSibling.nextElementSibling.textContent = "DessertCode field should be a minimum of 4 characters!";
        alert("DessertCode field should be a minimum of 4 characters!");
        isValid = false;
    }
    
                //if dessertCode is more than 10 characters, give a message that it should be a maximum of 10

    if(dessertCode.value.length>10)
    {
        dessertCode.nextElementSibling.nextElementSibling.textContent = "DessertCode field should be a maximum of 10 characters!";
        alert("DessertCode field should be a maximum of 10 characters!");
        isValid = false;
    }

        //if dessertName field is blank, give a message that it shouldn't be blank

    if(dessertName.value == "")
    {
        dessertName.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent = "DessertName field should not be blank!";
        alert("DessertName field should not be blank!");
        isValid = false;
    }

                //if dessertNames is less than 10 characters, give a message that it should be a minimum of 10
    if(dessertName.value.length < 10)
    {
        dessertName.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent = "DessertName field should be a minimum of 10 characters!";
        alert("DessertName field should be a minimum of 10 characters!");
        isValid = false;
    }

                //if dessertName is more than 100 characters, give a message that it should be a minimum of 100

    if(dessertName.value.length > 100)
    {
        dessertName.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent = "DessertName field should be a maximum of 100 characters!";
        alert("DessertName field should be a maximum of 100 characters!");
        isValid = false;
    }

            //if dessertDescription field is blank, give a message that it shouldn't be blank
    if(dessertDescription.value == "")
    {
        dessertDescription.nextElementSibling.nextElementSibling.nextElementSibling.textContent = "DessertDescription field should not be blank!";
        alert("DessertDescription field should not be blank!");
        isValid = false;
    }

                //if dessertDescription is less than 10 characters, give a message that it should be a minimum of 10

    if(dessertDescription.value.length < 10)
    {
        dessertDescription.nextElementSibling.nextElementSibling.nextElementSibling.textContent = "dessertDescription field should be a minimum of 10 characters!";
        alert("dessertDescription field should be a minimum of 10 characters!");
        isValid = false;
    }

                    //if dessertDescription is more than 255 characters, give a message that it should be a maximum of 255
    if(dessertDescription.value.length > 255)
    {
        dessertDescription.nextElementSibling.nextElementSibling.nextElementSibling.textContent = "dessertDescription field should be a maximum of 255 characters!";
        alert("dessertDescription field should be a maximum of 255 characters!");
        isValid = false;
    }
            //if dessertPrice field is blank, give a message that it shouldn't be blank
    if(dessertPrice.value == "")
    {
        dessertPrice.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent = "DessertPrice field should not be blank!";
        alert("DessertPrice field should not be blank!");
        isValid = false;
    }

            //if dessertPrice is negative, give a message that it shouldn't be negative
    if(dessertPrice.value < 0)
    {
        dessertPrice.nextElementSibling.textContent = "DessertPrice field should not be negative!";
        alert("DessertPrice field should not be negative!");
        isValid = false;
    }
                //if dessertPrice is 0, give a message that it shouldn't be 0
    if(dessertPrice.value == 0)
    {
        dessertPrice.nextElementSibling.textContent = "DessertPrice field should not be 0!";
        alert("DessertPrice field should not be 0!");
        isValid = false;
    }
                //if dessertPrice is more than 100000, give a message that it shouldn't be more than 100000

    if(dessertPrice.value > 100000)
    {
        dessertPrice.nextElementSibling.textContent = "DessertPrice field should not exceed 100000!";
        alert("DessertPrice field should not exceed 100000!");
        isValid = false;
    }
    //if everything is valid, submit the form
    if(isValid==true)
    {
        select("#add_dessert_form").submit();
    }

    //if not, DO NOT LET THE FORM BE SUBMITTED
    else
    {
        evt.preventDefault();
    }
}


//function for resetting the fields when reset button is clicked
const resetButton = () =>
{
    select("#dessertName").value="";
    select("#dessertDescription").value="";
    select("#dessertPrice").value="";
    select("#dessertCategory").value="Cakes";

};

//adding event handler for submitting form 
document.addEventListener("DOMContentLoaded", () => {
    select("#submit_create_form").addEventListener("click",validateFields);
    
    });
    
   
    //adding event handler for reset button to clear form fields 

    document.addEventListener("DOMContentLoaded", () =>
    {
        select("#resetButton").addEventListener("click", resetButton);
    });
    
