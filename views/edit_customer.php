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


        global $user_name;
        global $user_type;



        #Update Customer
        $customer_id = $_GET['edit'];
        global $customer_id;
?>

        <!DOCTYPE html>
        <html lang="en">
        <meta http-equiv="content-type" content="text/html;charset=utf-8" />

        <?php
        $page = 'Profile';
   
        include('../partial/head.php');
        ?>
        <?php
if (isset($_POST['edit_customer'])) {

    #Declare the following Variable
    $costumer_id = mysqli_real_escape_string($mysqli, $_POST['costumer_id']);;
    $costumer_name = mysqli_real_escape_string($mysqli, $_POST['costumer_name']);
    $costumer_email = mysqli_real_escape_string($mysqli, $_POST['costumer_email']);
    $costumer_phoneno = mysqli_real_escape_string($mysqli, $_POST['costumer_phoneno']);

    #sql
    $sql = "UPDATE customers SET costumer_name='{$costumer_name}',costumer_email='{$costumer_email}',costumer_phoneno='{$costumer_phoneno}' WHERE costumer_id='{$costumer_id}'";
    #Excute
    $query = mysqli_query($mysqli, $sql);
    #Check if is done
    if ($query) {
        #Display 
        $_SESSION['success']  = "Customer Details Updated";
        header('Location:customers.php');
    } else {
        $err = "Failed! Please try again.";
    }
}

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
                        Edit Customer
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

                        <div class="max-w-xl">

                            <div class="mt-5">
                                <div class="avatar h-14 w-14 align">
                                    <img class="rounded-full" src="../public/images/avatar/default.png" alt="avatar" />
                                </div>
                            </div>
                            <?php
                            # Read  Customer
                            $sql = "SELECT * FROM customers WHERE costumer_id='{$customer_id}'";
                            $result = mysqli_query($mysqli, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                while ($customer = mysqli_fetch_object($result)) {
                            ?>

                                    <!-- Rounded Input -->
                                    <div class="card px-4 pb-4 sm:px-5">
                                        <div class="my-3 flex h-8 items-center justify-between">
                                            <h2 class="font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100 lg:text-base">
                                                Change
                                            </h2>
                                        </div>
                                        <form method="post">
                                            <div class="mt-5">
                                                <label class="block">Customer Name:</label>
                                                <input type="text" class="form-input w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" value="<?php echo $customer->costumer_name; ?>" name="costumer_name" type="text" />
                                                <input type="text" class="form-input w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" value="<?php echo $customer->costumer_id; ?>" name="costumer_id" hidden type="text" />
                                            </div>

                                            <div class="mt-5">
                                                <label class="block">Customer Email: </label>
                                                <input class="form-input w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" value="<?php echo $customer->costumer_email; ?>" name="costumer_email" type="text" />

                                            </div>

                                            <div class="mt-5">
                                                <label class="block">Customer Phoneno: </label>
                                                <input class="form-input w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" value="<?php echo $customer->costumer_phoneno; ?>" name="costumer_phoneno" type="text" />

                                            </div>

                                            <div class="mt-5">
                                                <button type="submit" name="edit_customer" class="btn space-x-2 bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                                                    <span>Save</span>

                                                </button>
                                            </div>
                                        </form>
                                    </div>
                            <?php }
                            } ?>
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