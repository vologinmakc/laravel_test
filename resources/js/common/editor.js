$(function () {

    $('.js-editor').each(function () {
        var textarea = $(this),
            container = $('<div/>', {'class': 'js-editor-container', 'id': 'editorContainer' + Math.random()});

        textarea.hide();
        textarea.after(container);

        var editor = new Quill(container.get(0), {
            modules: {
                toolbar: [
                    ['bold', 'italic', 'underline', 'strike'],
                    ['blockquote', 'image'],
                    [{'list': 'ordered'}, {'list': 'bullet'}],

                    [{'header': [1, 2, 3, 4, 5, 6, false]}],

                    [{'color': []}],
                    [{'align': []}],

                    ['clean']
                ]
            },
            theme: 'snow'
        });

        //editor.clipboard.dangerouslyPasteHTML(textarea.val());

        editor.on('text-change', (delta, oldDelta, source) => {
            textarea.val(editor.root.innerHTML);
        })
    });


});
