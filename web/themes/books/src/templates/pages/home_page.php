<main>
    <h1>Dashboard</h1>

    <div class="insights">

        <!-- SALES -->
        <div class="sales">
            <span class="material-icons-sharp"> analytics </span>
            <div class="middle">
                <div class="left">
                    <h3>Total Books</h3>
                    <h1><?= $books_count ?></h1>
                </div>
                <div class="progress">
                    <svg>
                        <circle cx="38" cy="38" r="36"></circle>
                    </svg>
                    <div class="number">
                        <p><?= $books_count_percentage ?>%</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- EXPENSES -->
        <div class="expenses">
            <span class="material-icons-sharp"> bar_chart </span>
            <div class="middle">
                <div class="left">
                    <h3>Total Recent Books</h3>
                    <h1><?= count($books_recent) ?></h1>
                </div>
                <div class="progress">
                    <svg>
                        <circle cx="38" cy="38" r="36"></circle>
                    </svg>
                    <div class="number">
                        <p><?= $books_recent_percentage ?>%</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- INCOME -->
        <div class="income">
            <span class="material-icons-sharp"> stacked_line_chart </span>
            <div class="middle">
                <div class="left">
                    <h3>Total Book Read</h3>
                    <h1><?= count($books_read) ?></h1>
                </div>
                <div class="progress">
                    <svg>
                        <circle cx="38" cy="38" r="36"></circle>
                    </svg>
                    <div class="number">
                        <p><?= $books_read_percentage ?>%</p>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="recent-orders">
        <h2>Recent Orders</h2>
        <table id="recent-orders--table">
            <thead>
            <tr>
                <th>TITLE</th>
                <th>ISBN</th>
                <th>PAY</th>
                <th>STATUS</th>
                <th></th>
            </tr>
            </thead>
            <!-- Add tbody here | JS insertion -->
        </table>
    </div>
</main>