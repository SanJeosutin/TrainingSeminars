/** 
  * Author       : SanJeosutin
  * Target       : register.html
  * Purpose      : To validate user input
  * Created      : 17-Jun-2020
  * Last updated : 17-Jun-2020
 **/
"use strict";
/*VALIDATE DATA. CHECK IF ANY OF THE 
FORMAT IS VIOLATED. IF NOT, CONTINUE.*/
function validateData(){
    var errorMessage = "";
    var okToGo = true;

    var refNumber = document.getElementById("sRefNumber").value;
    var username = document.getElementById("uName").value;
    var phoneNumber = document.getElementById("uPhoneNum").value;

    if(!refNumber.match(/^(S\d{5})$/)){
        errorMessage += "Reference Number must match the following: Sxxxxx. Ie: S01234.\n";
        okToGo = false;
    }

    if(!username.match(/^([A-Za-z]{2,20})$/)){
        errorMessage += "Username must only be in Alpha characters with no more than 20 character and a minimum of 2 characters.\n";
        okToGo = false;
    }

    if(!phoneNumber.match(/^(\d{10})$/)){
        errorMessage += "Phone number must be in digits with 10characters long. Ie: 0441234567";
        okToGo = false;
    }

    if(okToGo){
        alert("Succsess");
    } else{
        alert(errorMessage);
    }
    return okToGo;

}

/*GET DOC ID THEN WHEN FORM IS SUBMITED,
IT WILL GOES TO VALIDATE THE DATA*/
function main(){
    var regForm = document.getElementById("regForm");
    regForm.onsubmit = validateData;
}
/*INITIALIZED SCRIPT*/
window.onload = main;