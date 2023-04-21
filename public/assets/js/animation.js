$(document).ready(function() {
    // Hide the login and register sections on page load
    $(".login").hide();
    $(".register").hide();

    // Show the home section with a slow animation
    $(".home").show("slow", function() {
        // Animation complete.
    });

    // Add click event listeners to the login, register, and back buttons
    $('#login').click(function(event) {
        // Prevent the default behavior of the link
        event.preventDefault();

        // Hide the home section with a slow animation, then show the login section with a slow animation
        $(".home").hide(1000, function() {
            $(".login").show(1000);
        });
    });

    $('#register').click(function(event) {
        // Prevent the default behavior of the link
        event.preventDefault();

        // Hide the home section with a slow animation, then show the register section with a slow animation
        $(".home").hide(1000, function() {
            $(".register").show(1000);
        });
    });

    $('#back').click(function(event) {
        // Prevent the default behavior of the link
        event.preventDefault();

        // Hide the login and register sections with a slow animation, then show the home section with a slow animation
        $(".login, .register").hide(1000, function() {
            $(".home").show(1000);
        });
    });
});
