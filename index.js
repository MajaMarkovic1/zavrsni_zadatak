 var myBtn = document.getElementById('btn');
 var comments = document.getElementById("comments")
myBtn.addEventListener('click', function(){
    //console.log('click listener')
    
    //console.log(comments.style)
    if (comments.style.visibility == "hidden"){

        comments.style.visibility = "visible";
        myBtn.innerText = 'hide comments';
        
    } else {
        
        comments.style.visibility = "hidden";
        myBtn.innerText = 'show comments';
    }

})



  
  
    

    

 