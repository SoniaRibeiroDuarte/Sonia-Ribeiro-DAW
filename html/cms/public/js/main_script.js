/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
   var window_width = $(window).width();
   if(window_width>=650) {
    var window_height = $( window ).height();
    var new_height = window_height - 60;
    console.log("Alto window:"+window_height);
    console.log("Alto menu:"+$('#menu').height());
    console.log("Alto footer:"+$('#footer').height());
    console.log("Nuevo alto"+new_height);
    $('#conlog').css("height",new_height+"px");   
   }
});

