$('.count-this').each(function () {
    document.getElementById('count-this').style.display="inline-block";
	// Start the counting from a specified number - in this case, 0!
    $(this).prop('Counter',0).animate({
        Counter: $(this).text()
    }, {
    	// Speed of counter in ms, default animation style
        duration: 2000,
        easing: 'swing',
        step: function (now) {
        	// Round up the number
            $(this).text(Math.ceil(now));
        }
    });
});