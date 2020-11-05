function toggleDisplay(id){
    object = document.getElementsByClassName(id);
    if(object[0].style.display != "inline-block"){
        let i = 0;
        while(i < object.length){
            object[i].style.display ='inline-block';
            i++;
        }
    }else{
        let i = 0;
        while(i < object.length){
            object[i].style.display ='none';
            i++;
        }
    }
}
console.log(document.getElementById('typeOfTest').value);