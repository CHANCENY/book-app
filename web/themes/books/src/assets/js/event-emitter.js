const pdfLinks = document.querySelectorAll('.pdf-link');
if(pdfLinks) {

    Array.from(pdfLinks).forEach((a_tag)=>{

        a_tag.addEventListener('click',(e)=> {
            e.preventDefault();
            const xhr = new XMLHttpRequest();
            xhr.open('POST', '/event/book/emitter',true);
            xhr.onload = function () {
                console.log(this.responseText)
            }
            const book = a_tag.getAttribute('data');
            xhr.send(JSON.stringify({book_id: book, event_title: 'Opened'}))
        })
    })
}