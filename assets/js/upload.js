function reportInfo(vars, showType = false) {
    if (showType === true) console.log(typeof vars);
    console.log(vars);
}

function addImg(ele, content) {
    var myDIV = document.querySelector(ele);
    var newContent = document.createElement('div');
    newContent.innerHTML = content;

    while (newContent.firstChild) {
        myDIV.appendChild(newContent.firstChild);
    }
}

function saveImageLink(link) {
    const url = '../../controlador/action/act_subirFoto.php';
    var http = new XMLHttpRequest();
    http.open('POST', url, true);
    http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    http.onreadystatechange = function() {
        if (http.readyState === 4 && http.status === 200) {
            console.log('Foto guardada en la base de datos.');
        }
    };
    var data = 'link=' + encodeURIComponent(link);
    http.send(data);
}

var feedback = function(res) {
    reportInfo(res, true);
    if (res.success === true) {
        var get_link = res.data.link.replace(/^http:\/\//i, 'https://');
        saveImageLink(get_link);
        document.querySelector('.status').classList.add('bg-success');
        // var content =
        //     'Image : ' + '<br><input class="image-url" value=\"' + get_link + '\"/>' 
        //      + '<img class="img" alt="Imgur-Upload" src=\"' + get_link + '\"/>';
        // addImg('.status', content);
    }
};

new Imgur({
    clientid: '6efdb8f0d4b2bac', //You can change this ClientID
    callback: feedback
});
