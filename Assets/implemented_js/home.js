var readMorebtn1 = document.querySelector(".readmore"); //readmore button from HTML
var paragraphtext = document.querySelector(".textbind");

var readMorebtn2 = document.querySelector(".readmore2");
var text = document.querySelector(".textbind2");

var readMorebtn3 = document.querySelector(".readmore3");
var text3 = document.querySelector(".textbind3");

readMorebtn1.addEventListener("click",(e)=>{
 paragraphtext.classList.toggle("textmore");
   if (readMorebtn1.innerText === "Read More") {
    readMorebtn1.innerText = "Read Less";
  } else {
    readMorebtn1.innerText = "Read More";
  }
});


readMorebtn2.addEventListener("click",(e)=>{
 text.classList.toggle("textmore2");
   if (readMorebtn2.innerText === "Read More") {
    readMorebtn2.innerText = "Read Less";
  } else {
    readMorebtn2.innerText = "Read More";
  }
});


readMorebtn3.addEventListener("click",(e)=>{
 text3.classList.toggle("textmore3");
   if (readMorebtn3.innerText === "Read More") {
    readMorebtn3.innerText = "Read Less";
  } else {
    readMorebtn3.innerText = "Read More";
  }
});
























// link:https://youtu.be/TvVY8c1uvG8