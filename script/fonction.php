<script>

function visibilite(){
    console.log(document.getElementById("cacher").style.visibility)
    if (document.getElementById("cacher").style.visibility == "hidden"){
        document.getElementById("cacher").style.visibility="visible";
    }
    else{
        document.getElementById("cacher").style.visibility="hidden";
    }
    
}


function setupListeners(){
    let modif = document.getElementById("modif");
    modif.addEventListener("click", visibilite);

}
window.addEventListener("load", setupListeners);


</script>