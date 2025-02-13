<script>
      window.addEventListener("DOMContentLoaded", () => Alpine.start());
    </script>
    <!-- Include Toastify JavaScript using CDN -->
<script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

<!--Datatables-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function() {
      // DataTable initialization
      $('#customerTable').DataTable();
    });
  </script>
<!-- JavaScript function for displaying the notification -->
<!-- JavaScript function for displaying the notification -->
<script>
    function displayNotification(message,variant) {
        Toastify({
            text: message,
            duration: 3000,
            gravity: "Top",
            position: "right",
            close: true,
            stopOnFocus: true,
            className: "toastify-" + variant
        }).showToast();
    }
     
</script>  

<!-- Init  Alerts -->
<?php if (isset($success)) { ?>
    <!-- Pop Success Alert -->
    <script>
    displayNotification('<?php echo $success; ?>', "success");
    </script>

<?php }
if (isset($err)) { ?>
    <script>
        displayNotification('<?php echo $err; ?>',"error")
    </script>
<?php }
if (isset($info)) { ?>
    <script>
        displayNotification('<?php echo $info; ?>',"info")
    </script>
<?php }
?>