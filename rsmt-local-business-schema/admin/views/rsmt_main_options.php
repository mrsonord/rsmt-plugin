<form action="options.php" method="post" class="rsmt_form main">
  <header>
    <a href="http://repairshopmarketingtools.com" title="Repair Shop Marketing Tools"><img src="<?php echo plugin_dir_url( __FILE__ ); ?>img/logo.png" alt="Repair Shop Marketing Tools Logo" width="300" height="100"></a>
  </header>
  <h2>Enable/Disable Function Groups</h2>
  <div>
    <label for="schema_status">Schema:</label>
    <select class="block" name="schema_status">
     <?php if (get_option("schema_status" ) == "1") { ?>
         <option value="1">Enabled</option>
         <option value="0">Disabled</option>
     <?php
     } else {
         ?>
         <option value="0">Disabled</option>
         <option value="1">Enabled</option>
     <?php } ?>
  </select>
  </div>
  <div>
   <label for="whitelabel_status">Whitelabel:</label>
   <select class="block" name="whitelabel_status">
     <?php if (get_option("whitelabel_status" ) == "1") { ?>
       <option value="1">Enabled</option>
       <option value="0">Disabled</option>
     <?php
     } else {
           ?>
       <option value="0">Disabled</option>
       <option value="1">Enabled</option>
       <?php } ?>
   </select>
  </div>
  <?php submit_button (); ?>
</form>