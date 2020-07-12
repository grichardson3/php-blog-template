// var objectAnim = document.querySelectorAll(".logo");

(function () {
  console.log("App running");

  // gsap.from(objectAnim, { duration: 1, ease: "power2.out", x: -200 });
})();

$("#myCarousel").on("slide.bs.carousel", function () {
  console.log("Slide changed");
});
