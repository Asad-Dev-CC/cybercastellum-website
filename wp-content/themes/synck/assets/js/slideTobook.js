document.addEventListener("DOMContentLoaded", function() {
  var slideBtn = document.getElementById("slide-btn");
  var slideBall = document.getElementById("slide-ball");
  
  if (slideBtn && slideBall) {
    slideBall.addEventListener("mousedown", function(event) {
      var hideText = document.getElementById("hide-text-on-slide");
      var initialX = event.clientX;
      var maxWidth = slideBall.parentElement.clientWidth - slideBall.clientWidth;
      
      function moveBall(event) {
        var newX = Math.min(maxWidth, Math.max(0, slideBall.offsetLeft + event.clientX - initialX));
        slideBall.style.left = newX + "px";
        hideText.style.width = newX + 20 + "px";
        if (newX > 550) {
          slideBtn.style.display = "none";
        }
      }
      
      function stopMoving() {
        document.removeEventListener("mousemove", moveBall);
        document.removeEventListener("mouseup", stopMoving);
        
        if (parseInt(slideBall.style.left) < 551) {
          slideBall.style.transition = "left 0.5s";
          slideBall.style.left = "0px";
          setTimeout(function() {
            slideBall.style.transition = "none";
            slideBtn.style.display = "block"; // Reset slide button visibility
          }, 500);
          var redirectUrl = slideBtn.getAttribute("data-redirect-url");
          if (redirectUrl) {
            window.location.href = redirectUrl; // Redirect to the specified URL
          }
        }
      }
      
      document.addEventListener("mousemove", moveBall);
      document.addEventListener("mouseup", stopMoving);
    });

    // Touch event listeners
    slideBall.addEventListener("touchstart", function(event) {
      var hideText = document.getElementById("hide-text-on-slide");
      var initialX = event.touches[0].clientX;
      var maxWidth = slideBall.parentElement.clientWidth - slideBall.clientWidth;
      
      function moveBall(event) {
        var newX = Math.min(maxWidth, Math.max(0, slideBall.offsetLeft + event.touches[0].clientX - initialX));
        slideBall.style.left = newX + "px";
        hideText.style.width = newX + 20 + "px";
        if (newX > 550) {
          slideBtn.style.display = "none";
        }
      }
      
      function stopMoving() {
        document.removeEventListener("touchmove", moveBall);
        document.removeEventListener("touchend", stopMoving);
        
        if (parseInt(slideBall.style.left) < 551) {
          slideBall.style.transition = "left 0.5s";
          slideBall.style.left = "0px";
          setTimeout(function() {
            slideBall.style.transition = "none";
            slideBtn.style.display = "block"; // Reset slide button visibility
          }, 500);
          var redirectUrl = slideBtn.getAttribute("data-redirect-url");
          if (redirectUrl) {
            window.location.href = redirectUrl; // Redirect to the specified URL
          }
        }
      }
      
      document.addEventListener("touchmove", moveBall);
      document.addEventListener("touchend", stopMoving);
    });
  }
});
