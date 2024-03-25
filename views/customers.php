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
        global $user_email;
        global $user_phone_no;


        #Update User Profile
        if (isset($_GET['delete'])) {

            #Declare the following Variable
            $customer_id = mysqli_real_escape_string($mysqli,$_GET['delete']);
            #sql
            $sql = "DELETE FROM customers WHERE costumer_id='{$customer_id}'";
            #Excute
            $query = mysqli_query($mysqli, $sql);
            #Check if is done
            if ($query) {
                #Display 
                $success = "Customer deleted";
            } else {
                $err = "Failed! Please try again.";
            }
        }

?>

        <!DOCTYPE html>
        <html lang="en">
        <meta http-equiv="content-type" content="text/html;charset=utf-8" />

        <?php
        $page = 'Customers';
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
                </div>
                <div class="card pb-4">
                    <div class="my-3 flex h-8 items-center justify-between px-4 sm:px-5">

                        <div x-data="usePopper({placement:'bottom-end',offset:4})" @click.outside="isShowPopper &amp;&amp; (isShowPopper = false)" class="inline-flex">
                        <a href="add_customer.php" class="btn bg-gradient-to-r from-sky-400 to-blue-600 p-0.5 font-medium">
                  <span class="btn bg-white dark:bg-navy-700"> Add </span>
                </a>
                        </div>
                    </div>
                
                        <div x-data="pages.tables.initGridTableExapmle">
                            <div role="complementary" class="gridjs gridjs-container" style="width: 100%;">
                               
                                <div class="gridjs-wrapper" style="height: auto;">
                                <table id="customerTable">
                                <tr>
  <th>Customer Name</th>
  <th>Customer Email</th>
  <th>No of Orders</th>
  <th>Date of Join</th>
  <th>Actions</th>
</tr>
</thead>
<tbody>
  <?php
  # Read all Customers
  $sql = "SELECT * FROM customers";
  $result = mysqli_query($mysqli, $sql);
  if (mysqli_num_rows($result) > 0) {
    while ($customer = mysqli_fetch_object($result)) {
  ?>
      <tr>
        <td><?php echo $customer->costumer_name; ?></td>
        <td><?php echo $customer->costumer_email; ?></td>
        <td>0</td>
        <td><?php echo $customer->costumer_created_on; ?></td>
        <td>
          <span>
            <div class="flex justify-center space-x-2">
              <a href="edit_customer.php?edit=<?php echo $customer->costumer_id; ?>"  class="btn h-8 w-8 p-0 text-info hover:bg-info/20 focus:bg-info/20 active:bg-info/25">
                <i class="fa fa-edit"></i>
              </a>
              <a href="customers.php?delete=<?php echo $customer->costumer_id; ?>"  class="btn h-8 w-8 p-0 text-error hover:bg-error/20 focus:bg-error/20 active:bg-error/25">
                <i class="fa fa-trash-alt"></i>
              </a>
            </div>
          </span>
        </td>
      </tr>
  <?php
    }
  } else {
    // Handle case when no customers are found
    echo "<tr><td colspan='5'>No customers found.</td></tr>";
  }
  ?>
</tbody>

     
     
    </tbody>
  </table>
                                </div>
                            
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