let carousel = document.getElementById('avatarCarousel')

if (carousel) printImages()

function printImages() {
  let imagesNodes = document.querySelectorAll('[data-avatar]')
  imagesNodes.forEach(imageNode => {
    let request = getRandomUrl()
    imageNode.src = request.url
    imageNode.dataset.avatar = request.seed
  })
}

function getRandomUrl() {
  let baseURL = "https://avatars.dicebear.com/api/bottts/"
  let seed = getRandomSeed(5)
  let url = baseURL+seed+'.svg'
  let response = {
    url: url,
    seed: seed
  }
  return response
}

function getRandomSeed(length) {
  let result = '';
  let characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
  let charactersLength = characters.length;
  for ( let i = 0; i < length; i++ ) {
    result += characters.charAt(Math.floor(Math.random() * charactersLength));
  }
  return result;
}

let refreshBtn = document.getElementById('refresh-button')
refreshBtn.addEventListener('click', printImages)

let imagesNodes = document.querySelectorAll('[data-avatar]')
imagesNodes.forEach(imageNode => {
    imageNode.addEventListener('click', setAvatar)
  })

function setAvatar(event) {
  document.getElementById('avatar-field').value = event.target.dataset.avatar
}