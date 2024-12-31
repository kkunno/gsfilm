$(function(){
	
	// 모바일 메뉴 버튼
	$(".btn-menu").on("click", function(){
		$(this).toggleClass("on");
		$('body').toggleClass("noscroll");
	});

	// 메뉴 동작
	$(".nav-wrap > ul > li").on("mouseover", function(){
		$(this).parent("ul").addClass("active");
		$(".nav-subbg").addClass("active");
	});
	$(".nav-wrap > ul > li").on("mouseleave", function(){
		$(this).parent("ul").removeClass("active");
		$(".nav-subbg").removeClass("active");
	});


	// 컨텐츠 부드럽게
	function isElementUnderBottom(elem, triggerDiff) {
        const { top } = elem.getBoundingClientRect();
        const { innerHeight } = window;
        return top > innerHeight + (triggerDiff || 0);
        }

        function handleScroll() {
        const elems = document.querySelectorAll('.up-on-scroll');
        elems.forEach(elem => {
            if (isElementUnderBottom(elem, -20)) {
            elem.style.opacity = "0";
            elem.style.transform = 'translateY(250px)';
            } else {
            elem.style.opacity = "1";
            elem.style.transform = 'translateY(0px)';
            }
        })
    }
    window.addEventListener('scroll', handleScroll);


});
