
	$(document).ready(function() {
	
		// editor 4
		CKEDITOR.replace( 'post_content' );
	
		// HOW TO EDITED A TAB TOOL
		CKEDITOR.replace( 'dialogDefinition', function(e) {
			dialogName = e.data.name;
			console.log(dialogName);
	
		} )




		(function($) {
			"use strict";
		
			// Add active state to sidbar nav links
			var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
				$("#layoutSidenav_nav .sb-sidenav a.nav-link").each(function() {
					if (this.href === path) {
						$(this).addClass("active");
					}
				});
		
			// Toggle the side navigation
			$("#sidebarToggle").on("click", function(e) {
				e.preventDefault();
				$("body").toggleClass("sb-sidenav-toggled");
			});
		})(jQuery);
		
	
	
	
	
		
	
	});
	


	
