let mshow = false;

function showMenu(){
    if(!mshow){
        if(window.location.pathname == "/"){
            document.querySelector(".searchBar").style.opacity = 0;
        }
        document.querySelector(".navbar").style.height = (window.innerHeight-16) + "px";
        mshow = true;
    }else{
        if(window.location.pathname == "/"){
            document.querySelector(".navbar").style.height = "105px";
            document.querySelector(".searchBar").style.opacity= 1;
        }else{
            document.querySelector(".navbar").style.height = "80px";
        }
        mshow = false;
    }
}

$('select.dropdown').dropdown();
$('.ui.checkbox').checkbox();


