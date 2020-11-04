function toggleDisplay(id){
    object = document.getElementById(id);
    console.log(id);
    console.log(object);
    if(object.style.display != "block"){
        console.log('not shown');
        object.style.display ='block';
    }else{
        console.log("shown");
        object.style.display ='none';
    }
}