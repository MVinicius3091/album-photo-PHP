
const capeAlbum = document.querySelectorAll('img.cape');
let body = document.querySelector('body');

capeAlbum.forEach(el => {
    el.addEventListener('click', openFrameView);
});


function openFrameView(e) {
    let url = window.location.origin;
    let capeId = e.target.getAttribute('id'); 
    let file = e.target.getAttribute('src');
    let alt = e.target.getAttribute('alt');

    let pageAlbum = `${url}/album.php?idcape=${capeId}&file=${file}&alt=${alt}`; 
    let frame = document.createElement('iframe');
    frame.setAttribute('src', pageAlbum);

    body.appendChild(frame);
}
