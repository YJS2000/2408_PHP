const BTN_CALL = document.querySelector('#btn-call');
BTN_CALL.addEventListener('click', getList )

function getList() {
    const URL = document.querySelector('#url').value;
    console.log(URL); 
    
    // GET
    axios.get(URL)
    .then(response => {
        response.data.forEach(item => {
            // console.log(item.download_url);
            const NEW = document.createElement('img');
            NEW.setAttribute('src',item.download_url)
            NEW.style.width = '200px';
            NEW.style.height = '200px';
            document.querySelector('.container').appendChild(NEW);
        });
    })
    .catch(error => {
        console.log(error);
    })
}