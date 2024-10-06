
document.addEventListener('DOMContentLoaded',()=>{
    auth();
   setInterval(()=>{
    auth();
   }, 20000);
});

function auth() {
    const menus = document.getElementById("nav-drawer");
    const session = localStorage.getItem('session-tag') || 'anonymous-session';
    const xhr = new XMLHttpRequest();
    xhr.open('GET', BASE_URL+'/api/user/status?id='+session, true);
    xhr.onload = function() {
        if(this.status === 200) {
            const data = JSON.parse(this.responseText);
            console.log(data);
            if(data.menus) {
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