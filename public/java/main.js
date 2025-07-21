
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

// ******************** Enhanced Cards ***************
document.addEventListener('DOMContentLoaded', function() {
    // Animate title letters
    animateTitleLetters();
    
    // Add enhanced card interactions
    const cards = document.querySelectorAll('.shose .box .card');
    
    cards.forEach((card, index) => {
        // Add staggered animation delay
        card.style.animationDelay = `${index * 0.1}s`;
        
        // Add click effect
        card.addEventListener('click', function(e) {
            // Don't trigger if clicking on buttons or links
            if (e.target.closest('button') || e.target.closest('a')) {
                return;
            }
            
            this.style.transform = 'translateY(-15px) scale(1.02)';
            setTimeout(() => {
                this.style.transform = '';
            }, 200);
        });
        
        // Add hover sound effect (optional)
        card.addEventListener('mouseenter', function() {
            this.style.transition = 'all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275)';
        });
        
        // Add parallax effect to card images
        const cardImg = card.querySelector('.image img');
        if (cardImg) {
            card.addEventListener('mousemove', function(e) {
                const rect = this.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;
                
                const centerX = rect.width / 2;
                const centerY = rect.height / 2;
                
                const rotateX = (y - centerY) / 20;
                const rotateY = (centerX - x) / 20;
                
                cardImg.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) scale(1.08)`;
            });
            
            card.addEventListener('mouseleave', function() {
                cardImg.style.transform = 'perspective(1000px) rotateX(0deg) rotateY(0deg) scale(1)';
            });
        }
        
        // Add like button animation
        const likeBtn = card.querySelector('.like-btn');
        if (likeBtn) {
            likeBtn.addEventListener('click', function(e) {
                e.preventDefault();
                this.classList.toggle('fa-solid');
                this.classList.toggle('fa-regular');
                
                if (this.classList.contains('fa-solid')) {
                    this.style.animation = 'pulse 0.6s ease-in-out';
                    setTimeout(() => {
                        this.style.animation = '';
                    }, 600);
                }
            });
        }
        
        // Add quick view functionality
        const quickView = card.querySelector('.quick-view');
        if (quickView) {
            quickView.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                
                // Add ripple effect
                const ripple = document.createElement('span');
                ripple.classList.add('ripple');
                this.appendChild(ripple);
                
                setTimeout(() => {
                    ripple.remove();
                }, 600);
                
                // Show modal
                const modal = document.getElementById('quickViewModal');
                modal.classList.add('show');
                
                // Add modal close functionality
                const closeModal = document.getElementById('closeModal');
                closeModal.addEventListener('click', function() {
                    modal.classList.remove('show');
                });
                
                // Close modal when clicking outside
                modal.addEventListener('click', function(e) {
                    if (e.target === modal) {
                        modal.classList.remove('show');
                    }
                });
            });
        }
    });
    
    // Add image loading functionality
    const images = document.querySelectorAll('.shose .box .card .image img');
    images.forEach(img => {
        if (img.complete) {
            img.classList.add('loaded');
        } else {
            img.addEventListener('load', function() {
                this.classList.add('loaded');
            });
        }
    });
    
    // Add intersection observer for card animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const cardObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);
    
    cards.forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(30px)';
        cardObserver.observe(card);
    });
    
    // Add smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
    
    // Add loading spinner functionality
    const loadingSpinner = document.getElementById('loadingSpinner');
    if (loadingSpinner) {
        // Show spinner on page load
        loadingSpinner.classList.add('show');
        
        // Hide spinner when page is fully loaded
        window.addEventListener('load', function() {
            setTimeout(() => {
                loadingSpinner.classList.remove('show');
            }, 500);
        });
    }
    
    // Add keyboard navigation for modal
    document.addEventListener('keydown', function(e) {
        const modal = document.getElementById('quickViewModal');
        if (modal && modal.classList.contains('show')) {
            if (e.key === 'Escape') {
                modal.classList.remove('show');
            }
        }
    });
});

// ******************** END Enhanced Cards ***************
// ********************cards ***************
function animateTitleLetters() {
    const letters = document.querySelectorAll('.letter');
    
    letters.forEach((letter, index) => {
        setTimeout(() => {
            letter.classList.add('animate');
        }, index * 100);
    });
}

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
//   document.addEventListener("DOMContentLoaded", function () {
//   fetch("/liked-products")
//       .then(response => response.json())
//       .then(likedProducts => {
//           likedProducts.forEach(productId => {
//               let heartIcon = document.querySelector(`.like-btn[data-id='${productId}']`);
//               if (heartIcon) {
//                   heartIcon.classList.remove("fa-regular");
//                   heartIcon.classList.add("fa-solid");
//                   heartIcon.setAttribute("data-liked", "true");
//               }
//           });
//       }).catch(error => console.error("خطأ في جلب بيانات الإعجاب!", error));
  
//   // كود إدارة زر الإعجاب
//   const likeButtons = document.querySelectorAll(".like-btn");

//   likeButtons.forEach(button => {
//       button.addEventListener("click", function (event) {
//           event.preventDefault(); // منع إعادة تحميل الصفحة عند الضغط على الزر

//           let liked = this.getAttribute("data-liked") === "true";
//           this.setAttribute("data-liked", liked ? "false" : "true");

//           // تغيير الأيقونة بناءً على حالة الإعجاب
//           this.classList.toggle("fa-regular");
//           this.classList.toggle("fa-solid");

//           // إرسال الطلب إلى السيرفر باستخدام Fetch API
//           fetch(this.closest("form").action, {
//               method: "POST",
//               body: new FormData(this.closest("form")),
//           }).then(response => response.json())
//             .then(data => {
//                 console.log("تم تحديث الإعجاب!", data);
//             }).catch(error => console.error("حدث خطأ!", error));
//       });
//   });
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
    })
    .catch(error => console.error("خطأ في جلب بيانات الإعجاب!", error));

  const likeButtons = document.querySelectorAll(".like-btn");

  likeButtons.forEach(button => {
    button.addEventListener("click", function (event) {
      event.preventDefault();

      const form = this.closest("form");

      fetch(form.action, {
        method: "POST",
        body: new FormData(form),
      })
        .then(response => response.json())
        .then(data => {
          console.log("تم تحديث الإعجاب!", data);

          // تأكد من أن السيرفر يرجع status أو success
          if (data.success) {
            const isLiked = data.liked; // السيرفر يرجّع liked = true or false

            this.setAttribute("data-liked", isLiked ? "true" : "false");

            if (isLiked) {
              this.classList.remove("fa-regular");
              this.classList.add("fa-solid");
            } else {
              this.classList.remove("fa-solid");
              this.classList.add("fa-regular");
            }
          } else {
            console.error("فشل في تحديث الإعجاب في السيرفر.");
          }
        })
        .catch(error => console.error("حدث خطأ!", error));
    });
  });
});


// *****************************************************************************************
// ****************************************filter*************************************************
function filterProducts(season) {
    const cards = document.querySelectorAll('.card');

    cards.forEach(card => {
        const cardSeason = card.getAttribute('data-season');

        if (season === 'all' || cardSeason === season) {
            card.style.display = 'block';
        } else {
            card.style.display = 'none';
        }
    });
}
// ****************************************filter*************************************************
