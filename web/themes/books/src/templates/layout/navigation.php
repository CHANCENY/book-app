<?php
  $loaded = \Mini\Cms\Mini::currentRoute();
?>
<div class="container">
    <aside>
        <div class="top">
            <a href="/" class="logo">
                <img src="/themes/books/src/assets/images/logo.png" alt="Logo" />
                <h2>EGA<span class="danger">TOR</span></h2>
            </a>
            <div class="close" id="close-btn">
                <span class="material-icons-sharp"> close </span>
            </div>
        </div>

        <div class="sidebar">
            <a href="/" class="<?= $loaded->getUrl() === '/' ? 'active' : null; ?>">
                <span class="material-icons-sharp"> dashboard </span>
                <h3>Dashboard</h3>
            </a>
            <a href="/books/categories" class="<?= $loaded->getUrl() === '/books/categories' ? 'active' : null; ?>">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="m260-520 220-360 220 360H260ZM700-80q-75 0-127.5-52.5T520-260q0-75 52.5-127.5T700-440q75 0 127.5 52.5T880-260q0 75-52.5 127.5T700-80Zm-580-20v-320h320v320H120Zm580-60q42 0 71-29t29-71q0-42-29-71t-71-29q-42 0-71 29t-29 71q0 42 29 71t71 29Zm-500-20h160v-160H200v160Zm202-420h156l-78-126-78 126Zm78 0ZM360-340Zm340 80Z"/></svg>
                <h3>Book Categories</h3>
            </a>
            <a href="/books" class="<?= $loaded->getUrl() === '/books' ? 'active' : null; ?>">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="M400-400h160v-80H400v80Zm0-120h320v-80H400v80Zm0-120h320v-80H400v80ZM240-240v-640h640v640H240Zm80-80h480v-480H320v480ZM80-80v-640h80v560h560v80H80Zm240-720v480-480Z"/></svg>
                <h3>Books</h3>
            </a>
            <?php if(!empty($current_user->getAccountName())): ?>
                <a href="/user/logout">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h280v80H200v560h280v80H200Zm440-160-55-58 102-102H360v-80h327L585-622l55-58 200 200-200 200Z"/></svg>
                    <h3>Logout</h3>
                </a>
            <?php else: ?>
                <a href="/user/login">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="M480-120v-80h280v-560H480v-80h280q33 0 56.5 23.5T840-760v560q0 33-23.5 56.5T760-120H480Zm-80-160-55-58 102-102H120v-80h327L345-622l55-58 200 200-200 200Z"/></svg>
                    <h3>Login</h3>
                </a>
                <a href="/user/register">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="M440-440H200v-80h240v-240h80v240h240v80H520v240h-80v-240Z"/></svg>
                    <h3>Join</h3>
                </a>
            <?php endif; ?>
            <a href="#">

            </a>
        </div>
    </aside>