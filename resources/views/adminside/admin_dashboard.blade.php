<x-admin-layout>
    <br>
    <p>Welcome <strong>{{ Auth::check() ? Auth::user()->user_level_label : 'Guest'}}</strong>
        <strong>{{  Auth::user()->names}}</strong>
    </p><br>

    <div class="dashboard_infor">
        <div class="admin_dashboard">
            <div class="admin_items">
                <i class="fa fa-users"></i>
                <div class="details">
                    <p>Users</p>
                    <span>{{ $Count_users }}</span>
                </div>
            </div>
            
            <div class="admin_items">
                <i class="fa fa-chalkboard-teacher"></i>
                <div class="details">
                    <p>Orders</p>
                    <span>{{ $Count_order }}</span>
                </div>
            </div>

            <div class="admin_items">
                <i class="fa fa-chalkboard-teacher"></i>
                <div class="details">
                    <p>Categories</p>
                    <span>{{ $Count_categories }}</span>
                </div>
            </div>

            <div class="admin_items">
                <i class="fa fa-chalkboard-teacher"></i>
                <div class="details">
                    <p>Item in Stock</p>
                    <span>{{ $Count_shop }}</span>
                </div>
            </div>

            <div class="admin_items">
                <i class="fa fa-school"></i>
                <div class="details">
                    <p>Messages</p>
                    <span>{{ $Count_messages }}</span>
                </div>
            </div>

            <div class="admin_items">
                <i class="fas fa-dollar-sign"></i>
                <div class="details">
                    <p>sales</p>
                    <span>{{ $this_year_sales }}</span>
                </div>
            </div>
        </div>
    </div><br><br>

    <div class="clients_analytics">
        <h2>Sales Analytics</h2>
        <ul>
            <li>
                <span>Today:</span>
                <span>Ksh. {{ number_format($todays_sales) }}</span>
            </li>

            <li>
                <span>This Week:</span>
                <span>Ksh. {{ number_format($this_weeks_sales) }}</span>
            </li>

            <li>
                <span>This Month:</span>
                <span>Ksh. {{ number_format($this_month_sales) }}</span>
            </li>

            <li>
                <span>This Year:</span>
                <span>Ksh. {{ number_format($this_year_sales) }}</span>
            </li>
        </ul>
    </div>
    
    <div class="charts">
        <div class="chart">
            <h2>{{ $this_year }} Sales Chart</h2>
            <canvas id="salesChart"></canvas>
        </div>
    </div>

    <script src="{{ asset('assets/js/chart.js') }}"></script>

    <script>
    const ctx = document.getElementById('salesChart');

    new Chart(ctx, {
        type: 'bar',
        data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        datasets: [{
            label: 'Amount',
            data: {!! json_encode($sales_data) !!},
            borderWidth: 1
        }]
        },
        options: {
            responsive: true,
        }
    });
    </script>
    </div>
</x-admin-layout>