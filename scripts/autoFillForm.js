/** 
  * Author       : SanJeosutin
  * Target       : register.html
  * Purpose      : To redirect user from index.html to register.html with pre-filled out ref number
  * Created      : 22-Jun-2020
  * Last updated : 22-Jun-2020
 **/
"use strict";

/*GET DOC ID THEN WHEN FORM IS SUBMITED,
IT WILL GOES TO VALIDATE THE DATA*/
function main(){
    const urlString = window.location.search;
    const urlParams = new URLSearchParams(urlString);

    window.addEventListener('load', function () {
        document.getElementById("sRefNumber").value = urlParams.get('refNum');
      });

}
/*INITIALIZED SCRIPT*/
window.onload = main();