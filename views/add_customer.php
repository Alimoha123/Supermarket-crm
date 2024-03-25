<?php
session_start();
require_once('../config/config.php');

/* Load This Page With Logged In User Session */
$user_id = mysqli_escape_string($mysqli, $_SESSION['user_id']);
$user_sql = mysqli_query($mysqli, "SELECT * FROM users WHERE user_id = '{$user_id}'");
if (mysqli_num_rows($user_sql) > 0) {
    while ($user = mysqli_fetch_array($user_sql)) {
        /* Global Usernames */
        $user_name = $user['user_name'];
        $user_type = $user['user_type'];
        $user_email = $user['user_email'];
        $user_phone_no = $user['user_phone_no'];

        global $user_name;
        global $user_type;

   


        #Update User Profile
        if (isset($_POST['add_customer'])) {
        
            #Declare the following Variable
         
            $customer_name = mysqli_real_escape_string($mysqli,$_POST['customer_name']);
            $customer_password = mysqli_real_escape_string($mysqli,password_hash($_POST['customer_password'],PASSWORD_DEFAULT));
            $customer_email = mysqli_real_escape_string($mysqli,$_POST['customer_email']);
            $customer_phoneno = mysqli_real_escape_string($mysqli,$_POST['customer_phoneno']);
            #sql
            $sql="INSERT INTO customers(costumer_name, costumer_email, costumer_phoneno,costumer_password) VALUES ('{$customer_name}','{$customer_email}','{$customer_phoneno}','{$customer_password}')";
            #Excute
            $query=mysqli_query($mysqli,$sql);
            #Check if is done
            if($query){
                #Display 
                $_SESSION['success']  = "Customer is Created";
                header('Location:customers.php');
            }else{
                $err = "Failed! Please try again.";
            }
        }

?>

        <!DOCTYPE html>
        <html lang="en">
        <meta http-equiv="content-type" content="text/html;charset=utf-8" />

        <?php
        $page = 'Create Customer';
        include('../partial/head.php');
        ?>
        <?php

        ?>

        <body x-data class="is-header-blur" x-bind="$store.global.documentBody">
            <!-- App preloader-->
            <div class="app-preloader fixed z-50 grid h-full w-full place-content-center bg-slate-50 dark:bg-navy-900">
                <div class="app-preloader-inner relative inline-block h-48 w-48"></div>
            </div>

            <!-- Page Wrapper -->
            <div id="root" class="min-h-100vh flex grow bg-slate-50 dark:bg-navy-900" x-cloak>
                <!-- Sidebar -->
                <?php include('../partial/main_side_navbar.php'); ?>
                <div class="sidebar print:hidden">
                    <?php include('../partial/side_navbar.php'); ?>
                </div>

                <!-- App Header Wrapper-->
                <?php include('../partial/header.php'); ?>



            </div>

            <!-- Main Content Wrapper -->
            <main class="main-content w-full px-[var(--margin-x)] pb-8">
                <div class="flex items-center space-x-4 py-5 lg:py-6">
                    <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">
                    Customers
                    </h2>
                    <div class="hidden h-full py-1 sm:flex">
                        <div class="h-full w-px bg-slate-300 dark:bg-navy-600"></div>
                    </div>
                    
                </div>
                <div class="grid grid-cols-1 gap-4 sm:gap-5 lg:gap-6">
                    <!-- Basic Input Text -->
                    <div class="card px-4 pb-4 sm:px-5">
                        <div class="my-3 flex h-8 items-center justify-between">
                           

                        </div>




                    <!-- Rounded Input -->
                    <div class="card px-4 pb-4 sm:px-5">
                        <div class="my-3 flex h-8 items-center justify-between">
                            <h2 class="font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100 lg:text-base">
                                Add Customer
                            </h2>
                        </div>
                        <form method="post">
                            <div class="mt-5">
                                <label class="block">Customer Name:</label>
                                <input type="text" class="form-input w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"  name="customer_name" type="text" />

                            </div>

                            <div class="mt-5">
                                <label class="block">Customer Email: </label>
                                <input class="form-input w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"   name="customer_email" type="text" />

                            </div>

                            <div class="mt-5">
                                <label class="block">Customer Phoneno: </label>
                                <input class="form-input w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"  name="customer_phoneno" type="text" />

                            </div>
                           
                            <div class="mt-5">
                                <label class="block">Customer Password: </label>
                                <input class="form-input w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"  name="customer_password" type="text" />

                            </div>
                            
                                <div class="mt-5">
                                    <button type="submit" name="add_customer" class="btn space-x-2 bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                                        <span>Save</span>

                                    </button>
                                </div>
                        </form>
                    </div>

                </div>
                </div>









                </div>
                </div>
            </main>
            </div>

            <!-- 
        This is a place for Alpine.js Teleport feature 
        @see https://alpinejs.dev/directives/teleport
      -->
            <div id="x-teleport-target"></div>
            <?php include('../partial/script.php'); ?>
        </body>

        </html>
<?php }
} ?>