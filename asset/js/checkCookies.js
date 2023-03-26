function checkCookies(name) {
    let match = document.cookie.match(new RegExp('(^| )' + name + '=([^;]+)'));
    if (match == null) {
        
        return true;
    } else {
        let toggle = document.getElementById('toggleredit');
        toggle.click();
        return false;
    }
}