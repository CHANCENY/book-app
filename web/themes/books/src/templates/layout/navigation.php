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
            <a href="#" class="active">
                <span class="material-icons-sharp"> dashboard </span>
                <h3>Dashboard</h3>
            </a>
            <a href="#">
                <span class="material-icons-sharp"> person_outline </span>
                <h3>Customers</h3>
            </a>
            <a href="#">
                <span class="material-icons-sharp"> receipt_long </span>
                <h3>Orders</h3>
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