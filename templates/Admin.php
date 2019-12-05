<div class="wrap">
   <h1>Cptmr Plugin Dashboard</h1>
   <?php settings_errors(); ?>


<div class="w3-container">
</div>

<div class="w3-bar w3-black">
  <button class="w3-bar-item w3-button" onclick="openCity('London')">London</button>
  <button class="w3-bar-item w3-button" onclick="openCity('Paris')">Paris</button>
  <button class="w3-bar-item w3-button" onclick="openCity('Tokyo')">Tokyo</button>
</div>

<div id="London" class="w3-container city">
<form method="post" action="options.php">
       
       <?php 
          settings_fields('cptmr_options_group');
          do_settings_sections('cptmmr_plugin');
          submit_button();
       ?>

   </form>
</div>

<div id="Paris" class="w3-container city" style="display:none">
<form method="post" action="options.php">
       
       <?php 
          settings_fields('cptmr_options_group');
          do_settings_sections('cptmmr_plugin');
          submit_button();
       ?>

   </form>
</div>

<div id="Tokyo" class="w3-container city" style="display:none">
  <h2>Tokyo</h2>
  <p>Tokyo is the capital of Japan.</p>
</div>


</div>