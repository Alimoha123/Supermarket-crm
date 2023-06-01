<?php
session_start();
require_once('../config/config.php');
#include_once('../config/checklogin.php');
#check_login();
?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<?php
$page = 'Home';
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
    <?php include('../partial/side_navbar.php');?>
    </div>

    <!-- App Header Wrapper-->
    <?php include('../partial/header.php');?>



  </div>

  <!-- Main Content Wrapper -->
  <main class="main-content w-full px-[var(--margin-x)] pb-8">
    <div class="mt-4 grid grid-cols-12 gap-4 sm:mt-5 sm:gap-5 lg:mt-6 lg:gap-6">
      <div class="card col-span-12 lg:col-span-8">
        <div class="mt-3 flex flex-col justify-between px-4 sm:flex-row sm:items-center sm:px-5">
          <div class="flex flex-1 items-center justify-between space-x-2 sm:flex-initial">
            <h2 class="text-sm+ font-medium tracking-wide text-slate-700 dark:text-navy-100">
              Order Overview
            </h2>
            <div x-data="usePopper({placement:'bottom-start',offset:4})" @click.outside="isShowPopper && (isShowPopper = false)" class="inline-flex">
              <button x-ref="popperRef" @click="isShowPopper = !isShowPopper" class="btn h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                </svg>
              </button>

             
            </div>
          </div>
          <div class="hidden space-x-2 sm:flex" x-data="{activeTab:'tabYearly'}">
          
          </div>
        </div>

        <div class="mt-4 grid grid-cols-2 gap-3 px-4 sm:mt-5 sm:grid-cols-4 sm:gap-5 sm:px-5 lg:mt-6">
          <div class="rounded-lg bg-slate-100 p-4 dark:bg-navy-600">
            <div class="flex justify-between space-x-1">
              <p class="text-xl font-semibold text-slate-700 dark:text-navy-100">
                $67.6k
              </p>
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary" viewBox="0 0 20 20" fill="currentColor">
  <path fill-rule="evenodd" d="M6.5 10a3 3 0 1 1-6 0 3 3 0 0 1 6 0zm9-3a4 4 0 1 0-8 0 4 4 0 0 0 8 0zm-1 8c1.645 0 3.097-.935 4-2.5C18 11.071 18 8.643 18 6c0-2.104-.895-4-3-4s-3 1.896-3 4c0 2.643 0 5.071 3.5 6.5.903 1.565 2.355 2.5 4 2.5zM13 10a2 2 0 1 1-4 0 2 2 0 0 1 4 0z" clip-rule="evenodd"/>
</svg>



            </div>
            <p class="mt-1 text-xs+">Customers</p>
          </div>
          <div class="rounded-lg bg-slate-100 p-4 dark:bg-navy-600">
            <div class="flex justify-between">
              <p class="text-xl font-semibold text-slate-700 dark:text-navy-100">
                12.6K
              </p>
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
  <path fill="#FFC107" d="M9 11c1.66 0 2.99-1.34 2.99-3S10.66 5 9 5C7.34 5 6 6.34 6 8s1.34 3 3 3zm6 0c1.66 0 3-1.34 3-3s-1.34-3-3-3c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-9 6h12c1.11 0 2-.89 2-2v-2c0-2.67-5.33-4-8-4s-8 1.33-8 4v2c0 1.11.89 2 2 2zm12 0h2v-2c0-2.67-5.33-4-8-4s-8 1.33-8 4v2h2c1.11 0 2 .89 2 2v4h8v-4c0-1.11.89-2 2-2zm-12-2h12v2h-12z"/>
</svg>


            </div>
            <p class="mt-1 text-xs+">Staffs</p>
          </div>
          <div class="rounded-lg bg-slate-100 p-4 dark:bg-navy-600">
            <div class="flex justify-between">
              <p class="text-xl font-semibold text-slate-700 dark:text-navy-100">
                143
              </p>
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
  <path d="M12 2C6.48 2 2 6.48 2 12c0 4.41 3.59 8 8 8s8-3.59 8-8c0-5.52-4.48-10-10-10zm0 14c-2.67 0-5.03-1.07-6.76-2.81-.38-.38-.58-.88-.58-1.41s.2-1.03.58-1.41c1.73-1.74 4.09-2.81 6.76-2.81s5.03 1.07 6.76 2.81c.38.38.58.88.58 1.41s-.2 1.03-.58 1.41c-1.73 1.74-4.09 2.81-6.76 2.81zm0-12c-3.31 0-6 2.69-6 6 0 3.31 2.69 6 6 6s6-2.69 6-6c0-3.31-2.69-6-6-6zm-4 6h2v2h-2v-2zm4 0h2v2h-2v-2zm4 0h2v2h-2v-2z"/>
</svg>

            </div>
            <p class="mt-1 text-xs+">Managers</p>
          </div>
          <div class="rounded-lg bg-slate-100 p-4 dark:bg-navy-600">
            <div class="flex justify-between">
              <p class="text-xl font-semibold text-slate-700 dark:text-navy-100">
                651
              </p>
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
  <path d="M18 2H6C4.89 2 4 2.89 4 4v16c0 1.11.89 2 2 2h12c1.11 0 2-.89 2-2V4c0-1.11-.89-2-2-2zm0 18H6V4h12v16z"/>
</svg>

            </div>
            <p class="mt-1 text-xs+">Complete</p>
          </div>
        </div>

        <div class="ax-transparent-gridline mt-2 px-2">
          <div x-init="$nextTick(() => { $el._x_chart = new ApexCharts($el,pages.charts.ordersOverview); $el._x_chart.render() });"></div>
        </div>
      </div>
      <div class="col-span-12 grid grid-cols-2 gap-4 sm:grid-cols-4 sm:gap-5 lg:col-span-4 lg:grid-cols-2 lg:gap-6">
        <div class="card col-span-2 px-4 pb-5 sm:px-5">
          <div class="flex items-center justify-between py-3">
            <h2 class="font-medium tracking-wide text-slate-700 dark:text-navy-100">
              Annual Income
            </h2>
            <div x-data="usePopper({placement:'bottom-end',offset:4})" @click.outside="isShowPopper && (isShowPopper = false)" class="inline-flex">
              <button x-ref="popperRef" @click="isShowPopper = !isShowPopper" class="btn -mr-1.5 h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                </svg>
              </button>

             
            </div>
          </div>
          <div class="flex grow space-x-5">
            <div class="flex w-1/2 flex-col">
              <div class="grow">
                <p class="text-2xl font-semibold text-slate-700 dark:text-navy-100">
                  $67.4k
                </p>
                
              </div>
              <p class="mt-2 text-xs leading-normal line-clamp-3">
                You have spent about 25% of your annual budget.
              </p>
            </div>

            <div class="ax-transparent-gridline flex w-1/2 items-end">
              <div x-init="$nextTick(() => { $el._x_chart = new ApexCharts($el,pages.charts.orderBudget); $el._x_chart.render() });"></div>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="mt-3 flex items-center justify-between px-4 sm:px-5">
            <h2 class="font-medium tracking-wide text-slate-700 dark:text-navy-100">
              Income
            </h2>

            <div x-data="usePopper({placement:'bottom-end',offset:4})" @click.outside="isShowPopper && (isShowPopper = false)" class="inline-flex">
              <button x-ref="popperRef" @click="isShowPopper = !isShowPopper" class="btn -mr-2 h-7 w-7 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                </svg>
              </button>

             
            </div>
          </div>
          <p class="grow px-4 text-xl font-semibold text-slate-700 dark:text-navy-100 sm:px-5">
            $169.6k
          </p>
          <div class="ax-transparent-gridline">
            <div x-init="$nextTick(() => { $el._x_chart = new ApexCharts($el,pages.charts.orderIncome); $el._x_chart.render() });"></div>
          </div>
        </div>
        <div class="card">
          <div class="mt-3 flex items-center justify-between px-4 sm:px-5">
            <h2 class="font-medium tracking-wide text-slate-700 dark:text-navy-100">
              Expense
            </h2>

            <div x-data="usePopper({placement:'bottom-end',offset:4})" @click.outside="isShowPopper && (isShowPopper = false)" class="inline-flex">
              <button x-ref="popperRef" @click="isShowPopper = !isShowPopper" class="btn -mr-2 h-7 w-7 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                </svg>
              </button>

              
            </div>
          </div>
          <p class="grow px-4 text-xl font-semibold text-slate-700 dark:text-navy-100 sm:px-5">
            $34.6k
          </p>
          <div class="ax-transparent-gridline">
            <div x-init="$nextTick(() => { $el._x_chart = new ApexCharts($el,pages.charts.orderExpense); $el._x_chart.render() });"></div>
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
