function loadPage(href, callBack){
//document.getElementById('spinner').style.display='block';
var xhr = new XMLHttpRequest();
xhr.onload= function(){
if(this.readyState == 4 && this.status == 200){
    //document.GetElementById('spinner').style.display='none';
    callBack(this);
}
};
xhr.open("GET", href, true);
xhr.send();
}

function callBack(result){
    console.log(result);
    //'this is returned text'
    return document.getElementById("content").innerHTML = result.response;
}