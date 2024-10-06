
document.addEventListener('DOMContentLoaded',()=>{
    auth();
});

function auth() {
    const menus = document.getElementById("nav-drawer");
    const session = localStorage.getItem('session-tag') || 'anonymous-session';
    const xhr = new XMLHttpRequest();
    xhr.open('GET', BASE_URL+'/api/user/status?id='+session, true);
    xhr.onload = function() {
        if(this.status === 200) {
            const data = JSON.parse(this.responseText);
            if(data.menus) {
                if(data.session_action && data.session_action === 'delete') {
                    logout();
                }
                menus.innerHTML = '';
                const menus_list = data.menus;
                Object.create(menus_list).forEach(element => {
                    const anchor = document.createElement('a');
                    anchor.href = element.url;
                    anchor.textContent = element.text;
                    menus.appendChild(anchor);
                });
                anchorEventSubcribers();
            }
        }
    }
    xhr.send();
}