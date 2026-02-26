export default {
  init() {
    // JavaScript to be fired on all pages
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
    jQuery( '.single_variation_wrap' ).on( 'show_variation', function ( event, variation ) {
        // Fired when the user selects all the required dropdowns / attributes
        // and a final variation is selected / shown
        jQuery('.show-var').hide();
        jQuery('#var-' + variation.variation_id).show();
    } );

    //Nav button

    const toggleButton = document.getElementsByClassName('toggle-button')[0];
    const mobileNav = document.getElementsByClassName('hidden-nav')[0];

    toggleButton.addEventListener('click', (e) => {
      e.preventDefault()
      mobileNav.classList.toggle('active')
    })

    // sticky nav

    const nav = document.querySelector('.banner')
    if(!document.body.classList.contains('home')) {
      nav.classList.add('sticky');
      nav.classList.add('inview');
    }

    //Mobile submenus
    let navMenus = document.getElementsByClassName('menu-item-has-children');
    
    [].forEach.call(navMenus, function(menu) {
      menu.firstElementChild.addEventListener('touchend', (e) => {
        e.preventDefault()
        let subMenu = menu.getElementsByClassName('sub-menu')[0]
        subMenu.classList.toggle('active')
      })
    })

    
  },
};
