// $(document).ready(function(){
//     $('.showLess, .more').hide();  
//     $('.showMore').on("click", function(){
//         $(this).closest('.filterData').find('.showLess, .more').show();
//         $(this).hide();
//     });
    
//     $('.showLess').on("click", function(){
//         $(this).closest('.filterData').find('.showMore').show();
//         $(this).closest('.filterData').find('.showLess, .more').hide();
//     });

//     // $('.productFilterContainer2').hide();
//     // $('.productContainer').show();
//     // $('.responsiveFilterContainer').click(function(){
//     //     $('.productFilterContainer2').show();
//     //     $('.productContainer').hide();
//     // })
//     // $('.filterCross').click(function(){
//     //     $('.productFilterContainer2').hide();
//     //     $('.productContainer').show();
//     // })


//     // Sidebar product sorting
//     // $('.m_lis1').click(function(){
//     //     $('.ProductWrapper').show();
//     // })
//     // $('.m_lis2').click(function(){
//     //     $('.ProductWrapper').hide();
//     //     $('.p1, .p7').show();
//     // })
//     // $('.m_lis3').click(function(){
//     //     $('.ProductWrapper').hide();
//     //     $('.p2, .p12, p8, .p3, .p11').show();
//     // })
//     // $('.m_lis4').click(function(){
//     //     $('.ProductWrapper').hide();
//     //     $('.p5, .p3, p9,.p4').show();
//     // })


//     // $('.m_radio1').click(function(){
//     //     $('.ProductWrapper').show();
//     // })
//     // $('.m_radio2').click(function(){
//     //     $('.ProductWrapper').hide();
//     //     $('.p1, .p3').show();
//     // })
//     // $('.m_radio3').click(function(){
//     //     $('.ProductWrapper').hide();
//     //     $('.p5, .p7, .p12').show();
//     // })
//     // $('.m_radio4').click(function(){
//     //     $('.ProductWrapper').hide();
//     //     $('.p2, .p10, .p4, .p7').show();
//     // })
//     // $('.m_radio5').click(function(){
//     //     $('.ProductWrapper').hide();
//     //     $('.p5, .p6, .p7').show();
//     // })
//     // $('.m_radio6').click(function(){
//     //     $('.ProductWrapper').hide();
//     //     $('.p9, .p8, .p6, .p11').show();
//     // })
//     // $('.m_radio7').click(function(){
//     //     $('.ProductWrapper').hide();
//     //     $('.p3, .p6').show();
//     // })
//     // $('.m_radio8').click(function(){
//     //     $('.ProductWrapper').hide();
//     //     $('.p9, .p10').show();
//     // })
//     // $('.m_radio9').click(function(){
//     //     $('.ProductWrapper').hide();
//     //     $('.p1, .p7, .p3, p12').show();
//     // })
//     // $('.m_radio10').click(function(){
//     //     $('.ProductWrapper').hide();
//     //     $('.p9, .p11').show();
//     // })
//     // $('.m_radio11').click(function(){
//     //     $('.ProductWrapper').hide();
//     //     $('.p12, .p5, p8').show();
//     // })
//     // $('.m_radio12').click(function(){
//     //     $('.ProductWrapper').hide();
//     //     $('.p11, .p3, p5, .p9').show();
//     // })


 
//     $('.as1').click(function(){
//         $('.ProductWrapper').hide();
//         $('.p9, .p10').show();
//     })
//     $('.as2').click(function(){
//         $('.ProductWrapper').hide();
//         $('.p1, .p7, .p3, p12').show();
//     })
//     $('.as3').click(function(){
//         $('.ProductWrapper').hide();
//         $('.p9, .p11').show();
//     })
//     $('.as4').click(function(){
//         $('.ProductWrapper').hide();
//         $('.p12, .p5, p8').show();
//     })


//     $('.ar1').click(function(){
//         $('.ProductWrapper').hide();
//         $('.p1, .p3').show();
//     })
//     $('.ar2').click(function(){
//         $('.ProductWrapper').hide();
//         $('.p5, .p7, .p12').show();
//     })
//     $('.ar3').click(function(){
//         $('.ProductWrapper').hide();
//         $('.p2, .p10, .p4, .p7').show();
//     })
//     $('.ar4').click(function(){
//         $('.ProductWrapper').hide();
//         $('.p5, .p6, .p7').show();
//     })
//     $('.ar5').click(function(){
//         $('.ProductWrapper').hide();
//         $('.p9, .p8, .p6, .p11').show();
//     })

//     // User Profile: Show phone number
//     $('.m_showP').click(function(){
//         $(this).find('span').text('(613) 670-1627');
//     })
// });


    // Dog View: side slider
    function showImage(imageSrc) {
        var mainImage = document.getElementById('j_mainImage');
        mainImage.src = imageSrc;
    }
    
    function toggleWishlist(imageSrc, heartIcon) {
        let wishlistItems = JSON.parse(localStorage.getItem('wishlist')) || [];
    
        const index = wishlistItems.indexOf(imageSrc);
    
        if (index === -1) {
            wishlistItems.push(imageSrc);
            heartIcon.classList.add('active');
        } else {
            wishlistItems.splice(index, 1);
            heartIcon.classList.remove('active');
        }
    
        localStorage.setItem('wishlist', JSON.stringify(wishlistItems));
    }
    
    function initializeWishlist() {
        let wishlistItems = JSON.parse(localStorage.getItem('wishlist')) || [];
        let heartIcons = document.querySelectorAll('.fa-heart');
    
        heartIcons.forEach(heartIcon => {
            let imageSrc = heartIcon.parentElement.nextElementSibling.getAttribute('src');
            if (wishlistItems.includes(imageSrc)) {
                heartIcon.classList.add('active');
            }
        });
    }
    
    document.addEventListener('DOMContentLoaded', initializeWishlist);

// Message
function toggleOptions(event) {
    var optionsBox = document.getElementById('optionsBox');
    optionsBox.style.display = optionsBox.style.display === 'block' ? 'none' : 'block';
    
    optionsBox.style.top = (event.clientY + window.scrollY) + 'px';
    var rightPosition = window.innerWidth - (event.clientX + window.scrollX);
    optionsBox.style.right = rightPosition + 'px';
    
    event.preventDefault();

    document.addEventListener('click', closeOptionsBoxOutside);
}

function closeOptionsBoxOutside(event) {
    var optionsBox = document.getElementById('optionsBox');
    var targetElement = event.target;

    if (!optionsBox.contains(targetElement)) {
        optionsBox.style.display = 'none';
        document.removeEventListener('click', closeOptionsBoxOutside);
    }
}

function editMessage() {
    console.log('Edit message');
    closeOptionsBox(); 
}

function pinMessage() {
    console.log('Pin message');
    closeOptionsBox(); 
}

function deleteMessage() {
    console.log('Delete message');
    closeOptionsBox(); 
}

function closeOptionsBox() {
    var optionsBox = document.getElementById('optionsBox');
    optionsBox.style.display = 'none';
    document.removeEventListener('click', closeOptionsBoxOutside);
}

document.addEventListener('DOMContentLoaded', function() {
    var ellipsisIcon = document.getElementById('ellipsisIcon');
    var contextMenu = document.getElementById('contextMenu');
    
    ellipsisIcon.addEventListener('click', function(event) {
        var rect = event.target.getBoundingClientRect();
        var top = rect.top + event.target.offsetHeight;
        var right = window.innerWidth - rect.right;
        
        contextMenu.style.top = top + 'px';
        contextMenu.style.right = right + 'px';
        contextMenu.style.left = 'auto'; // Ensure left is not set
        contextMenu.style.display = 'block';
        
        event.preventDefault();
    });
    
    document.addEventListener('click', function(event) {
        if (!contextMenu.contains(event.target) && event.target !== ellipsisIcon) {
            contextMenu.style.display = 'none';
        }
    });
});


// Profile
document.addEventListener('DOMContentLoaded', function() {
    const linkItems = document.querySelectorAll('.link-item');

    linkItems.forEach(function(item) {
        item.addEventListener('click', function() {
            const target = this.getAttribute('data-target');

            const allContents = document.querySelectorAll('.content-section');
            allContents.forEach(function(content) {
                content.style.display = 'none';
            });

            const targetContent = document.getElementById('content-' + target);
            if (targetContent) {
                targetContent.style.display = 'block';
            }
        });
    });
});

document.addEventListener('DOMContentLoaded', function() {
    const linkItems = document.querySelectorAll('.link-item');
    const allContents = document.querySelectorAll('.content-section');

    // Show default section
    document.getElementById('content-account').classList.add('active');

    linkItems.forEach(function(item) {
        item.addEventListener('click', function() {
            const target = this.getAttribute('data-target');

            allContents.forEach(function(content) {
                content.classList.remove('active');
            });

            const targetContent = document.getElementById('content-' + target);
            if (targetContent) {
                targetContent.classList.add('active');
            }
        });
    });
});
