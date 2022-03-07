$(document).ready(function () {
  // $(".readmore").on('click',function(){

  $(".readmore").click(function () {
    $(".textbind").toggleClass("textmore");
    $(".readmore").text(function (i, v) {
      if ($(this).hasClass("btn-primary")) {
        $(this).addClass("btn-danger");
        $(this).removeClass("btn-primary");
      } else {
        $(this).addClass("btn-primary");
        $(this).removeClass("btn-danger");
      }
      return v === "Read Less" ? "Read More" : "Read Less";
    });
  });

  $(".readmore2").click(function () {
    $(".textbind2").toggleClass("textmore2");
    $(".readmore2").text(function (i, v) {
      if ($(this).hasClass("btn-dark")) {
        $(this).addClass("btn-danger");
        $(this).removeClass("btn-dark");
      } else {
        $(this).addClass("btn-dark");
        $(this).removeClass("btn-danger");
      }
      return v === "Read Less" ? "Read More" : "Read Less";
    });
  });

  $(".readmore3").click(function () {
    $(".textbind3").toggleClass("textmore3");
    $(".readmore3").text(function (i, v) {
      if ($(this).hasClass("btn-primary")) {
        $(this).addClass("btn-danger");
        $(this).removeClass("btn-primary");
      } else {
        $(this).addClass("btn-primary");
        $(this).removeClass("btn-danger");
      }
      return v === "Read Less" ? "Read More" : "Read Less";
    });
  });

  $(".secread").click(function () {
    $("#hide").toggleClass("reveal");
    $(".text").text(function (i, v) {
      return v === "Read Less" ? "Read More" : "Read Less";
    });
  });

  $(".section2").click(function () {
    $(".hide2").toggleClass("reveal2");
    $(".text1").text(function (i, v) {
      return v === "Read Less" ? "Read More" : "Read Less";
    });
  });
});

// back to top button using js
var mybutton = document.getElementById("btn-back-to-top");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function () {
  scrollFunction();
};

function scrollFunction() {
  if (
    //  document.body.scrollTop > 50 ||
    document.documentElement.scrollTop > 1900
    // document.documentElement.scrollTop += 1200 (continuosly running towards till reach the end of the site)
  ) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}
// When the user clicks on the button, scroll to the top of the document
mybutton.addEventListener("click", backToTop);

function backToTop() {
  //   document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}

/*



--------------------NOTES-------------------------


return v === 'Read Less' ? 'Read More' : 'Read Less' (conditional ? expression_when_true : expression_when_false;)

[sources for read more & read less buttons codepen:https://codepen.io/avin045/pen/dyvQoqY?editors=1010]:


 only the color changing

 $(".readmore").click(function () {
    if ($(this).hasClass("btn-primary")) {
       $(this).addClass("btn-danger");
       $(this).removeClass("btn-primary");
    }
    else {
       $(this).addClass("btn-primary");
       $(this).removeClass("btn-danger");
    }
 });



change the inner text of the button
    $(".pushme2").click(function(){
      $(this).text(function(i, v){
         return v === 'PUSH ME' ? 'PULL ME' : 'PUSH ME'
      });

   });

function(index,currentcontent)
Optional. Specifies a function that returns the new text content for the selected elements
index - Returns the index position of the element in the set
currentcontent - Returns current content of selected elements

*/
