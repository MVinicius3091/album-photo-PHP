
const uri = window.location.search;
const lastCharacter = window.location.search.lastIndexOf('&');
const altUrl = uri.slice(uri.indexOf('A'));
const fileUrl = uri.slice(uri.indexOf('file') + 5, lastCharacter);
const fkCaId = uri.slice(8, 9);

const imaCape = document.querySelector('img#image-cape');
const nameCape = document.querySelector('h3#cape-name');
const inputFKcaId = document.querySelector('input#ca_id');
const btnClose = document.querySelector('button#btn-close');
const allPhotos = document.querySelectorAll('img.photos');
const zoomPhotos = document.querySelector('div.zoom-photo');
const btnCloseZoom = document.querySelector('button#btn-close-zoom');
const btnNext = document.querySelector('button#btn-next');
const btnBack = document.querySelector('button#btn-back');

nameCape.innerHTML = altUrl.replace(/%|20/g, ' ').replace('1', '').replace('A', 'Á');
imaCape.setAttribute('src', fileUrl);
inputFKcaId.value = fkCaId;

btnClose.onclick = () => {
    window.frameElement.remove();
}

allPhotos.forEach(el => {
    el.addEventListener('click', zoomPhotoSelected);
});


function zoomPhotoSelected(e) {

    let src = e.target.src;
    let id = e.target.id;

    let img = document.createElement('img');
    img.setAttribute('src', src);
    img.setAttribute('id', id);
    img.setAttribute('class', 'img-zoom');
    
    zoomPhotos.style.display = 'flex';
    zoomPhotos.classList.remove('zoom-photo-out')
    zoomPhotos.classList.add('zoom-photo-enter')
    zoomPhotos.appendChild(img);
    
}

btnCloseZoom.addEventListener('click', removeZoomPhoto);

function removeZoomPhoto() {
    zoomPhotos.classList.remove('zoom-photo-enter')
    zoomPhotos.classList.add('zoom-photo-out')
    setTimeout(() => {
        zoomPhotos.style.display = 'none';
        document.querySelector('img.img-zoom').remove();
    }, 900)

}

btnNext.addEventListener('click', nextPhoto)

let count = 0;

function nextPhoto(e) {
    let imgTarget = window.frameElement.contentDocument.images;
    let id = document.querySelector('img.img-zoom').id;
    // let id = e.target.offsetParent.offsetParent.lastChild.id;

    count++
    let arrImages = Array.from(imgTarget).slice(2);
    

}


