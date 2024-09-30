 
 <style>
    /* Reset some default styles */
body, ul, li {
    margin: 0;
    padding: 0;
    list-style: none;
}

/* Main styles for the vertical menu */
.vertical-menu {
    width: 250px;
    background-color: #303030;
    color: #ffffff!important;
    border-radius: 0 1% 4% 0;
}

.vertical-menu a {
    color: #ffffff!important;
    text-decoration: none;
    display: block;
    padding: 10px 15px;
    transition: background-color 0.3s ease;
}

.vertical-menu a:hover {
    background-color: #444444;
}

.vertical-menu .menu-title {
    font-size: 14px;
    padding: 10px 15px;
    color: #ffffff;
    background-color: black;
    text-align: center;
}

.vertical-menu ul.sub-menu {
    display: none;
    background-color: #444444;
}

.vertical-menu ul.sub-menu li {
    padding-left: 20px;
}

.vertical-menu ul.sub-menu li a {
    padding: 8px 15px;
}

.vertical-menu li.active > a {
    background-color: #444444;
}

.vertical-menu li.active > ul.sub-menu {
    display: block;
}

/* Add arrow icons for sub-menus */
.vertical-menu .has-arrow::after {
    content: '\f107';
    font-family: 'FontAwesome';
    float: right;
    margin-top: 2px;
    margin-right: 10px;
}

/* Adjustments for the scrollbar */
.vertical-menu [data-simplebar] {
    height: calc(100vh - 50px); /* Adjust the height as needed */
}

/* Optional: You can customize the icon fonts or use image icons */

/* Font Awesome icons */
.vertical-menu i[class^="ri-"]::before {
    font-family: 'remixicon';
    margin-right: 10px;
}

/* Use your own icon font or image for the arrow icons */
.vertical-menu .has-arrow::after {
    /* Use your arrow icon here */
}

/* Apply other styling as needed */

/* Example: Add some spacing to the top and bottom of the menu */
.vertical-menu {
    
}

 </style>
 
 <div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!-- User details -->
                

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">

                            <li>
                                <a href = "{{ route('dashboard') }}" class="waves-effect">
                                    <i class="ri-dashboard-line"></i> 
                                    <span>Track</span>
                                </a>
                            </li>
 
                
        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ri-mail-send-line"></i>
                <span>Suppliers Overview</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('supplier.all') }}">Suppliers</a></li>
               
            </ul>
        </li>


        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ri-mail-send-line"></i>
                <span>Customer Overview</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('customer.all') }}">Customers </a></li>
               
            </ul>
        </li>


        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ri-mail-send-line"></i>
                <span>Unit Overview</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('unit.all') }}">Units</a></li>
               
            </ul>
        </li>


        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ri-mail-send-line"></i>
                <span>Category Overview</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('category.all')}}">Categories</a></li>
            </ul>
        </li>

        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ri-mail-send-line"></i>
                <span>Product Overview</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('product.all')}}">Products</a></li>
            </ul>
        </li>  
                              
        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ri-mail-send-line"></i>
                <span>Purchase Overview</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('purchase.all') }}">Purchases</a></li>
                <li><a href="{{ route('purchase.pending') }}">Approval Purchase</a></li>
                <li><a href="{{ route('daily.purchase.report') }}">Daily Report</a></li>
            </ul>
        </li>
                           
        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ri-mail-send-line"></i>
                <span>Order Overview</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('invoice.all') }}">Order</a></li>
                <li><a href="{{ route('invoice.pending.list') }}">Order Status</a></li>
                <li><a href="{{ route('print.invoice.list') }}">Print Order Invoice</a></li>
                <li><a href="{{ route('daily.invoice.report') }}">Daily Report</a></li>
               
            </ul>
        </li>

                            
                         

                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>