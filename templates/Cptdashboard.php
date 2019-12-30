<div class="wrap">
   <div class="container-fluid">

   <h1>Custom Posts Dashboard</h1>

      <?php //settings_errors(); ?>

      <div class="w3-bar w3-grey menu-button">
         <button class="w3-bar-item w3-button" onclick="openCity('new-post-type')">Add New Post Type</button>
         <button class="w3-bar-item w3-button" onclick="openCity('list-post-type')">List of Post Type</button>
         <button class="w3-bar-item w3-button" onclick="openCity('about')">About</button>
      </div>
      <div class="tab-pane">
         <div id="new-post-type" class="w3-container tab">

            <form method="post" action="options.php">

               <!-- <?php 
                        settings_fields('cptmr_plugin_settings');
                        do_settings_sections('cptmmr_plugin');
                        submit_button();
               ?> -->

            </form>

         </div>

         <div id="list-post-type" class="w3-container tab" style="display:none">
            <h3>Updates</h3>
         </div>

         <div id="about" class="w3-container tab" style="display:none">
            <h3>About Author</h2>
               <p><b>Name : </b> Mahatab Hossain</p>
         </div>
      </div>
   </div>

</div>