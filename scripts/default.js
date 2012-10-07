$(document).ready(function(){
			
	//Setup archive menu	
	var list = $("#archive-menu-list");
	list.appendTo(".archive-menu");
	
	//Setup categories menu
	var cat_list = $("#category-menu-list");
	cat_list.appendTo(".category-menu");
	
	/* Setup the drop-down menus */
	$(function(){
			$("ul.menu li").hover(function(){
					$(this).addClass("hover");
					$('ul:first',this).show();
			}, function(){
				$(this).removeClass("hover");
				$('ul:first',this).hide();
			});
    
			$("ul.menu-main-menu li ul li:has(ul)").find("a:first").append(" &raquo; ");
			
			$("ul.menu").fadeIn("slow");
    	});
    	
    	/* Disable top-level links*/
    	$(".dropdown-menu > a").attr("href","#").click(function(){return false;});
    	
    	//Create container for portrait images
    	$(".portrait").parent().attr("style", "text-align: center ! important;");
});
