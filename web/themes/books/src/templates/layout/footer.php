<div class="right">
    <div class="top">
        <button id="menu-btn">
            <span class="material-icons-sharp"> menu </span>
        </button>
        <div class="theme-toggler">
            <span class="material-icons-sharp active"> light_mode </span>
            <span class="material-icons-sharp"> dark_mode </span>
        </div>
        <div class="profile">
            <?php if($current_user->getAccountName()): ?>
                <div class="info">
                    <p>Hey, <b><?= $current_user->getFirstName(); ?></b></p>
                    <small class="text-muted"><?= $current_user->getAccountName() ?></small>
                </div>
                <div class="profile-photo">
                    <img src="<?= $current_user->getImage() ?>" alt="Profile Picture" />
                </div>
            <?php endif; ?>
        </div>
    </div>

    <?php

    /**@var $loaded \Mini\Cms\Routing\Route **/
    $loaded = $current_route->getLoadedRoute();

    ?>
    <?php if($loaded->getRouteId() === 'dc551189-d1e1-4d56-b331-2bf50956c957'): ?>
    <div class="recent-updates">
        <h2>Authors</h2>
    </div>

    <a class="sales-analytics">
        <h2>Active books</h2>
        <div id="analytics">
            <!-- Add items div here | JS insertion -->
        </div>
        <div class="item add-product">
            <div onclick="window.location.replace('/books/add')">
                <span class="material-icons-sharp"> add </span>
                <h3>Add Book</h3>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>
</div>