$(function () {
    ClassicEditor
        .create(document.querySelector('#ckeditor'),  {
            ckfinder: {
                uploadUrl: process.env.MIX_URL + '/ckfinder/connector?command=QuickUpload&type=Files&responseType=json'
            },

        })
        .then(editor => {
                // window.ck = editor
                // console.log(editor);
                // editor.ui.view.editable.editableElement.style.lineWidth = '1200px';
        } )
        .catch( error => {
            // console.error( error );
        } );

});
