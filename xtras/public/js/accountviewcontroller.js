/**
 * Created by besitzer on 13.01.15.
 */


function enableTexts(){
    var textFields = document.getElementsByClassName('form-control');
    var submit = document.getElementById('save');
    submit.removeAttribute("disabled");


    for(var i = 0; i < textFields.length; i++){
        textFields[i].removeAttribute("disabled");


    }


}
function disablebutton(){

    var submit = document.getElementById('save');
    submit.setAttribute("disabled");

}


