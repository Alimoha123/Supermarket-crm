 <!-- Sidebar Panel -->
 <div class="sidebar-panel">
     <div class="flex h-full grow flex-col bg-white pl-[var(--main-sidebar-width)] dark:bg-navy-750">
         <!-- Sidebar Panel Header -->
         <div class="flex h-18 w-full items-center justify-between pl-4 pr-1">
             <p class="text-base tracking-wider text-slate-800 dark:text-navy-100">
                 Dashboards
             </p>
             <button @click="$store.global.isSidebarExpanded = false" class="btn h-7 w-7 rounded-full p-0 text-primary hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-accent-light/80 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25 xl:hidden">
                 <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                 </svg>
             </button>
         </div>

         <!-- Sidebar Panel Body -->
         <div x-data="{expandedItem:null}" class="h-[calc(100%-4.5rem)] overflow-x-hidden pb-6" x-init="$el._x_simplebar = new SimpleBar($el);">
          
             <div class="my-3 mx-4 h-px bg-slate-200 dark:bg-navy-500"></div>
             <ul class="flex flex-1 flex-col px-4 font-inter">
                 
              
                 
                 <li>
                     <a x-data="navLink" href="customers.php" :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'" class="flex py-2 text-xs+ tracking-wide outline-none transition-colors duration-300 ease-in-out">
                         Customers
                     </a>
                 </li>
                 <li>
                     <a x-data="navLink" href="staffs.php" :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'" class="flex py-2 text-xs+ tracking-wide outline-none transition-colors duration-300 ease-in-out">
                         Staffs
                     </a>
                 </li>
                 <li>
                     <a x-data="navLink" href="managers.php" :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'" class="flex py-2 text-xs+ tracking-wide outline-none transition-colors duration-300 ease-in-out">
                         Managers
                     </a>
                 </li>
                 <li>
                     <a x-data="navLink" href="orders.php" :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'" class="flex py-2 text-xs+ tracking-wide outline-none transition-colors duration-300 ease-in-out">
                         Orders
                     </a>
                 </li>
                 <li>
                     <a x-data="navLink" href="transactions.php" :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'" class="flex py-2 text-xs+ tracking-wide outline-none transition-colors duration-300 ease-in-out">
                         Transaction
                     </a>
                 </li>
                 <li>
                     <a x-data="navLink" href="loyalties.php" :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'" class="flex py-2 text-xs+ tracking-wide outline-none transition-colors duration-300 ease-in-out">
                         Loyalty Program
                     </a>
                 </li>
                 
                 <li>
                     <a x-data="navLink" href="customersfeedbacks.php" :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'" class="flex py-2 text-xs+ tracking-wide outline-none transition-colors duration-300 ease-in-out">
                         Customers Feedbacks
                     </a>
                 </li>
                 <li>
                     <a x-data="navLink" href="chatbox.php" :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'" class="flex py-2 text-xs+ tracking-wide outline-none transition-colors duration-300 ease-in-out">
                         Chat Box
                     </a>
                 </li>
                 
             </ul>
     </div>
 </div>