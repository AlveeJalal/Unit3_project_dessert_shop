/*
Alvee Jalal 
4/18/23
IT 202 
006
Unit 3 Project Assignment Dessert Shop Phase 5
ahj24@njit.edu 
*/
"use strict";

//make event handler ready when page loads
$(document).ready(() =>
{
    $("img").each((index,img)=>
    {
        //when mousing over the image, switch to a black & white image. 
    $(img).mouseover(function()
    {
        const src = $(this).attr('src');
        const new_src = src.replace(".jpg","-bw.jpg");
        $(this).attr('src',new_src);
    });

            //when mousing out of the image, switch to back to the original image. 
    $(img).mouseout(function ()
    {
        const src = $(this).attr('src');
        const new_src = src.replace("-bw.jpg",".jpg");
        $(this).attr('src',new_src);
    });
    
    });
    
});