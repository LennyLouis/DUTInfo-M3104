function getPageContentId(tagId, url) {
    var xhr;

    xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function () {
        if ((xhr.readyState == 4) && (xhr.status == 200)) {
            document.getElementById(tagId).innerHTML = xhr.responseText;
        }
    };

    xhr.open("GET", url, true);
    xhr.send(null);
}

function disableAllButton(){
    var btn;
    btn = document.getElementsByClassName('nav-link');
    for (let b of btn) {
        b.classList.add('disabled');
    }
}

function changePage(page) {
    var navLink;
    navLink = document.getElementsByClassName('nav-link');
    for (let a of navLink) {
        a.classList.remove('active');
    }
    switch (page) {
        case 'home':
            document.getElementById('nav-link-home').classList.add('active');
            getPageContentId('pageContent', 'view/home.php');
            break;
        case 'forum':
            document.getElementById('nav-link-forum').classList.add('active');
            getPageContentId('pageContent', 'view/forum.php');
            break;
        case 'profile':
            document.getElementById('nav-link-profile').classList.add('active');
            getPageContentId('pageContent', 'view/profile.php');
            break;
        case 'login':
            disableAllButton();
            getPageContentId('pageContent', 'view/login.php');
            break;
        case 'settings':
            getPageContentId('pageContent', 'view/settings.php');
            break;
    }
}