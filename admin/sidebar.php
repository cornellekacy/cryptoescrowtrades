        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar" data-sidebarbg="skin6">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav" style="background-image: url('img/home5-sl-img13.jpg')">
                    <ul id="sidebarnav">
                        <?php $sess = $_SESSION['username'];

if($sess == 'supperuser'){
    echo '
 <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="index.php"
                                aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span
                                    class="hide-menu">Dashboard</span></a></li>
                                     <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="https://cryptoescrowtrades.com/"
                                aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span
                                    class="hide-menu" target="_blank">Home Page</span></a></li>
                                    
                        <li class="list-divider"></li>
                        <li class="nav-small-cap"><span class="hide-menu">Application</span></li>

                        <li class="sidebar-item"> <a class="sidebar-link" href="start.php"
                                aria-expanded="false"><i data-feather="tag" class="feather-icon"></i><span
                                    class="hide-menu">Start Transaction
                                </span></a>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="all_transactions.php"
                                aria-expanded="false"><i data-feather="message-square" class="feather-icon"></i><span
                                    class="hide-menu">All Transaction</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="payment.php"
                                aria-expanded="false"><i data-feather="calendar" class="feather-icon"></i><span
                                    class="hide-menu">Payment Methods</span></a></li>
                         <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="payment-details.php"
                                aria-expanded="false"><i data-feather="calendar" class="feather-icon"></i><span
                                    class="hide-menu">Set Payment Details</span></a></li>
                         <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="activate.php"
                                aria-expanded="false"><i data-feather="calendar" class="feather-icon"></i><span
                                    class="hide-menu">activate Transaction</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="pending1.php"
                                aria-expanded="false"><i data-feather="calendar" class="feather-icon"></i><span
                                    class="hide-menu">Resolve Dispute</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="finalizeall.php"
                                aria-expanded="false"><i data-feather="calendar" class="feather-icon"></i><span
                                    class="hide-menu">Finalized Transactions</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="fund.php"
                                aria-expanded="false"><i data-feather="calendar" class="feather-icon"></i><span
                                    class="hide-menu">Fund User Account</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="alluser.php"
                                aria-expanded="false"><i data-feather="calendar" class="feather-icon"></i><span
                                    class="hide-menu">All User</span></a></li>

                        <li class="list-divider"></li>

    ';
}else{
    echo '
 <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="index.php"
                                aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span
                                    class="hide-menu">Dashboard</span></a></li>
                                     <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="https://cryptoescrowtrades.com/"
                                aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span
                                    class="hide-menu" target="_blank">Home Page</span></a></li>
                        <li class="list-divider"></li>
                        <li class="nav-small-cap"><span class="hide-menu">Application</span></li>

                        <li class="sidebar-item"> <a class="sidebar-link" href="start.php"
                                aria-expanded="false"><i data-feather="tag" class="feather-icon"></i><span
                                    class="hide-menu">Start Transaction
                                </span></a>
                        </li>
                         <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                aria-expanded="false"><i data-feather="file-text" class="feather-icon"></i><span
                                    class="hide-menu">My Transactions </span></a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item"><a href="active.php" class="sidebar-link"><span
                                            class="hide-menu"> Active Transactions
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="inactive.php" class="sidebar-link"><span
                                            class="hide-menu"> In-active Transactions
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="finalize.php" class="sidebar-link"><span
                                            class="hide-menu"> fanalized Transactions
                                            Radios
                                        </span></a>
                                </li>
                            </ul>
                        </li>
                       

                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="payment.php"
                                aria-expanded="false"><i data-feather="calendar" class="feather-icon"></i><span
                                    class="hide-menu">Payment Methods</span></a></li>

                           <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                aria-expanded="false"><i data-feather="file-text" class="feather-icon"></i><span
                                    class="hide-menu">Disputes </span></a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item"><a href="resolved.php" class="sidebar-link"><span
                                            class="hide-menu"> Resolved Dispute
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="pending.php" class="sidebar-link"><span
                                            class="hide-menu">Pending Disputes
                                        </span></a>
                                </li>
                               
                            </ul>
                        </li>
                       
                         

                        <li class="list-divider"></li>

    ';
} ?>

                       
                        
                       
                        <li class="nav-small-cap"><span class="hide-menu">Extra</span></li>
                       
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="logout.php"
                                aria-expanded="false"><i data-feather="log-out" class="feather-icon"></i><span
                                    class="hide-menu">Logout</span></a></li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>