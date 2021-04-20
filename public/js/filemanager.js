/**
 * Javascript For Stylings Form Bttons And Other Elemets
 *
 */
let inputFile = $('#input-file');

$('.input-file-btn').click(function(){
    inputFile.click();
})

inputFile.change(function(e){
    if(inputFile.val()){
        $('#file-name').html(inputFile.val().match(/[\/\\]([\w\d\s\.\-\(\)]+)$/)[1]);
    }else{
        $('#file-name').html('No File Choosen');
    }
})



$('#delete-form').on('click','.file-img',function(e){
    let tar = e.target;
    let url = tar.getAttribute('data-uri');
    let inputID = tar.getAttribute('id');
    let inputCount = $('.file-img').length;

    /**
     * Uncheck All The Elements And Check Clicked Element
     */
    for(let i = 0;i < inputCount;i++){
        $('#img_'+i).prop('checked',false)
    }
    $('#'+inputID).prop('checked',true);

    /**
     * Styling The Selected Image With Background Color
     */
    let imgElements = $('.file-img');
    for(let l = 0;l < imgElements.length;l++){
        imgElements[l].style.border = 'none';
    }
    tar.style.border = '2px solid #03A9F4';
});


/**
 * Slect ALl Images
 *
 */
$('#select-btn').click(function(){
    let elements = $('.file-img');
    for(let i = 0; i < elements.length;i++){
        $('#img_'+i).prop('checked',true);
    }
})

/**
 * Onclick Add Button Return To Editor
 */
function getUrlParam( paramName ) {
    var reParam = new RegExp( '(?:[\?&]|&)' + paramName + '=([^&]+)', 'i' );
    var match = window.location.search.match( reParam );

    return ( match && match.length > 1 ) ? match[1] : null;
}
// Simulate user action of selecting a file to be returned to CKEditor.
function returnFileUrl(url) {

    var funcNum = getUrlParam( 'CKEditorFuncNum' );
    var fileUrl = url;
    window.opener.CKEDITOR.tools.callFunction( funcNum, fileUrl );
    window.close();
}

$('#add-btn').click(function(){
    let imgElements = $('.file-img').length;
    let checkedInput;

    for(let i = 0;i < imgElements; i++){
        if($('#img_'+i+':checked').length){
            checkedInput = $('#img_'+i);
        }
    }
    if(checkedInput == undefined){
        alert('Please Select Image');
    }else{
        let imgUrl = checkedInput.val();
        let urlSplit = imgUrl.split('/');
        let imgName = urlSplit[urlSplit.length - 1];
        let url = '/storage/images/'+imgName;
        returnFileUrl(url);
    }
});

/**
 * On Delete Button Click
 *
 */
$('#delete-btn').click(function(){
    let d = window.confirm('Are You Want To Delete ?');
    if(d == true){
        $("#delete-form").submit();
    }
})

/**
 * Search Function Ajax
 *
 */
$('#search').keyup(function(e){
    let queryVal = e.target.value;
    if(queryVal.length >= 2){
        $.ajax({
            method: 'GET',
            url: '/filemanager/search/'+queryVal,
        }).done(function(response){
            let res = JSON.parse(response);
            if(res != 0){

               $('#delete-form').empty();
               for(let i = 0; i < res.length;i++){
                    let content = `<div><input type="checkbox" id="img_${i}" name="img[]" value="${res[i]['name']}">
                    <img src="${res[i]['url']}" id="img_${i}" class="file-img"></div>`;
                    $('#delete-form').append(content);
               }

            }else if(res == 0){
                $('#delete-form').empty();
                $('#delete-form').append('<h2 class="text-center" style="grid-column-start: 1;grid-column-end: 12;">Image Not Found<h2>');
            }
        })
    }
})
