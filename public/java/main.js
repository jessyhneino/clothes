
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


    // document.addEventListener("DOMContentLoaded", function () {
    //     const likeButtons = document.querySelectorAll(".like-btn");

    //     likeButtons.forEach(button => {
    //         button.addEventListener("click", function (event) {
    //             event.preventDefault(); // منع إعادة تحميل الصفحة عند الضغط على الزر

    //             let liked = this.getAttribute("data-liked") === "true";
    //             this.setAttribute("data-liked", liked ? "false" : "true");

    //             // تغيير الأيقونة بناءً على حالة الإعجاب
    //             this.classList.toggle("fa-regular");
    //             this.classList.toggle("fa-solid");

    //             // إرسال الطلب إلى السيرفر باستخدام Fetch API
    //             fetch(this.closest("form").action, {
    //                 method: "POST",
    //                 body: new FormData(this.closest("form")),
    //             }).then(response => response.json())
    //               .then(data => {
    //                   console.log("تم تحديث الإعجاب!", data);
    //               }).catch(error => console.error("حدث خطأ!", error));
    //         });
    //     });
    // });
    document.addEventListener("DOMContentLoaded", function () {
    fetch("/liked-products")
        .then(response => response.json())
        .then(likedProducts => {
            likedProducts.forEach(productId => {
                let heartIcon = document.querySelector(`.like-btn[data-id='${productId}']`);
                if (heartIcon) {
                    heartIcon.classList.remove("fa-regular");
                    heartIcon.classList.add("fa-solid");
                    heartIcon.setAttribute("data-liked", "true");
                }
            });
        }).catch(error => console.error("خطأ في جلب بيانات الإعجاب!", error));
    
    // كود إدارة زر الإعجاب
    const likeButtons = document.querySelectorAll(".like-btn");

    likeButtons.forEach(button => {
        button.addEventListener("click", function (event) {
            event.preventDefault(); // منع إعادة تحميل الصفحة عند الضغط على الزر

            let liked = this.getAttribute("data-liked") === "true";
            this.setAttribute("data-liked", liked ? "false" : "true");

            // تغيير الأيقونة بناءً على حالة الإعجاب
            this.classList.toggle("fa-regular");
            this.classList.toggle("fa-solid");

            // إرسال الطلب إلى السيرفر باستخدام Fetch API
            fetch(this.closest("form").action, {
                method: "POST",
                body: new FormData(this.closest("form")),
            }).then(response => response.json())
              .then(data => {
                  console.log("تم تحديث الإعجاب!", data);
              }).catch(error => console.error("حدث خطأ!", error));
        });
    });
});

// *****************************************************************************************







