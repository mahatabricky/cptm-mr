<div class="wrap">
   <h1>Cptmr Plugin Dashboard</h1>
   <?php settings_errors(); ?>

   <form method="post" action="option.php">
       <?php 
          settings_fields('cptmr_options_group');
          do_settings_sections('cptmmr_plugin');
          submit_button();
       ?>

   </form>
</div>