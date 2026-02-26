export default {
  init() {
    // JavaScript to be fired on the home page
  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS

  //Nav button
  const mobileNav = document.getElementsByClassName('hidden-nav')[0];


  const nav = document.querySelector('.banner')
  window.addEventListener('scroll', () => {
    let scrolled = window.scrollY;
    if (scrolled > 0) {
      nav.classList.add('sticky')
      mobileNav.classList.remove('active')
    } else {
      nav.classList.remove('sticky')
    }
    if (document.querySelector('.background-overlay')) {
      let start = window.scrollY + document.querySelector('.background-overlay').getBoundingClientRect().bottom
      if (scrolled > start - 200) {
        nav.classList.add('inview')
      } else {
        nav.classList.remove('inview')
      }
    } else {
      return
    }
  })

  // slider scroll
    const scroller = document.querySelector('.hero')
    const elements = document.querySelectorAll('.image-scroll-el')

    let isDragged = false;
    let startX;
    let scrollLeft;

    // Mouse event
    scroller.addEventListener('mousedown', slideStart)
    scroller.addEventListener('mouseup', slideEnd)
    scroller.addEventListener('mouseleave', slideEnd)
    scroller.addEventListener('mousemove', slideMove)

    // Scroll event
    scroller.addEventListener('scroll', slideScroll)

    let timer = null;
    function slideScroll() {
      if (isDragged) return
      elements.forEach(el => {
        el.querySelector('img').classList.add('dragging')
      })
      window.clearTimeout(timer);
      timer = setTimeout (function() {
        elements.forEach(el => {
          el.querySelector('img').classList.remove('dragging')
        })
      }, 150);
    }

    function slideStart(e) {
      e.preventDefault()
      isDragged = true
      scroller.classList.add('dragging')
      startX = e.clientX - scroller.offsetLeft || e.touches[0].clientX - scroller.offsetLeft
      scrollLeft = scroller.scrollLeft
    }

    function slideEnd() {
      isDragged = false;
      scroller.classList.remove('dragging')
      elements.forEach(el => {
        el.querySelector('img').classList.remove('dragging')
      })
    }

    function slideMove(e) {
      if(!isDragged) return
      e.preventDefault()
      const x = e.clientX - scroller.offsetLeft || e.touches[0].clientX - scroller.offsetLeft
      const slide = (x - startX) * 2
      scroller.scrollLeft = scrollLeft - slide
      elements.forEach(el => {
        el.querySelector('img').classList.add('dragging')
      })
    }

  // Gallery scroll effect

    const gallery = window.scrollY + document.getElementById('gallery-scroll-start').getBoundingClientRect().bottom;
    const centerColumn = document.getElementById('center-column')
    const leftColumn = document.getElementById('left-column')
    const rightColumn = document.getElementById('right-column')
    const infoCenterColumn = document.getElementById('info-center-column')
    const infoLeftColumn = document.getElementById('info-left-column')
    const infoRightColumn = document.getElementById('info-right-column')


    // Gap from gallery to info section
    const column = document.getElementById('center-column');
    const lastElement = column.lastElementChild.getBoundingClientRect().bottom;
    const infoSection = document.getElementById('info-gap').getBoundingClientRect().top;    
    const gap = lastElement - infoSection;

    
    window.addEventListener('scroll', () => {
      let value = window.scrollY;
      if (value > gallery) {
        scroll(gallery - value)
      }
    })
    
    function scroll(i) {
      leftColumn.style.transform = `translateY(${i * 0.09}px)`
      rightColumn.style.transform = `translateY(${i * 0.09}px)`
      centerColumn.style.transform = `translateY(${-i * 0.11}px)`
      infoLeftColumn.style.transform = `translateY(${i * 0.09}px)`
      infoRightColumn.style.transform = `translateY(${i * 0.09}px)`
      infoCenterColumn.style.transform = `translateY(${gap-i * 0.11}px)    `
    }
    
    // info animation

    const animationStart = window.scrollY + column.lastElementChild.getBoundingClientRect().bottom;
    const locationText = document.querySelectorAll('.location-container')

    window.addEventListener('scroll', () => {
      let scrolled = window.scrollY;
      if (scrolled > animationStart) {
        locationText.forEach(element => {
          element.classList.add('move-right')
        });
      } else {
        locationText.forEach(element => {
          element.classList.remove('move-right')
        });
      }
    });

    //Lazy loading images
    const images = document.querySelectorAll('[data-src]');
    const infoIcon = document.querySelectorAll('#iconAdd');

    function preloadImage(img) {
      const src = img.getAttribute('data-src');
      if(!src) {
        return;
      }

      img.src = src;
    }

    const imageOptions = {
      threshold: 0.7,
    };

    const imgObserver = new IntersectionObserver((entries, imgObserver) => {
      entries.forEach(entry => {
        if (!entry.isIntersecting) {
          entry.target.classList.remove('appear');
          return;
        } else {
          preloadImage(entry.target);
          entry.target.classList.add('appear');
          // imgObserver.unobserve(entry.target);
        }
      })
    }, imageOptions);

    images.forEach(image => {
      imgObserver.observe(image);
    });

    const iconObserver = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (!entry.isIntersecting) {
          entry.target.classList.remove('appear');
        } else {
          setTimeout(showIcon, 1000)
          function showIcon() {
            entry.target.classList.add('appear');
          }
        }
      })
    })

    infoIcon.forEach(icon => {
      iconObserver.observe(icon);
    });
  },
};
