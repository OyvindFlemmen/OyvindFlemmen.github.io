let imgIndex = 0;
let imageSources = ['me.jpg', 'ski.png', 'rundkast.png', 'peng.png'];

function changeImg(index){
    //Fetches the element
    let img = document.getElementById("aboutImg");
    //Adjusts the index
    imgIndex += index;
    

    //Ensures that we don't exceed boundaries 
    if(imgIndex < 0) imgIndex = imageSources.length-1;
    if(imgIndex >= imageSources.length) imgIndex = 0;
    
    //Sets the image source
    img.src = imageSources[imgIndex];
}