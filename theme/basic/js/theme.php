
<!-- 슬릭 슬라이더 -->
<script src="../plugin/slick-1.8.0/slick/slick.min.js"></script>
<script>

$(document).ready(function(){
    var $slider = $('.main-slider'); // 이 부분 추가
  $slider.slick({
    dots: true, // 페이징을 위한 점들을 표시
    infinite: true, // 무한 루프
    speed: 1000, // 전환 속도
    slidesToShow: 1, // 한 번에 보여줄 슬라이드 수
    slidesToScroll: 1, // 한 번에 넘어갈 슬라이드 수
    autoplay: true, // 자동 재생 여부
    autoplaySpeed: 5000, // 자동 재생 시 슬라이드 전환 시간
    // 추가 옵션: https://kenwheeler.github.io/slick/
  });

    // 일시정지 버튼에 클릭 이벤트 리스너 추가
    $('#pauseButton').on('click', function() {
        if ($slider.slick('slickGetOption', 'autoplay')) {
            $slider.slick('slickSetOption', 'autoplay', false, true); // 자동 재생 중지
        } else {
            $slider.slick('slickSetOption', 'autoplay', true, true); // 자동 재생 시작
        }
        $(this).toggleClass('paused'); // 'paused' 클래스 토글
    });
});
</script>

<!-- 유튜브 api -->
<script src="https://www.youtube.com/iframe_api"></script>
<script>
function onYouTubeIframeAPIReady() {
	$('.youtube-wrap').each(function() {
		if ($(this).find('iframe').length > 0) return;

		thisVideoId = $(this).attr('video-id');
		var player = new YT.Player('youtube_player',{
			videoId:thisVideoId,
			playerVars:{
				'autoplay':1, //자동재생
				'mute':1, //음소거
				'rel':0, //뭐지
				'controls':0, //컨트롤러 표시
				'playlist':thisVideoId, //반복재생
				'loop':1, //반복재생
				'vq':'HD1080' //화질
                
			},

			events:{
				'onReady':onPlayerReady,
				'onStateChange': onPlayerStateChange
			}
		});
	});
}

function onPlayerReady(e){
	e.target.mute();
	e.target.playVideo();
}

var done = false;
function onPlayerStateChange(e) {
	if (e.data == YT.PlayerState.PLAYING && !done) {
		done = true;
	}
}

$(document).ready(function() {
	var i = 1;
	var intervalId = setInterval(function() {
		onYouTubeIframeAPIReady();
		if (i >= 10) clearInterval(intervalId);
		i++;
	}, 500);
});

</script>



<!--모바일 버튼열기-->
<script>
$(function(){
    // 메뉴 열기 버튼 클릭 이벤트
    $("#gnb_open").click(function(){
        // 'visible' 클래스 토글로 메뉴 표시 또는 숨김
        $("#gnb_all, #gnb_all_bg").toggleClass('visible');
        // 'active' 클래스 토글로 버튼 상태 변경
        $(this).toggleClass('active');
    });

    // 메뉴 닫기 버튼 및 배경 클릭 이벤트, 여기서는 메뉴 버튼 상태 변경을 하지 않습니다.
    $(".gnb_close_btn, #gnb_all_bg").click(function(){
        // 'visible' 클래스 제거로 메뉴 숨김
        $("#gnb_all, #gnb_all_bg").removeClass('visible');
        // 메뉴를 닫을 때 'active' 클래스 제거
        $("#gnb_open").removeClass('active');
    });

    // MutationObserver 설정
    var observer = new MutationObserver(function(mutations) {
        mutations.forEach(function(mutation) {
            if(mutation.attributeName === "class"){
                var target = mutation.target;
                // visible 클래스가 제거됐는지 확인
                if(!$(target).hasClass('visible')){
                    // visible 클래스가 없다면 active 클래스도 제거
                    $("#gnb_open").removeClass('active');
                }
            }
        });
    });

    // #gnb_all 요소에 대한 관찰 시작, 클래스 변화를 관찰
    observer.observe(document.getElementById("gnb_all"), {
        attributes: true // 속성 변화 감지
    });
});

</script>


<!--pc 버튼열기-->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // 화면 너비가 1050px 미만인 경우 코드 실행을 중지합니다.
    if (window.matchMedia("(max-width: 1050px)").matches) {
        return; // 조건을 만족하면 여기서 함수 실행을 중단합니다.
    }

    var gnb1daElements = document.querySelectorAll('.gnb_1da');
    var gnbAllElement = document.getElementById('gnb_all');

    function addMouseoverToGnb1da() {
        gnb1daElements.forEach(function(element) {
            element.addEventListener('mouseover', function() {
                gnbAllElement.classList.add('visible');
            });
        });
    }

    gnbAllElement.addEventListener('mouseover', function() {
        gnbAllElement.classList.add('visible');
    });

    function addConditionalMouseout() {
        gnb1daElements.forEach(function(element) {
            element.addEventListener('mouseout', function(e) {
                // 화면 너비가 1050px 미만인 경우 함수 실행을 중지합니다.
                if (window.matchMedia("(max-width: 1050px)").matches) {
                    return; // 조건을 만족하면 여기서 함수 실행을 중단합니다.
                }
                if (!gnbAllElement.contains(e.relatedTarget)) {
                    gnbAllElement.classList.remove('visible');
                }
            });
        });

        gnbAllElement.addEventListener('mouseout', function(e) {
            if (window.matchMedia("(max-width: 1050px)").matches) {
                return;
            }
            if (!gnbAllElement.contains(e.relatedTarget)) {
                gnbAllElement.classList.remove('visible');
            }
        });
    }

    addMouseoverToGnb1da();
    addConditionalMouseout();
});

</script>


<!-- 모바일 버튼열기 -->
<script>
document.addEventListener("DOMContentLoaded", function() {
    // gnb_al_a 클래스를 가진 모든 a 요소에 대해 반복
    document.querySelectorAll('.gnb_al_a').forEach(function(anchor) {
        anchor.addEventListener('click', function(event) {
            // 기본 이벤트를 방지 (a 태그의 기본 동작)
            event.preventDefault();

            // 현재 클릭된 a 태그 자체에 active 클래스 토글
            this.classList.toggle('active');

            // 현재 클릭된 a 태그의 부모 요소에서 gnb_al_ul2 클래스를 가진 ul 찾기
            var ulElement = this.parentElement.querySelector('.gnb_al_ul2');

            // ulElement가 존재하면 active 클래스 토글
            if (ulElement) {
                ulElement.classList.toggle('active');
            }
        });
    });
});
</script>




<!--헤드 아래 부분(gnb_al_li) 넓이 맞추는 자바스크립트 -->

<script>
$(window).on('load', function() {
    // 웹 폰트 및 기타 리소스 로딩 후 너비 조정 로직 실행
    adjustWidth();

    $(window).on('resize', adjustWidth); // 창 크기 조절 시 너비 조정
});

function adjustWidth() {
    // 화면 너비가 1050px 초과일 때만 실행
    if (!window.matchMedia("(max-width: 1050px)").matches) {
        $('.gnb_1dli').each(function(index) {
            // 각 .gnb_1dli 요소의 전체 너비를 계산합니다.
            var width = $(this).outerWidth(true); // 패딩, 보더, 마진을 포함한 너비

            // 각 .gnb_al_li 요소의 너비를 해당 .gnb_1dli 요소의 너비로 설정합니다.
            $('.gnb_al_li').eq(index).width(width); // 너비 조정
        });
    } else {
        // 화면 너비가 1050px 이하일 경우, 너비를 자동으로 조절
        $('.gnb_al_li').width('auto'); // 예시: 너비를 auto로 설정하여 원래 상태로 복구
    }
}
</script>



<!-- 액션 스크립트 -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // 스크롤 이벤트 리스너
    window.addEventListener('scroll', function() {
        var scrolled = window.pageYOffset;
        var bg1Elements = document.querySelectorAll('.bg1');
        if (bg1Elements.length > 0) { // .bg1 요소가 하나라도 있는 경우에만 실행
            bg1Elements.forEach(function(bg1) {
                var coef1 = -0.5; // bg1에 대한 스크롤 대비 이미지 이동 속도 조절
                bg1.style.backgroundPositionY = -(1500 + scrolled * coef1) + 'px';
            });
        }
    });

    // IntersectionObserver 설정
    let observer = new IntersectionObserver((entries, observer) => { 
        entries.forEach(entry => {
            if(entry.isIntersecting){
                entry.target.classList.add('visible');
            } else {
                entry.target.classList.remove('visible');
            }
        });
    }, {
         rootMargin: '0px 0px -100px 0px', // 필요한 경우 설정
        // threshold: 0 // 필요한 경우 설정
    });

    // 관찰 대상 요소들에 observer 적용
    document.querySelectorAll('.act, .big, .actl, .actr, .actt').forEach(box => {
        observer.observe(box);
    });
});
</script>





<!-- 배너 아래 버튼들 따라다니는 bar 정의하는 js -->
<script>
document.addEventListener("DOMContentLoaded", function() {
    const highlightBar = document.querySelector('.bar');
    const menuItems = document.querySelectorAll('.button');

    function moveHighlightToActiveItem() {
        const activeItem = document.querySelector('.button.active');
        if (activeItem) {
            const rect = activeItem.getBoundingClientRect();
            highlightBar.style.width = `${rect.width}px`;
            highlightBar.style.left = `${rect.left + window.scrollX}px`; // 현재 스크롤 위치를 고려
        } else {
            highlightBar.style.width = 0;
            highlightBar.style.left = 0;
        }
    }

    menuItems.forEach(item => {
        item.addEventListener('mouseenter', function() {
            const rect = this.getBoundingClientRect();
            highlightBar.style.width = `${rect.width}px`;
            highlightBar.style.left = `${rect.left + window.scrollX}px`; // 현재 스크롤 위치를 고려
        });
    });

    // 메뉴 컨테이너에서 마우스가 벗어났을 때, 하이라이트 바를 'active' 클래스가 있는 메뉴로 이동
    document.querySelector('.topBanner').addEventListener('mouseleave', moveHighlightToActiveItem);

    // 화면 크기가 변경될 때 하이라이트 바 위치 업데이트
    window.addEventListener('resize', moveHighlightToActiveItem);

    // 페이지 로드 시 하이라이트 초기 위치 설정
    moveHighlightToActiveItem();
});

</script>


<!-- 로딩 감추기 -->
<script>
window.onload = function() {
    // 모든 자원이 로드되었을 때 실행
    var loading = document.getElementById("loading");
    if (loading) loading.classList.add("hidden");
};
</script>


<!-- 메뉴바 내려가면 색깔바꾸기 -->

<script>
document.addEventListener('DOMContentLoaded', function() {
  // 상단 메뉴 바 선택
  var navbar = document.querySelector('#gnb');

  // 감시 대상이 되는 div 선택
  var target = document.querySelector('.dark');

  // IntersectionObserver 콜백 함수
  var callback = function(entries, observer) { 
    entries.forEach(entry => {
      if (!entry.isIntersecting) {
        // div가 뷰포트를 벗어났을 때
        navbar.classList.add('change-color');
      } else {
        // div가 뷰포트에 다시 들어왔을 때
        navbar.classList.remove('change-color');
      }
    });
  };

  // IntersectionObserver 인스턴스 생성
  var observer = new IntersectionObserver(callback, {
    rootMargin: '-100px'
  });

  // 감시 대상에 observer 적용
  observer.observe(target);
});
</script>

<!-- 탭컨텐츠 -->

<script>
function openTab(tabClassName) {
  // 모든 탭 내용을 숨깁니다
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  // 모든 탭 링크의 활성화 상태를 제거합니다
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].classList.remove("active");
  }

  // 선택된 탭에 해당하는 탭 내용을 표시하고, 탭 링크에 활성화 클래스를 추가합니다
  var selectedTabContents = document.getElementsByClassName(tabClassName);
  for (i = 0; i < selectedTabContents.length; i++) {
    selectedTabContents[i].style.display = "inline-block";
  }
  event.currentTarget.classList.add("active");
}
</script>