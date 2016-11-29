// Help Slide
$(document).ready(function(){
  $('#help-button').click(function() {
      if ($("#right-slide-left").hasClass('right-slide-left-animate')) {
          $('#right-slide-left').removeClass("right-slide-left-animate");
	//   $(".preview-container").removeClass("preview-container-help");
	  $("#main-padded-container").removeClass("main-container-slide-left");
          $('.sidebar-nav-container-header').removeClass("sidebar-nav-container-header-active");
          $('.help-header-link').css("color", "#666");
      } else {
          $('#right-slide-left').addClass("right-slide-left-animate");
	//   $(".preview-container").addClass("preview-container-help");
	  $("#main-padded-container").addClass("main-container-slide-left");
          $('.sidebar-nav-container-header').addClass("sidebar-nav-container-header-active");
          $('.help-header-link').css("color", "white");
      };
  });
});

// Help Containers

// Preview JS

// Step 1 | Choose Account - Show / Hide
$('.account-show-hide-button').click(function() {
	// Show / Hide Conditions Container
	$('.account-show-hide').slideToggle("slow");
	// Rotate Arrow 180 Degree / Click
	$('#account-arrow-icon').toggleClass('fa-chevron-up fa-chevron-down');
});

// Step 2 | Choose Caption - Show / Hide
$('.caption-show-hide-button').click(function() {
	// Show / Hide Conditions Container
	$('.caption-show-hide').slideToggle("slow");
	// Rotate Arrow 180 Degree / Click
	$('#caption-arrow-icon').toggleClass('fa-chevron-up fa-chevron-down');
});

// Step 3 | Add Image - Show / Hide
$('.image-show-hide-button').click(function() {
	// Show / Hide Conditions Container
	$('.image-show-hide').slideToggle("slow");
	// Rotate Arrow 180 Degree / Click
	$('#image-arrow-icon').toggleClass('fa-chevron-up fa-chevron-down');
});

// Step 4 | Share - Show / Hide
$('.share-show-hide-button').click(function() {
	// Show / Hide Conditions Container
	$('.share-show-hide').slideToggle("slow");
	// Rotate Arrow 180 Degree / Click
	$('#share-arrow-icon').toggleClass('fa-chevron-up fa-chevron-down');
});

// Next Step 1 - 2 | Show / Hide
$('#step2button').click(function() {
	// Show / Hide Conditions Container
	$('.caption-show-hide').slideToggle("slow");
	// Rotate Arrow 180 Degree / Click
	$('#caption-arrow-icon').toggleClass('fa-chevron-up fa-chevron-down');
	// Show / Hide Conditions Container
	$('.account-show-hide').slideToggle("slow");
	// Rotate Arrow 180 Degree / Click
	$('#account-arrow-icon').toggleClass('fa-chevron-up fa-chevron-down');
});

// Next Step 2 - 3 | Show / Hide
$('#step3button').click(function() {
	// Show / Hide Conditions Container
	$('.image-show-hide').slideToggle("slow");
	// Rotate Arrow 180 Degree / Click
	$('#image-arrow-icon').toggleClass('fa-chevron-up fa-chevron-down');
	// Show / Hide Conditions Container
	$('.caption-show-hide').slideToggle("slow");
	// Rotate Arrow 180 Degree / Click
	$('#caption-arrow-icon').toggleClass('fa-chevron-up fa-chevron-down');
});

// Next Step 3 - 4 | Show / Hide
$('#step4button').click(function() {
	// Show / Hide Conditions Container
	$('.image-show-hide').slideToggle("slow");
	// Rotate Arrow 180 Degree / Click
	$('#image-arrow-icon').toggleClass('fa-chevron-up fa-chevron-down');
	// Show / Hide Conditions Container
	$('.share-show-hide').slideToggle("slow");
	// Rotate Arrow 180 Degree / Click
	$('#share-arrow-icon').toggleClass('fa-chevron-up fa-chevron-down');
});

// Prev Step 1 - 2 | Show / Hide
$('#step2prevbutton').click(function() {
	// Show / Hide Conditions Container
	$('.caption-show-hide').slideToggle("slow");
	// Rotate Arrow 180 Degree / Click
	$('#caption-arrow-icon').toggleClass('fa-chevron-up fa-chevron-down');
	// Show / Hide Conditions Container
	$('.account-show-hide').slideToggle("slow");
	// Rotate Arrow 180 Degree / Click
	$('#account-arrow-icon').toggleClass('fa-chevron-up fa-chevron-down');
});

// Prev Step 2 - 1 | Show / Hide
$('#step3prevbutton').click(function() {
	// Show / Hide Conditions Container
	$('.image-show-hide').slideToggle("slow");
	// Rotate Arrow 180 Degree / Click
	$('#image-arrow-icon').toggleClass('fa-chevron-up fa-chevron-down');
	// Show / Hide Conditions Container
	$('.caption-show-hide').slideToggle("slow");
	// Rotate Arrow 180 Degree / Click
	$('#caption-arrow-icon').toggleClass('fa-chevron-up fa-chevron-down');
});
