/* ----------------------------------
    FUNCTIONS FOR SHOW HIDE DROPDOWN ELEMENTS
    GET CLASS NAME OF DROPDOWN AS INPUT AND SHOW IT
-------------------------------------- */

function showHideDropdown(dropdownClass,e){
    let element = $('.'+dropdownClass);
    if(!element.hasClass('show')){
        element.addClass('show');
        element.show('swing');
        e.stopPropagation();

    }else if(element.hasClass('show')){
        element.removeClass('show');
        element.hide('swing');
        e.stopPropagation();
    }
}

// Hide Dropdown On Document Click
function hideDropdownDoc(dropdownClass){
    let element = $('.'+dropdownClass);
    if(element.hasClass('show')){
        element.removeClass('show');
        element.hide('swing');
    }
}

/* ----------------------------------
    FILE READER FUNCTION WHEN SELECT FILE FORM INPUT
    PREVIEW ELEMENT SOURCE WILL APPEND TEMP IMAGE URL
-------------------------------------- */

function readURL(input,elementID){
    if(input.files && input.files[0]){
        let reader = new FileReader();
        reader.onload = function(e){
            $(elementID).attr('src',e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

/* ----------------------------------
    Mobile Navagation On Click Search Icon List Icon
    Expan The Views Of It
-------------------------------------- */

$('.menu-list-icon').click( function(e){
    showHideDropdown('mobile-menu-div',e);
});

$('.mobile-menu-div').click( function(e){
    e.stopPropagation();
})

$(document).click( function(){
    hideDropdownDoc('mobile-menu-div');
})

/* ----------------------------------
    Nav Auth Dropdown Expand On User Icon Click
-------------------------------------- */

$('#user-icon-nav').click( function(e){
    showHideDropdown('container-auth',e);
});

$('.container-auth').click( function(e){
    e.stopPropagation();
})

$(document).click( function(){
   hideDropdownDoc('container-auth');
});

/* ----------------------------------
    Search Box Nav Bar Dropdown
-------------------------------------- */


$('#search-icon').click(function(e){
    console.log('show');
    showHideDropdown('container-search',e)
})

$('.container-search').click(function(e){
    e.stopPropagation();
})

$(document).click(function(){
    hideDropdownDoc('container-search');
})


/* ----------------------------------
    HOME PAGE SLIDE BAR FUNCTIONS SHOW NEXT SLIDE
    SHOW SLIDE BUTTON INDICATORS
-------------------------------------- */
function removeSlideClass(sliderCount){
    for(let i = 0;i < sliderCount;i++){
        let s = $('.slide')[i];
        if(s.classList.contains('slide-active')){
            s.classList.remove('slide-active');
        }
    }
}

function addSlideClass(nextSlideId){
    let slider = $('#slide'+nextSlideId);
    if(!slider.hasClass('slide-active')){
        slider.addClass('slide-active animated fadeIn slow');
    }
}

function removeDotClass(sliderCount){
    for(let i = 0;i < sliderCount;i++){
        let s = $('.slider-dot')[i];
        if(s.classList.contains('dot-active')){
            s.classList.remove('dot-active');
        }
    }
}

function addDotClass(dotID){
    let dot = $('.slider-dot')[dotID];
    if(!dot.classList.contains('dot-active')){
        dot.classList.add('dot-active');
    }
}

function slider(id){
    let dataID = id; // Dot Id That Clicked
    let sliderCount = $('.slide').length;
    let dotID = dataID - 1;

    removeSlideClass(sliderCount);
    addSlideClass(dataID);
    removeDotClass(sliderCount);
    addDotClass(dotID);

}

/* -- Slider Next Prev Buttons Function -- */

function sliderNextPrev(option){
    let currentSlide = $('.slide-active')[0].getAttribute('data-id');
    currentSlide = parseInt(currentSlide);
    let totalSlides = $('.slide').length;

    if(option == 'next'){
        if(currentSlide <= totalSlides && currentSlide != totalSlides){

            let nextSlideId = currentSlide + 1;
            removeSlideClass(totalSlides);
            addSlideClass(nextSlideId);
            removeDotClass(totalSlides);
            addDotClass(currentSlide);

        }
    }

    if(option == 'prev'){
        if(currentSlide != 1){
            let nextSlideId = currentSlide - 1;
            let DotID = nextSlideId - 1;
            removeSlideClass(totalSlides);
            addSlideClass(nextSlideId);
            removeDotClass(totalSlides);

            if(nextSlideId <= 0){
                addDotClass(0);
            }else{
                addDotClass(DotID);
            }

        }
    }
}

/* ----------------------------------
    POST LIKES AND DISLIKE AJAX REQUEST
    FUNCTIONS
-------------------------------------- */
function like(post_id,auther_id){
    $.ajax({
        headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
        method:'POST',
        url:'/post/vote/1',
        data:{postID:post_id,autherID:auther_id}
    }).done(function(response){
        if(response == 1){
            $('#like-btn').addClass('blue-fill');
            $('#dislike-btn').removeClass('blue-fill');

            let likeCountEle = $('#like-count');
            let likeCount = parseInt(likeCountEle.attr('data-count'));
            likeCountEle.attr('data-count',likeCount + 1);
            likeCountEle.empty();
            likeCountEle.append("Likes: "+ (likeCount + 1));

            let dislikeEle = $('#dislike-count');
            let dislikeCount = parseInt(dislikeEle.attr('data-count'));
            if(dislikeCount >= 1){
                dislikeEle.attr('data-count',dislikeCount - 1);
                dislikeEle.empty();
                dislikeEle.append('Dislikes: ' + (dislikeCount - 1));
            }

            toastr.success('You Have Liked This Post');
            toastr.options.showMethod = 'slideDown'
        }
    })
}

function dislike(post_id,autherID,user_id){
    $.ajax({
        headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
        method:'POST',
        url:'/post/vote/0',
        data:{postID:post_id,auther:autherID,userID:user_id}
    }).done(function(response){
        if(response == 0){
            $('#like-btn').removeClass('blue-fill');
            $('#dislike-btn').addClass('blue-fill');

            let likeCountEle = $('#like-count');
            let likeCount = likeCountEle.attr('data-count');
            if(likeCount >= 1){
                likeCountEle.attr('data-count',likeCount - 1);
                likeCountEle.empty();
                likeCountEle.append("Likes: " + (likeCount - 1));
            }

            let dislikeEle = $('#dislike-count');
            let dislikeCount = parseInt(dislikeEle.attr('data-count'));
            dislikeEle.attr('data-count',dislikeCount + 1);
            dislikeEle.empty();
            dislikeEle.append('Dislikes: ' + (dislikeCount + 1));

            toastr.warning('You Have Disliked This Post');
            toastr.options.showMethod = 'slideDown';
        }
    })
}

function loginAlert(){
    toastr.warning('Please Login To Do This Action');
    toastr.options.showMethod = 'slideDown';
}

/* ----------------------------------
    MY ACCOUNT EDIT AND CHANGE PASSWORD MODALS POPUP
    MY ACCOUNT CHANGE IMAGE SELECT FILE ON CLICK ON IMAGE
-------------------------------------- */
let prevImgUrl = null;

$('#account-edit').click(function(){
    $('#editModal').modal('show');
});

$('#change-password').click(function(){
    $('#changePassword').modal('show');
});

$('#myaccount-avatar').click(function(){
    prevImgUrl = $('#myaccount-avatar').attr('src');
    $('#myaccount-avatar-input').trigger('click');
});

$('#myaccount-avatar-input').change(function(){
    readURL(this,'#myaccount-avatar');
    $('.form-actions').removeClass('d-none');
    $('.form-actions').addClass('d-block');
});

$('#close-btn').click(function(e){
    e.preventDefault();
    document.getElementById('myaccount-avatar').setAttribute('src',prevImgUrl);
    $('.form-actions').removeClass('d-block');
    $('.form-actions').addClass('d-none');
});

/* ----------------------------------
    USER REGISTATION FORM VALIDATION
-------------------------------------- */

$('#register-form').submit(function(e){
    let username = $('#username').val();
    let check = username.match(/\s+/g);

    if(check != null){
        if(check.length > 0){
            e.preventDefault();
            $('#username').addClass('is-invalid');
            $('#username-error').removeClass('d-none');
            $('#username-error').empty();
            $('#username-error').append('<strong> Can"t Use Spaces </strong>');
        }
    }

})
