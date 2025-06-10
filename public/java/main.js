
// ********************humberger ***************

function toggleMenu() {
    const nav = document.querySelector('.nav-half');
    nav.classList.toggle('active');
}
// ********************end humberger ***************

// ********************swiper ***************
var swiper = new Swiper(".cloth-slider", {
  spaceBetween: 20,
  grabCursor:true,
  loop:true,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  pagination: {
  el: ".swiper-pagination",
  clickable:true,
  }, 
  breakpoints: {
    540: {
      slidesPerView: 1,
    },
    768: {
      slidesPerView: 2,
    },
    1024: {
      slidesPerView: 3,
    },
  },
});
// ********************end swiper ***************

// ********************clock ***************
setInterval(()=>{
let hours = document.getElementById("hours");
let minutes = document.getElementById("minutes");
let seconds= document.getElementById("seconds");
let ampm= document.getElementById("ampm");

let hh=document.getElementById("hh");
let mm=document.getElementById("mm");
let ss=document.getElementById("ss");

let hr_dot=document.querySelector(".hr_dot")
let min_dot=document.querySelector(".min_dot")
let sec_dot=document.querySelector(".sec_dot")

let h = new Date().getHours();
let m = new Date().getMinutes();
let s = new Date().getSeconds();
let am = h >= 12 ? "PM" : "AM";

if(h > 12)
{
    h = h - 12;
}
h = (h < 10) ? "0" + h : h;
m = (m < 10) ? "0" + m : m;
s = (s < 10) ? "0" + s : s;

hours.innerHTML= h + "<br><span>Hours</span>";
minutes.innerHTML= m + "<br><span>Minutes</span>";
seconds.innerHTML= s + "<br><span>Seconds</span>";
ampm.innerHTML = am;

hh.style.strokeDashoffset=440-(440*h) /12;
mm.style.strokeDashoffset=440-(440*m) /60;
ss.style.strokeDashoffset=440-(440*s) /60;

hr_dot.style.transform = `rotate(${ h * 30 }deg)`;
min_dot.style.transform = `rotate(${ m * 6 }deg)`;
sec_dot.style.transform = `rotate(${s * 6}deg)`;

})

// ********************end clock ***************

// ********************HOME ***************

    // document.addEventListener("DOMContentLoaded", function() {
    //     const homeSection = document.getElementById('Home');
    //     const hpElements = document.querySelectorAll('.HP, .home-btn1, .home-img');

    //     function showElements() {
    //         homeSection.classList.add('show');
    //         hpElements.forEach((el, index) => {
    //             setTimeout(() => {
    //                 el.classList.add('animate');
    //             }, index * 300); // Delay for each element
    //         });
    //     }

    //     function hideElements() {
    //         homeSection.classList.remove('show');
    //         hpElements.forEach(el => {
    //             el.classList.remove('animate');
    //         });
    //     }

    //     // Event listener for scrolling to the Home section
    //     window.addEventListener('scroll', () => {
    //         const rect = homeSection.getBoundingClientRect();
    //         if (rect.top >= 0 && rect.bottom <= window.innerHeight) {
    //             showElements();
    //         } else {
    //             hideElements();
    //         }
    //     });

    //     // Initial hide
    //     hideElements();

    //     // Show elements immediately on page load
    //     showElements();
    // });
    



// ******************** END HOME ***************

// ******************** search ***************

function performSearch() {
            var query = document.getElementById("searchInput").value.trim();
            var elements = document.querySelectorAll(".container-new");

            elements.forEach(function(element) {
                element.innerHTML = element.dataset.originalText; 
            });

            if (query === "") return; // لا شيء للبحث عنه

            elements.forEach(function(element) {
                var text = element.innerHTML;
                var regex = new RegExp(`(${query})`, "gi");
                var highlightedText = text.replace(regex, `<span class="highlight">$1</span>`);
                element.innerHTML = highlightedText;
            });
        }
        document.addEventListener("DOMContentLoaded", function() {
            var elements = document.querySelectorAll(".container-new");
            elements.forEach(function(element) {
                element.dataset.originalText = element.innerHTML; 
            });
        });
// ******************** END search ***************
// ********************cards ***************
function animateLetters() {
    const heading = document.querySelector(".head-shose");
    const text = heading.textContent;
    heading.innerHTML = ""; 

    text.split("").forEach((char, index) => {
        const span = document.createElement("span");
        span.textContent = char;
        span.classList.add("letter");
        heading.appendChild(span);

        setTimeout(() => {
            span.style.opacity = 1;
            span.style.transform = "translateY(0)";
        }, index * 100); 
    });

    setTimeout(() => {
        const letters = document.querySelectorAll(".letter");
        letters.forEach((span, index) => {
            setTimeout(() => {
                span.style.opacity = 0;
                span.style.transform = "translateY(20px)";
            }, index * 100);
        });
    }, text.length * 100 + 1000); 

    setTimeout(animateLetters, text.length * 100 + 2000);
}

document.addEventListener("DOMContentLoaded", animateLetters);

// ******************** END cards ***************

// ********************button ***************

var animateButton = function(e) {
    e.preventDefault(); 
    var link = e.target.parentElement.href;

    e.target.classList.add("animate");

    setTimeout(() => {
        window.location.href = link; 
    }, 500); 

    setTimeout(() => {
        e.target.classList.remove("animate");
    }, 500); 
};

var buttonLook = document.getElementsByClassName("button-look");
for (var i = 0; i < buttonLook.length ; i++) {
    buttonLook[i].addEventListener("click", animateButton, false);
}

// ********************end button ***************

   

    $(document).ready(function(){
        
        $('.like-btn').click(function(){
            var categoryId = $(this).data('id');
            var likeCount = $(this).siblings('.likes-count');
            var isLiked = $(this).data('liked') === "true"; // التحقق من حالة الإعجاب الحالية
            var newLikedState = isLiked ? "false" : "true";
            var newHeartIcon = isLiked ? "fa-regular fa-heart" : "fa-solid fa-heart"; // تغيير الأيقونة

            $.post('/toggle-like/' + categoryId, {
                _token: '{{ csrf_token() }}',
                liked: newLikedState
            }, function(data){
                likeCount.text(data.likes); // تعديل المفتاح هنا أيضًا
            });

            $(this).data('liked', newLikedState);
            $(this).removeClass().addClass(newHeartIcon);
        });
    });





