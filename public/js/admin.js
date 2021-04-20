function dialogBox(title,body,footer){
    if(title){
        $('.dialog-header').append("<h3>"+title+"</h3>");
    }
    if(body){
        $('.dialog-body').append(body);
    }
    if(footer){
        $('.dialog-footer').append(footer);
    }

    $('.dialog-box').show('slow');
}

function dialogClear(){
    $('.dialog-box').hide();
    $('.dialog-header').empty();
    $('.dialog-body').empty();
    $('.dialog-footer').empty();
    $('.dialog.footer').append('<button class="btn d-inline btn-info" id="dialog-close">Close</button>')
}

$('#dialog-close').click(function(){
    dialogClear();
});

/**
 * Dashboard Select All Posts Users And Ext
 * Select All Posts On Select All Button
 */
$('#select-all').change(function(){
    if($('#select-all').prop('checked')){
        $('.action-check').prop('checked',true);
    }else{
        $('.action-check').prop('checked',false);
    }
});

/**
 * Display Avatar When User Selecting A New Avatar
 *
 */

function readURL(input){
    if(input.files && input.files[0]){
        let reader = new FileReader();
        reader.onload = function(e){
            $('#preview-img').attr('src',e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

$('#input-avatar').change(function(e){
    readURL(this);
});

/**
 * Category Page Preview Image
 */

$('#input-category-img').change(function(e){
    $('#preview-img').show();
    readURL(this);
});

/**
 * Settings Page Logo Preview
 */

$('#setting-logo').change(function(e){
    $('#preview-img').show();
    readURL(this);
});

/**
 * Tags Page Create Tag Modal Popup
 * Update Tag Modal Popup
 *
 */

$('#create-btn').click(function(){
    $('#new-tag-modal').modal('show');
});

$('.edit-btn').click(function(e){
    e.preventDefault();
    let tar = e.target;
    let href = tar.getAttribute('href');
    let tagName = tar.getAttribute('data-name');

    $('#edit-form').attr('action',href);
    $('#tag-name-input').attr('value',tagName);
    $('#edit-modal').modal('show');
})


/**
 *
 * CKEitor Funtions
 */

if($('#editor').length > 0){
    CKEDITOR.replace('editor',{
        height: 400,
        filebrowserImageBrowseUrl: '/filemanager',
        filebrowserImageUploadUrl: '/filemanager',
        filebrowserBrowseUrl: '/filemanager',
        filebrowserUploadUrl: '/filemanager',
    });
}


